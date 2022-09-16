<?php

namespace App\Repositories;

use App\Interfaces\GenreInterface;
use Illuminate\Support\Facades\DB;

class GenreRepository implements GenreInterface{


    /**
    *
    * Get genres by show
    * 
    * @return Illuminate\Support\Collection
    */
	public function getByShow($show){

		return \DB::table('genre')
                ->join('show_genre', 'show_genre.id_genre', '=', 'genre.id')
                ->where('show_genre.id_show', '=', $show->id)
                ->get('genre.*');
	}	
}
