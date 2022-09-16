<?php

namespace App\Http\Controllers;


use App\Repositories\CategoryRepository;

class HomeController extends Controller
{
    /**
    *
    * @return void
    */
    public function index(){


        return view('home.index')->with('categories', (new CategoryRepository())->getAllActive());
    }
}
