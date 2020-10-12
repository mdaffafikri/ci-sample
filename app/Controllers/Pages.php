<?php

namespace App\Controllers;

use App\Models\ComicModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    protected $comicModel; //biar bisa pake $this
    protected $userModel;
    public function __construct() //constructor
    {
        $this->comicModel = new ComicModel();        
        $this->userModel = new UserModel();        
        helper('form');
    }

    public function index()
    {
        $data['title'] = "Home";        

        // echo view('templates/header', $data);
        // echo view('templates/footer');
        return view('templates/layout', $data);
    }

    public function about()
    {
        // $data['title'] = "About";
        $data = [
            'title' => 'About',
            'biografi' => [
                [
                'name' => 'John Doe',
                'alamat' => 'jl. lorem ipsum'
                ],
                [
                'name' => 'Harry Potter',    
                'alamat' => 'Hogwards cabang wales'
                ]
            ]
        ];

        // echo view('templates/header', $data);
        return view('pages/about', $data);
        // echo view('templates/footer');
    }

    public function login(){
        $data = [
            'title' =>  'Login',
        ];
        return view('pages/login', $data);
    }

    public function loginSubmit(){
        $email = $this->request->getPost('email');
        $pwd = $this->request->getPost('pwd');
        $cek = $this->userModel->getLogin($email, $pwd);        
        
        // dd($this->comicModel->getLogin('Bleach', 'Tite Kubo'));

        if(($cek['email']==$email) && ($cek['password']==$pwd)){
            session()->set('email',$cek['email']);
            session()->set('pwd',$cek['password']);
            session()->setFlashData('login','Login Success!');
            return redirect()->to('/pages');
        }
        else{
            session()->setFlashData('fail', 'Email or Password is invalid');
            return redirect()->to('/pages/login');
        }
    }

    public function logout(){
        session()->destroy();        
        return redirect()->to('/pages');
        session()->setFlashData('logout','Logout Success!');
    }

    //--------------------------------------------------------------------

}
