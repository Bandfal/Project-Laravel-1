@extends('admin.admin')
@section('admin_title', 'Edit Project')
@section('content_title', 'Edit Project')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header">
                    <a href="{{ route('master_project.index') }}" class="btn btn-info">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
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
                    <form action="{{ route('master_project.update', $siswa->id) }}" class="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="project_name" class="label">Project Name:</label>
                            <input type="text" name="project_name" class="form-control" id="" value="{{ $siswa->project_name }}">
                        </div>
                        <div class="form-group">
                            <label for="project_date" class="label">Project Date:</label>
                            <input type="date" name="project_date" class="form-control" id="" value="{{ $siswa->project_date }}">
                        </div>
                        <div class="form-group">
                            <label for="photo" class="label">Project Photo:</label>
                            <input type="file" name="photo" class="form-control" id="" value="{{ $siswa->photo }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection