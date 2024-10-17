@extends('layouts.template')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-secondary">Tambah Pengguna</a>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no= 1; @endphp
            @foreach ($users as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['Role'] }}</td>
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