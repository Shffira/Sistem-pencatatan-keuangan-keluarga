@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <h2>Tambah Transaksi</h2>
    </div>

    <div class="content-body">

        <div class="card">

            <div class="card-body">
@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif
                <form action="{{ route('transaksi.store') }}" method="POST">

                    @csrf

                    <div class="form-group mb-3">
                        <label>Tanggal</label>
                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               value="{{ old('tanggal') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Jenis</label>

                        <select name="jenis" class="form-control">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Nominal</label>
                        <input type="number"
                               name="nominal"
                               class="form-control"
                               value="{{ old('nominal') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Keterangan</label>

                        <textarea
                            name="keterangan"
                            class="form-control"
                            rows="3">{{ old('keterangan') }}</textarea>
                    </div>

                    <button class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('transaksi.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection