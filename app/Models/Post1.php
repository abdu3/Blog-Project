<?php 

namespace App\Models;

use Illumnate\Database\Eloquent\ModelNotFoundExption;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class Post1 {

   public $title;
   public $date;
   public $excerpt;
   public $body;
   public $slug;

   public function __construct($title, $date,$excerpt,$body,$slug){

    $this->title=$title;
    $this->date=$date;
    $this->excerpt=$excerpt;
    $this->body=$body;
    $this->slug=$slug;
   }

public static function all(){
    return collect( File::files(resource_path("posts/")))
    ->map(fn($file)=>YamlFrontMatter::parse(file_get_contents($file)))
    ->map(fn($document)=>
           new Post1(
                $document->title,
                $document->date,
                $document->excerpt,
                $document->body(),
                $document->slug
            ))->sortBy('date');
}

public static function find($slug){

    $post= static::all()->firstWhere('slug',$slug);
    if(! $post){
       
        throw new ModelNotFoundExption();     
    }

    return  $post;
 }


}
