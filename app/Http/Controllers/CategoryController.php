<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{   

    /**
     *
     * @return void
     */
    public function index(){
        return view('admin.category')->with('categories', Category::all());
    }


    /**
     * Create a new record.
     *
     * @return void
     */
    public function create()
    {
        try{

            if(empty(trim($this->request->title))){
                throw new \Exception("Título não informado");
            }

            $category = new Category();
            $category->title = $this->request->title;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoria criada com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
     * Edit a record.
     *
     * @return void
     */
    public function update(){

        die("chegou no update");
    }
}
