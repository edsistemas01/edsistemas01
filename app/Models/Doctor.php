<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table='doctors';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'doc_id',
        'doc_name',
        'doc_speciality',
        'doc_phone',
        'doc_email'
    ];
    public $timestamps=true;

}
