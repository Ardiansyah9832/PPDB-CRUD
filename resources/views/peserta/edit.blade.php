@extends('layouts.template')

@section('content')
    <form action="{{ route('peserta.update', $peserta['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <div>
            <label for="name" class="col-sm-2 col-form-label">Nama Lengkap :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $peserta['name'] }}">
            </div>
        </div>
        <div>
            <label for="sekolah" class="col-sm-2 col-form-label">Asal Sekolah :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sekolah" id="sekolah" value="{{ $peserta['sekolah'] }}">
            </div>
        </div>
        <div>
            <label for="tanggallahir" class="col-sm-2 col-form-label" >Tanggal Lahir :</label>
            <div class="col-sm-10">
                <input type="date" name="tanggallahir" id="tanggallahir" value="{{ $peserta['tanggallahir'] }}">
            </div>
        </div>
        <div>
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Rumah :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $peserta['alamat'] }}">
            </div>
        </div>
        <div>
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="nisn" id="nisn" value="{{ $peserta['nisn'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection