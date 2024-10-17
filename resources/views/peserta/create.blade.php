@extends('layouts.template')

@section('content')
    <form action="{{ route('peserta.store')}}" method="POST" class="card p-5">
        @csrf

        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <div>
            <label for="name" class="col-sm-2 col-form-label">Nama Lengkap :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div>
            <label for="sekolah" class="col-sm-2 col-form-label">Asal Sekolah :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sekolah" id="sekolah">
            </div>
        </div>
        <div>
            <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir :</label>
            <div class="col-sm-10">
                <input type="date" name="tanggallahir" id="tanggallahir">
            </div>
        </div>
        <div>
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Rumah :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" id="alamat">
            </div>
        </div>
        <div>
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="nisn" id="nisn">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Peserta</button>
    </form>
@endsection