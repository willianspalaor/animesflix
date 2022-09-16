<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Genre extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genre';

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
        'title',
    ];
}



