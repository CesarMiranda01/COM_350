<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinatarios extends Model
{
    use HasFactory;
    protected $fillable=['nombre','cargo'];
    public function correspondencias() {
        return $this->hasMany(Correspondencias::class,'destinatario_id' , 'id');
    }
}
