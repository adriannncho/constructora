<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    use HasFactory;
    protected $primaryKey = 'IdAdministrador';
    protected $fillable = ['IdAdministrador','NumDocumento','Nombre','Apellido','Telefono','CorreoElectronico','FechaNacimiento'];
}
