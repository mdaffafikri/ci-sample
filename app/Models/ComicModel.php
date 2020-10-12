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

    // public function getLogin($email, $pwd){
    //     $user = $this->where(['title' => $email, 'author' => $pwd])
    //     ->get()->getRowArray();     

    //     if(!$user){
    //         return array('title' => '', 'author' => '');
    //     }else{
    //         return $user;
    //     }        
    // }
}