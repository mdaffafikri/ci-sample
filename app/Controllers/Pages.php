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

    //--------------------------------------------------------------------

}
