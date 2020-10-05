<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data['title'] = "Home";        

        echo view('templates/header', $data);
        echo view('templates/footer');
    }

    public function about()
    {
        $data['title'] = "About";
        $data['test'] = [1,2,3,4];

        echo view('templates/header', $data);
        echo view('pages/about');
        echo view('templates/footer');
    }

    //--------------------------------------------------------------------

}
