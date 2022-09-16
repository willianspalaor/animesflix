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
    * Get a record.
    *
    * @return void
    */
    public function get()
    {
        try{

            if(empty($this->request->id)){
                throw new \Exception("Id não informado");
            }

            $category = Category::findOrFail($this->request->id);

            return response()->json(["success" => true, "category" => $category->toArray()]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
    * Create a new record.
    *
    * @return void
    */
    public function create()
    {
        try{

            $category = new Category();
            $category->title = $this->request->title;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoria criada com sucesso!", "id" => $category->id]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
    * Update a record.
    *
    * @return void
    */
    public function update(){

        try{

            $category = Category::findOrFail($this->request->id);
            $category->title = $this->request->title;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoria alterada com sucesso!", "id" => $category->id]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
    * Delete a record.
    *
    * @return void
    */
    public function delete(){

        try{

            if(empty($this->request->id)){
                throw new \Exception("Id não informado");
            }

            $category = Category::findOrFail($this->request->id);
            $category->delete();

            return response()->json(["success" => true, "msg" => "Categoria excluida com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
    * Activate a record.
    *
    * @return void
    */
    public function activate(){

        try{

            if(empty($this->request->id)){
                throw new \Exception("Id não informado");
            }

            $category = Category::findOrFail($this->request->id);
            $category->active = 1;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoria ativada com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
    * Inactivate a record.
    *
    * @return void
    */
    public function inactivate(){

        try{

            if(empty($this->request->id)){
                throw new \Exception("Id não informado");
            }

            $category = Category::findOrFail($this->request->id);
            $category->active = 0;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoria inativada com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }
}
