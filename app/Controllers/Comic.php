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
        $pager = \Config\Services::pager();

        $data = [
            'title' => 'Comic List',            
            'comic' => $this->comicModel->paginate(3, 'custompaginate'), //pagination
            'pager' => $this->comicModel->pager
            // 'comic' => $this->comicModel->getComic()
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
            throw new \CodeIgniter\Exceptions\PageNotFoundException(('Title ' . $comicSlug . ' not found')); //check klo gk nemu
        }

        $data = [
            'title' => $detailComic['title'] . " Detail",
            'comic' => $detailComic, //ini table yg udh di get where
        ];

        return view("pages/comic_detail", $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Comic',
            'validation' => \Config\Services::validation(), //dari validation flash yg bawah
        ];

        return view('pages/add_comic', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());

        //validation
        if (!$this->validate([
            'title' => 'required|is_unique[comics.title]',
            'author' => 'required'
        ])) {
            $valid = \Config\Services::validation();            
            return redirect()->to('/pages/comic/add')->withInput()->with('validation', $valid);
        }
        //yg diatas cuma validasi


        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
        ]);

        session()->setFlashdata('pesan', 'Data ' . $slug . ' added');

        return redirect()->to('/pages/comic');
    }

    public function delete($id)
    {
        $this->comicModel->delete($id);
        return redirect()->to('/pages/comic');
    }

    public function edit($slug)
    {
        $selectComic = $this->comicModel->getComic($slug); //get comic sesuai slug ada di model

        $data = [
            'title' => 'Edit ' . $selectComic['title'],
            'comic' => $selectComic,
            'validation' => \Config\Services::validation(),
        ];

        return view('pages/edit_comic', $data);
    }

    public function update($id)
    {
        $currentComic = $this->comicModel->getComic($this->request->getVar('slug'));
        if($currentComic['title'] == $this->request->getVar('title')){
            $ruleTitle = 'required';
        }
        else{
            $ruleTitle = 'required|is_unique[comics.title]';
        }

        if (!$this->validate([
            'title' => $ruleTitle,
            'author' => 'required'
        ])) {
            $valid = \Config\Services::validation();
            // dd($valid);
            return redirect()->to('/pages/comic/edit/'.$this->request->getVar('slug'))->withInput()->with('validation', $valid);
        }


        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'id' => $id, //karena update id harus disamain
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
        ]);

        session()->setFlashdata('pesan', 'Data ' . $slug . ' updated');

        return redirect()->to('/pages/comic');
    }

    //--------------------------------------------------------------------

}
