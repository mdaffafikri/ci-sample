<?php namespace App\Controllers;

class Hello extends BaseController
{
	public function index()
	{
        // $greetings = "Welcome";

        $arr['greetings'] = "hello world";
        return view('hello', $arr);        
	}

	//--------------------------------------------------------------------

}
