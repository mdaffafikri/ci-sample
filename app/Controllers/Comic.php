<?php namespace App\Controllers;

class Comic extends BaseController
{
	public function index()
	{
        $data = [
            'title' => 'Comic List'
        ];
        return view('pages/comic', $data);
	}

	//--------------------------------------------------------------------

}
