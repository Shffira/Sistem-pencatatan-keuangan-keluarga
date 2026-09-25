<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
{
        $query = Transaksi::query();

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('dari_tanggal')) {
            $query->whereDate('tanggal', '>=', $request->dari_tanggal);
        }

        if ($request->filled('sampai_tanggal')) {
            $query->whereDate('tanggal', '<=', $request->sampai_tanggal);
        }

        $transaksi = $query->orderBy('tanggal', 'desc')->paginate(10);

    // Total tetap dihitung dari SEMUA data, bukan hasil filter,
    // supaya summary card tidak berubah-ubah saat difilter
    $totalPemasukan  = Transaksi::where('jenis', 'pemasukan')->sum('nominal');
    $totalPengeluaran = Transaksi::where('jenis', 'pengeluaran')->sum('nominal');
    $saldo = $totalPemasukan - $totalPengeluaran;

    return view('transaksi.index', compact('transaksi', 'totalPemasukan', 'totalPengeluaran', 'saldo'));
}

    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        Transaksi::create([
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
{
    $transaksi = Transaksi::findOrFail($id);

    return view('transaksi.edit', compact('transaksi'));
}

    public function update(Request $request, $id)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jenis' => 'required|in:pemasukan,pengeluaran',
        'nominal' => 'required|numeric|min:1',
        'keterangan' => 'required|string|max:255',
    ]);

    $transaksi = Transaksi::findOrFail($id);

    $transaksi->update([
        'tanggal' => $request->tanggal,
        'jenis' => $request->jenis,
        'nominal' => $request->nominal,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('transaksi.index')
                     ->with('success', 'Transaksi berhasil diperbarui.');
}

    public function destroy($id)
{
    $transaksi = Transaksi::findOrFail($id);

    $transaksi->delete();

    return redirect()->route('transaksi.index')
                     ->with('success', 'Transaksi berhasil dihapus.');
}
}