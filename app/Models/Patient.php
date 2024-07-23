<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table='patients';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'pat_id',
        'pat_name',
        'pat_sex',
        'pat_age',
        'pat_phone'
    ];
    public $timestamps=true;
    
}
