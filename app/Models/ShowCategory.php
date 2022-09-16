<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class ShowCategory extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'show_category';

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
        'id_show', 'id_category'
    ];
}



