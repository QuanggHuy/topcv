<?php

namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;

class UserCvs extends Model
{
    protected $table = 'user_cvs';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'cv_template_id',
        'avatar',
        'image',
        'deactivated'
    ];

    // Định nghĩa mối quan hệ với User (một đơn ứng tuyển thuộc về một người dùng)
}
