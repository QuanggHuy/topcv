<?php

namespace App\Models\jobs;

use App\Models\jobs\Jobs;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ApplicationsJob extends Model
{
    protected $table = 'applications_job';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'job_id',
        'user_cv_id',
        'deactivated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    // Định nghĩa mối quan hệ với User (một đơn ứng tuyển thuộc về một người dùng)
}
