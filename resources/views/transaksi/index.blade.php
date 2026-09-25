@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div class="content-header d-flex justify-content-between align-items-center">
        <div>
            <h2 class="mb-0">Sistem Pencatatan Keuangan Keluarga</h2>
            <p class="text-muted mb-0" style="font-size:13px;">Kelola pemasukan dan pengeluaran keluarga Anda.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="ft-check-circle mr-1"></i> {{ session('success') }}
        </div>
    @endif

    <div class="content-body">

        <div class="row">

            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Total Pemasukan</h5>
                            <h3 class="mb-0">Rp {{ number_format($totalPemasukan,0,',','.') }}</h3>
                        </div>
                        <i class="ft-trending-up" style="font-size:32px; opacity:.6;"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Total Pengeluaran</h5>
                            <h3 class="mb-0">Rp {{ number_format($totalPengeluaran,0,',','.') }}</h3>
                        </div>
                        <i class="ft-trending-down" style="font-size:32px; opacity:.6;"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Saldo</h5>
                            <h3 class="mb-0">Rp {{ number_format($saldo,0,',','.') }}</h3>
                        </div>
                        <i class="ft-credit-card" style="font-size:32px; opacity:.6;"></i>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card mt-3">

                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">

                        <h4 class="mb-2 mb-md-0">Daftar Transaksi</h4>

                        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                            <i class="ft-plus mr-1"></i> Tambah Transaksi
                        </a>

                    </div>

                    <div class="card-body">

                        {{-- FILTER --}}
                        <form action="{{ route('transaksi.index') }}" method="GET" class="row mb-3">

                            <div class="col-md-3 mb-2">
                                <select name="jenis" class="form-control">
                                    <option value="">Semua Jenis</option>
                                    <option value="pemasukan" {{ request('jenis') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                                    <option value="pengeluaran" {{ request('jenis') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                                </select>
                            </div>

                            <div class="col-md-3 mb-2">
                                <input type="date" name="dari_tanggal" class="form-control"
                                       value="{{ request('dari_tanggal') }}" placeholder="Dari tanggal">
                            </div>

                            <div class="col-md-3 mb-2">
                                <input type="date" name="sampai_tanggal" class="form-control"
                                       value="{{ request('sampai_tanggal') }}" placeholder="Sampai tanggal">
                            </div>

                            <div class="col-md-3 mb-2 d-flex">
                                <button type="submit" class="btn btn-secondary mr-2">
                                    <i class="ft-filter mr-1"></i> Filter
                                </button>
                                <a href="{{ route('transaksi.index') }}" class="btn btn-outline-secondary">
                                    Reset
                                </a>
                            </div>

                        </form>

                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($transaksi as $item)

                                <tr>

                                    <td>{{ $loop->iteration + ($transaksi->currentPage() - 1) * $transaksi->perPage() }}</td>

                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>

                                    <td>
                                        @if($item->jenis == 'pemasukan')
                                            <span class="badge badge-success">Pemasukan</span>
                                        @else
                                            <span class="badge badge-danger">Pengeluaran</span>
                                        @endif
                                    </td>

                                    <td class="font-weight-bold {{ $item->jenis == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                        {{ $item->jenis == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($item->nominal,0,',','.') }}
                                    </td>

                                    <td>{{ $item->keterangan }}</td>

                                    <td>

                                        <a href="{{ route('transaksi.edit',$item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="ft-edit-2"></i>
                                        </a>

                                        <form action="{{ route('transaksi.destroy',$item->id) }}" method="POST" style="display:inline"
                                              onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm">
                                                <i class="ft-trash-2"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <i class="ft-inbox" style="font-size:28px; color:#ccc;"></i>
                                        <p class="text-muted mb-0 mt-2">Belum ada data transaksi.</p>
                                    </td>
                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                        <div class="d-flex justify-content-end mt-3">
                            {{ $transaksi->appends(request()->query())->links() }}
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection