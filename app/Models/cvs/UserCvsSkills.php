<?php

namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;

class UserCvsSkills extends Model
{
    protected $table = 'user_cvs_skills';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_cv_id',
        'skill_name',
        'skill_description',
    ];

    // Định nghĩa mối quan hệ với User (một đơn ứng tuyển thuộc về một người dùng)
}
