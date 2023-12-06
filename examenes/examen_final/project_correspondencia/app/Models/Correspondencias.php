<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondencias extends Model
{
    use HasFactory;
    protected $fillable=[
        'fecha',
        'remitente',
        'asunto',
        'cite',
        'destinatario_id'];
        public function destinatarios() {
            return $this->belongsTo(Destinatarios::class,'destinatario_id' , 'id');
        }
}
