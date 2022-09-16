<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Show;
use App\Models\ShowCategory;
use App\Models\Genre;
use App\Models\ShowGenre;
use App\Repositories\ShowRepository;

class ShowController extends Controller
{   

    /**
    *
    * @return void
    */
    public function index(){

        return view('admin.show')
            ->with('shows', Show::all())
            ->with('categories', Category::all())
            ->with('genres', Genre::all());
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

            $show = (new ShowRepository())->get($this->request->id);
            return response()->json(["success" => true, "show" => $show]);

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
            
            \DB::beginTransaction();

            $show = new Show();
            $show->title = $this->request->title;
            $show->type = $this->request->type;
            $show->path_img = 'img/show/' . $this->helper->generateDirName($show->title);
            $show->path_video = 'video/show/' . $this->helper->generateDirName($show->title);
            $show->save();

            foreach($this->request->category as $category){
                $showCategory = new ShowCategory();
                $showCategory->id_category = $category;
                $showCategory->id_show = $show->id;
                $showCategory->save();
            }

            foreach($this->request->genre as $genre){
                $showGenre = new ShowGenre();
                $showGenre->id_genre = $genre;
                $showGenre->id_show = $show->id;
                $showGenre->save();
            }
      
            \DB::commit();

            return response()->json(["success" => true, "msg" => "Show criado com sucesso!", "id" => $show->id]);

        }catch(\Exception $e){

            \DB::rollBack();
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

            \DB::beginTransaction();

            $show = Show::findOrFail($this->request->id);
            $show->type = $this->request->type;
            $show->save();
            
            ShowCategory::where('id_show', $show->id)->delete();

            foreach($this->request->category as $category){
                $showCategory = new ShowCategory();
                $showCategory->id_category = $category;
                $showCategory->id_show = $show->id;
                $showCategory->save();
            }

            ShowGenre::where('id_show', $show->id)->delete();

            foreach($this->request->genre as $genre){
                $showGenre = new ShowGenre();
                $showGenre->id_genre = $genre;
                $showGenre->id_show = $show->id;
                $showGenre->save();
            }

            \DB::commit();

            return response()->json(["success" => true, "msg" => "Show alterado com sucesso!", "id" => $show->id]);

        }catch(\Exception $e){

            \DB::rollBack();
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

            \DB::beginTransaction();

            if(empty($this->request->id)){
                throw new \Exception("Id não informado");
            }

            $show = Show::findOrFail($this->request->id);

            if(file_exists($show->cover)){
                unlink($show->cover);
                rmdir(dirname($show->cover));
            }

            if(file_exists($show->trailer)){
                unlink($show->trailer);
                rmdir(dirname($show->trailer));
            }

            ShowCategory::where('id_show', $show->id)->delete();
            ShowGenre::where('id_show', $show->id)->delete();

            $show->delete();

            \DB::commit();

            return response()->json(["success" => true, "msg" => "Show excluído com sucesso!"]);

        }catch(\Exception $e){

            \DB::rollBack();
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

            $show = Show::findOrFail($this->request->id);
            $show->active = 1;
            $show->save();

            return response()->json(["success" => true, "msg" => "Show ativado com sucesso!"]);

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

            $show = Show::findOrFail($this->request->id);
            $show->active = 0;
            $show->save();

            return response()->json(["success" => true, "msg" => "Show inativado com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    /**
    * Upload a cover image.
    *
    * @return void
    */
    public function uploadCover()
    {
        try{

            if(empty($this->request->id)){
                throw new \Exception("Id não informado");
            }

            if(empty($_FILES['cover']['tmp_name'])){
                throw new \Exception("Arquivo não informado");
            }

            $extension = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION)); 

            if(!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])){
                throw new \Exception("Formato do arquivo inválido.");
            }

            $show = Show::findOrFail($this->request->id);
            $show->cover = $show->path_img . "/cover.$extension";

            if (!is_dir( $show->path_img ) ) { 
                mkdir($show->path_img, 0777, true);    
            }

            if(file_exists($show->cover)){
                unlink($show->cover);
            }

            move_uploaded_file($_FILES['cover']['tmp_name'], $show->cover);
          
            $show->save();
            return response()->json(["success" => true, "msg" => "Capa anexada com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }


    /**
    * Upload a trailer video.
    *
    * @return void
    */
    public function uploadTrailer()
    {
        try{

            if(empty($this->request->id)){
                throw new \Exception("Id não informado");
            }

            if(empty($_FILES['trailer']['tmp_name'])){
                throw new \Exception("Arquivo não informado");
            }

            $extension = strtolower(pathinfo($_FILES['trailer']['name'], PATHINFO_EXTENSION)); 

            if(!in_array($extension, ['mp4'])){
                throw new \Exception("Formato do arquivo inválido.");
            }

            $show = Show::findOrFail($this->request->id);
            $show->trailer = $show->path_video . "/trailer.$extension";

            if (!is_dir( $show->path_video ) ) { 
                mkdir($show->path_video, 0777, true);    
            }

            if(file_exists($show->trailer)){
                unlink($show->trailer);
            }

            move_uploaded_file($_FILES['trailer']['tmp_name'], $show->trailer);
          
            $show->save();

            return response()->json(["success" => true, "msg" => "Trailer anexado com sucesso!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }
    }

    public function testVideo(){
        return view('admin.video')->with('url', $this->getVideo()); 
    }

    public function getVideo(){

        try{

            return "https://drive.google.com/uc?id=1ptkkOg3CwepATpoKnUmWhVANjNgB7w09&export=download";

            return "https://drive.google.com/uc?id=1Hcn76rgPtytWE7GtF8CqNE_TbuPNRdkC&export=download";


            //return "https://cldup.com/Ycs4GZUrqf.MP4";

            //$url = 'https://www.youtube.com/watch?v=x0yVYVOozBo';
            $url = 'https://streamable.com/rluorc';

            $cmd ='youtube-dl.exe -g -f36 ' . escapeshellarg($url);
            exec($cmd, $outputsd);

            // Qualidades
            if(!empty($outputsd)){

                return $outputsd[0];
                return response()->json(["success" => true, "url" => $outputsd[0]]);
            }

           
            $cmd2 =' youtube-dl -g -f18 ' . escapeshellarg($url);
            exec($cmd2, $outputss);

            if(!empty($outputss)){
                return $outputss[0];
                return response()->json(["success" => true, "url" => $outputss[0]]);
            }


            $cmd3 =' youtube-dl -g -f22 ' . escapeshellarg($url);
            exec($cmd3, $outputsss);

            if(!empty($outputsss)){

                  return $outputsss[0];
                return response()->json(["success" => true, "url" => $outputsss[0]]);
            }


            $cmd4 =' youtube-dl -g -f17 ' . escapeshellarg($url);
            exec($cmd4, $outputssss);

            if(!empty($outputssss)){
                return response()->json(["success" => true, "url" => $outputssss[0]]);
            }

            throw new \Exception("Não foi possível ler o arquivo");

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        } 
    }

}
