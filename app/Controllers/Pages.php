<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
            'title'     => 'Home Page | Website Ratna'
        ];
        return view('page/home', $data);
	}

	public function about()
	{
		$data = [
            'title'     => 'About Page | Website Ratna'
        ];
        return view('page/about');
	}
}
