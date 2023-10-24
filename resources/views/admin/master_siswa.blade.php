@extends('admin.admin')
@section('admin_title', 'Master Siswa')
@section('content_title', 'Master Siswa')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('message'))
        <div class="my-3">
            <div class="alert alert-danger">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif
    <div class="card-header">
        <a href="tambah_siswa" class="btn btn-success">Tambah Siswa</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>No.</th>
                <th>Nama</th>
                <th>About</th>
                <th>Photo</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->about }}</td>
                        <td><img style="height: 150px" src="{{ asset('./asset/'.$siswa->photo) }}" alt=""></td>
                        <td>
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning my-2">Edit</a>
                            <a href="{{ route('siswa.destroy', $siswa->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection