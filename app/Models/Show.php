<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Show extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'show';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

 	/**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 'type', 'cover', 'trailer', 'path_img', 'path_video'
    ];
}



