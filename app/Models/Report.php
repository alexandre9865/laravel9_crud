<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $fillable = ['id_report', 'title', 'description'];

    protected $primaryKey = 'id_report';
    public $timestamps = false;

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'report_profiles', 'id_report', 'id_profile');
    }

}
