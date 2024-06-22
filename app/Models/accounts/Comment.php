<?php
namespace App\Models\accounts;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
protected $table='comments';
protected $primarykey='id';

public $timestamps=false;

protected $fillable=[
    'user_id' ,
    'created',
    'comment_text',
    'company_id' ,
    'job_id',
    'article_id' 
    ];

}


?>