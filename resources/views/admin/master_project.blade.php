@extends('admin.admin')
@section('admin_title', 'Master Project')
@section('content_title', 'Master Project')

@section('content')
    @if (Session::has('message'))
        <div class="my-3">
            <div class="alert alert-danger">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-5">
            <div class="card shadow">
                <div class="card-header">
                    <h1>
                        Daftar Siswa
                    </h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Project</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $siswa)    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->name }}</td>
                                    <td>
                                        <a onclick="show({{ $siswa->id }})" class="btn btn-sm btn-info">
                                            <i class="fas fa-folder-open"></i>
                                        </a>
                                        <a href="{{ route('master_project.add', $siswa->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card shadow">
                <div class="card-header">
                    <h1>
                        List Project
                    </h1>
                </div>
                <div id="project" class="card-body">
                    <h6 class="text-center">
                        Silahkan pilih siswa terlebih dahulu
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <script>
        function show(id) {
            $.get(
                `master_project/${id}`,
                (data) => {
                    $('#project').html(data)
                }
            )
        }
    </script>
@endsection