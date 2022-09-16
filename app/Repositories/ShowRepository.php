<?php

namespace App\Repositories;

use App\Interfaces\ShowInterface;
use Illuminate\Support\Facades\DB;

class ShowRepository implements ShowInterface{


    /**
    *
    * Get shows
    * 
    * @return Illuminate\Support\Collection
    */
    public function get($id){

        $show = \DB::table('show')->where('show.id', '=', $id)->first();
        $categories = \DB::table('show_category')->where('show_category.id_show', '=', $id)->get();
        $genres = \DB::table('show_genre')->where('show_genre.id_show', '=', $id)->get();

        foreach($categories as $category){
            $show->categories[] = $category->id_category;
        }

        foreach($genres as $genre){
            $show->genres[] = $genre->id_genre;
        }

        return $show;
    }


    /**
    *
    * Get shows by category
    * 
    * @return Illuminate\Support\Collection
    */
	public function getByCategory($category){

		return \DB::table('show')
                ->join('show_category', 'show_category.id_show', '=', 'show.id')
                ->where('show_category.id_category', '=', $category->id)
                ->get(['show.*']);
	}	

    /**
    *
    * Get shows active by category
    * 
    * @return Illuminate\Support\Collection
    */
    public function getActiveByCategory($category){

        return \DB::table('show')
                ->join('show_category', 'show_category.id_show', '=', 'show.id')
                ->where('show_category.id_category', '=', $category->id)
                ->where('show.active', '=', 1)
                ->get(['show.*']);
    }
}
