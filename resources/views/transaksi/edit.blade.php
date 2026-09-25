@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <h2>Edit Transaksi</h2>
    </div>

    <div class="content-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>Tanggal</label>
                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal', $transaksi->tanggal) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Jenis</label>

                        <select name="jenis" class="form-control">
                            <option value="pemasukan"
                                {{ $transaksi->jenis == 'pemasukan' ? 'selected' : '' }}>
                                Pemasukan
                            </option>

                            <option value="pengeluaran"
                                {{ $transaksi->jenis == 'pengeluaran' ? 'selected' : '' }}>
                                Pengeluaran
                            </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Nominal</label>
                        <input type="number"
                               name="nominal"
                               class="form-control"
                               value="{{ old('nominal', $transaksi->nominal) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Keterangan</label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="3">{{ old('keterangan', $transaksi->keterangan) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>

                    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection