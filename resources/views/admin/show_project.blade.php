@if ($datas->isEmpty())
    <h3>Siswa belum mempunyai project</h3>
@else
    @foreach ($datas as $data)    
        <div class="card">
            <div class="card-header">
                {{ $data->project_name }}
            </div>
            <div class="card-body">
                <a href="{{ route('master_project.edit', $data->id) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-pen"></i>
                </a>
                <!-- Delete -->
                <form action="{{ route('master_project.destroy', $data->id) }}" method="post">
                    @csrf

                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>

                </form>
                <h6>Tanggal Project : </h6>
                {{ $data->project_date }}
                <h6>Foto Project : </h6>
                <img src="{{ asset('storage/'.$data->photo) }}" alt="" width="150px" class="img-thumbnail">
                {{-- <img src="{{ public_path('public/asset/'.$data->photo) }}" alt="" width="150px" class="img-thumbnail"> --}}
            </div>
        </div>
    @endforeach
@endif