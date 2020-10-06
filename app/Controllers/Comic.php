<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{
    protected $comicModel; //biar bisa pake $this
    public function __construct() //constructor
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        // $allComic = $this->comicModel->findAll();


        $data = [
            'title' => 'Comic List',
            'comic' => $this->comicModel->getComic()
            // 'comic' => $allComic
        ];


        return view('pages/comic', $data);
    }

    public function detail($comicSlug)
    {
        // $detailComic = $this->comicModel->where(['slug'=>$comicSlug])->first();
        $detailComic = $this->comicModel->getComic($comicSlug); //get comic where blabllbalab ada di model

        $check = [
            'comic' => $detailComic //ini table yg udh di get where
        ];
        if (empty($check['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(('Title ' . $comicSlug . ' not found'));
        }

        $data = [
            'title' => $detailComic['title'] . " Detail",
            'comic' => $detailComic //ini table yg udh di get where
        ];

        return view("pages/comic_detail", $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Comic',
        ];

        return view('pages/add_comic', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),        
        ]);

        session()->setFlashdata('pesan', 'Data '.$slug.' added');

        return redirect()->to('/pages/comic');
    }

    //--------------------------------------------------------------------

}
