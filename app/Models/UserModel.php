<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = "users";    
    protected $useTimeStamps = true;

    public function getLogin($email, $pwd){
        $user = $this->where(['email' => $email, 'password' => $pwd])
        ->get()->getRowArray();     

        if(!$user){
            return array('email' => '', 'password' => '');
        }else{
            return $user;
        }        
    }
}