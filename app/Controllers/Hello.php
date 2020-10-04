<?php namespace App\Controllers;

class Hello extends BaseController
{
	public function index()
	{
        // $greetings = "Welcome";

		$arr['greetings'] = "hello world";
		$arr['title'] = "This is Index";
				
        return view('hello', $arr);        
	}

	public function showname($name = "bro")
	{
		echo view('templates/header');
		echo $name;
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
