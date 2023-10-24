<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    // Cek Role User
    public function __construct()
    {
        $this->middleware('role:admin')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all('id', 'name');
        return view('admin.master_project', compact('siswas'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.tambah_project');
    }
    
    public function add(string $id)
    {
        $siswa = Siswa::find($id);
        return view('admin.tambah_project', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|min:5',
            'project_date' => 'required',
            'photo' => 'required|image'
        ]);

        $validatedData = $request->validate([
            'project_name'  => 'required|min:3|max:30',
            'project_date'  => 'required',
            'photo'         => 'required|mimes:jpg,jpeg,png'
        ]);

        // Ambil file yang dikirim
        // $file = $request->file('photo');
        
        // Mengubah nama file
        // $nama_file = time().'_'.$file->getClientOriginalName();

        // Memindahkan ke database
        // $request->file('photo')->store('asset');

        // Project::create([
        //     'siswa_id' => $request->siswa_id,
        //     'project_name' => $request->project_name,
        //     'project_date' => $request->project_date,
        //     'photo' => $request->file('photo')->store('asset')->getClientOriginalName(),
        // ]);

        $validatedData['siswa_id'] = $request->siswa_id;

        $validatedData['photo'] = $request->file('photo')->store('project');

        Project::create($validatedData);

        return redirect(route('master_project.index')) 
        ->with('message', 'Data Project Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas = Siswa::find($id)->project()->get();
        return view('admin.show_project', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Project::find($id);
        return view('admin.edit_project', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Project::find($id);

        $validasi = $request->validate([
            'project_name' => 'required|min:5',
            'project_date' => 'required',
            'photo' => 'required|image'
        ]);

        if($request->file('photo')) {
            if($request->oldProject) {
                Storage::delete($request->oldProject);
            }
            $validasi['photo'] = $request->file('photo')->store('asset');
        }

        $siswa->update($validasi);

        return redirect()->route('master_project.index')->with('success', 'Data Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if($project->photo) {
            Storage::delete($project->photo);
        }

        $project->delete();

        return redirect()->route('master_project.index')->with('success', 'Data Deleted Successfully!');
    }
}
