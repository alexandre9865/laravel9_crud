<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\GenderEnum;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $fillable = ['id_profile', 'first_name', 'last_name', 'dbo', 'gender'];
    protected $appends = ['gender_name'];

    protected $dates = ['dbo'];
    protected $casts = ['dbo'  => 'datetime:m/d/Y'];
    protected $primaryKey = 'id_profile';
    public $timestamps = false;

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'report_profiles', 'id_profile', 'id_report');
    }

    public function getGenderNameAttribute()
    {
        switch ($this->gender) {
            case '0':
                return 'Male';
            case '1':
                return 'Female';
            case '2':
                return 'Other';
        }
    }

}
