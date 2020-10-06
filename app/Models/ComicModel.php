<?php namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model{
    // protected $primarykey = "id";
    protected $table = "comics";    
    protected $useTimeStamps = true;
    protected $allowedFields =['title', 'slug', 'author'];

    public function getComic($comicSlug=false){
        if(!$comicSlug){
            return $this->findAll();
        }
        return $this->where(['slug'=>$comicSlug])->first();
    }
}