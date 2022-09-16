<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{   

    /**
    *
    * @return void
    */
    public function index(){
        return view('admin.genre')->with('genres', Genre::all());
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

            $genre = Genre::findOrFail($this->request->id);

            return response()->json(["success" => true, "genre" => $genre->toArray()]);

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

            $genre = new Genre();
            $genre->title = $this->request->title;
            $genre->save();

            return response()->json(["success" => true, "msg" => "Gênero criado com sucesso!", "id" => $genre->id]);

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

            $genre = Genre::findOrFail($this->request->id);
            $genre->title = $this->request->title;
            $genre->save();

            return response()->json(["success" => true, "msg" => "Gênero alterado com sucesso!", "id" => $genre->id]);

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

            $genre = Genre::findOrFail($this->request->id);
            $genre->delete();

            return response()->json(["success" => true, "msg" => "Gênero excluido com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }
}
