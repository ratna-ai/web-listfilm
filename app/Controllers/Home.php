<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home Page | Ratna D'
		];	

		return view('home', $data);
	}
}
