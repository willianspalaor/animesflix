<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Show;
use App\Repositories\ShowRepository;
use App\Repositories\GenreRepository;


class CategoryRepository implements CategoryInterface{


    /**
    *
    * Get categories active
    * 
    * @return Illuminate\Support\Collection
    */
	public function getAllActive(){

	 	$categories = Category::where('active', 1)->get();
	 	
        foreach($categories as $category){

            $category->shows = (new ShowRepository())->getActiveByCategory($category);

            foreach($category->shows as $show){
                $show->genres = (new GenreRepository())->getByShow($show);
            }
        }

        return $categories;
	}	
}
