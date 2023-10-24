<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function master_siswa() {
        $siswas = Siswa::all();

        return view('admin.master_siswa', compact('siswas'));
    }

    public function tambah_siswa() {
        return view('admin.tambah_siswa');
    }
    
    public function tambah_siswa_proses(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:1|max:50',
            'about' => 'required|min:20|max:200',
            'photo' => 'required|mimes:jpg,bmp,png'
        ]);

        // Ambil file yang dikirim
        $file = $request->file('photo');
        
        // Mengubah nama file
        $nama_file = time().'_'.$file->getClientOriginalName();

        // Memindahkan ke database
        $file->move(public_path('asset'), $nama_file);
        
        Siswa::create([
            'name' => $request->name,
            'about' => $request->about,
            'photo' => $nama_file
        ]);
        return redirect(route('master_siswa'))->with('message', 'Data Siswa Berhasil Ditambahkan');
    }
    
    public function edit($id){
        $siswas = Siswa::find($id);
        
        return view('admin.editsiswa', compact('siswas', 'id'));
    }
    
    public function edit_siswa_proses(Request $request, $id){
        $siswa = Siswa::find($id);
        $request->validate([
            'name' => 'required|string',
            'about' => 'required|string',
            'photo' => 'nullable|file',
        ]);
        
        // Mendapatkan nama file foto lama
        // $nama_fileOld = $siswa->photo;
        
        if ($request->hasFile('photo')) {
            // Menyimpan file foto baru
            $photo = $request->file('photo');
            $nama_file = $photo->getClientOriginalName();
            $photo->storeAs('./asset', $nama_file);
            
            $file = $request->file('photo');
            $file->move('./asset', $nama_file);
            // Hapus file foto lama jika ada
            // if ($nama_fileOld) {
            //     Storage::delete('./asset/' . $nama_fileOld);
            // }
    
            // Update field 'photo' pada model 'Siswa' dengan nama file yang baru
            $siswa->update([
                'name' => $request['name'],
                'about' => $request['about'],
                'photo' => $nama_file,
            ]);
        }
    
        return redirect()->route('master_siswa')->with('success', 'Berhasil Mengubah Data Siswa');
    }

    public function delete_siswa($id){
        $siswa = Siswa::find($id);
    
        if (!$siswa) {
            return redirect(route('master_siswa'))->with('error', 'Data siswa tidak ditemukan.');
        }
    
        // // Mendapatkan nama file foto lama
        // $nama_fileOld = $siswa->photo;
    
        // if ($nama_fileOld) {
        //     // Hapus file dari penyimpanan lokal
        //     if (Storage::exists('./asset/' . $nama_fileOld)) {
        //         Storage::delete('./asset/' . $nama_fileOld);
        //     } else {
        //         return redirect(route('master_siswa'))->with('error', 'File foto lama tidak ditemukan dalam penyimpanan lokal.');
        //     }
        // }
    
        $siswa->delete();
        return redirect(route('master_siswa'))->with('success', 'Data siswa berhasil dihapus.');
    }    
}
