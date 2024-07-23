<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    
    protected $table='historys';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'his_date',
        'his_shift',
        'doctor_id',
        'patient_id',
        'his_pressure',
        'his_fcardiac',
        'his_temperature',
        'his_ppoxygen',
        'his_glucose',
        'his_allergies',
        'his_diagnostic',
        'his_treatment',
        'his_references'
    ];
    public $timestamps=true;

    protected $casts = [
        'his_date' => 'datetime',
    ];

    public function getFormattedDateAttribute()
    {
        return $this->his_date->format('d-m-Y');
    }

    public function patient(){
        return $this->hasOne(Patient::class,'id','patient_id');
    }

    public function doctor(){
        return $this->hasOne(Doctor::class,'id','doctor_id');
    }

}
