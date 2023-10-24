@extends('admin.admin')
@section('admin_title', 'Tambah Siswa')
@section('content_title', 'Tambah Siswa')

@section('content')
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="{{ route('master_siswa') }}" class="btn btn-success"><i class="fas fa-arrow-left">Back</i></a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('tambah_siswa_proses') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <input type="text" name="about" class="form-control" value="{{ old('about') }}">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photos</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection