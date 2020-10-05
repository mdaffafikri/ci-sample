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

	public function showname($name = '', $number = 0)
	{
		$data['title'] = "This is showname";

		echo view('templates/header', $data);
		echo "$this->globalVar, Hai $name, $number ";
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
