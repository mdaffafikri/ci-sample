<?php namespace App\Controllers;

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
        $allComic = $this->comicModel->findAll();

        $data = [
            'title' => 'Comic List',
            'comic' => $allComic
        ];        
        
        
        return view('pages/comic', $data);
	}

	//--------------------------------------------------------------------

}
