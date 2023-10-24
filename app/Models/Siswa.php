<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    // protected $table = 'siswa';
    // protected $fillable=['name', 'photo'];
    // protected $hidden=['photo'];
    // protected $primarykey = 'id';
    protected $guarded=[];

    public function project(){
        return $this->hasMany(Project::class);
    }
    
    public function contact(){
        return $this->hasMany(Contact::class);
    }
}