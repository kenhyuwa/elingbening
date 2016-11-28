<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';
    protected $primaryKey = 'no_tiket';
    protected $fillable = ['*'];
    public $incrementing = false;
}
