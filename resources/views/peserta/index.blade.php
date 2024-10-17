@extends('layouts.template')

@section('content')

    @if (Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning"> {{ Session::get('deleted') }}</div>
    @endif

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal Sekolah</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>NISN</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no= 1; @endphp
            @foreach ($peserta as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['sekolah'] }}</td>
                    <td>{{ $item['tanggallahir'] }}</td>
                    <td>{{ $item['alamat'] }}</td>
                    <td>{{ $item['nisn'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('peserta.edit', $item['id'])}}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('peserta.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection