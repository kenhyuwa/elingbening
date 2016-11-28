<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'kode_pegawai';
    protected $fillable = ['name','gender','phone','level'];
    public $incrementing = false;

    public function getUser()
    {
    	return $this->hasOne(User::class,'pegawai_kode');
    }
}
