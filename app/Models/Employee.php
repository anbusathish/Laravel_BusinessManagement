<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;  
    protected $table="employees";
    protected $fillable = ['company_id','firstname','lastname','email','phone'];

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
