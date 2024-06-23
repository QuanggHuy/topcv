<?php

namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;
use App\Models\jobs\ApplicationsJob;

class UserCvs extends Model
{
    protected $table = 'user_cvs';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'cv_template_id',
        'avatar',
        'image',
        'deactivated'
    ];

    public function applications()
    {
        return $this->hasMany(ApplicationsJob::class, 'user_cv_id');
    }
}

