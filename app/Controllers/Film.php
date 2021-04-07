<?php

namespace App\Controllers;

use App\Models\FilmModel;

class Film extends BaseController
{
	protected $filmModel;
	public function __construct()
	{
		$this->filmModel = new FilmModel();
	}
	
	public function index()
	{

		$data = [
			'title' => 'Movie Page | Ratna D',
			'film'	=> $this->filmModel->getFilm()
		];	
		
		return view('film/listfilm', $data);
	}

	public function detail($slug)
	{
		$data = [
			'title' 	=> 'Movie Info Page | Ratna D',
			'film'		=> $this->filmModel->getFilm($slug)
		];

		if (empty($data['film'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Film' . $slug . 'tidak ditemukan');	
		}

		return view('film/detail_film', $data);
	}

    public function create()
	{
		session();
        $data = [
			'title' 	=> 'Tambah Data Film | Ratna D',
            'validation' => \Config\Services::validation()
		];

		return view('film/create_film', $data);
	}

    public function save()
	{
		if (!$this->validate([
            'judul' => 'required|is_unique[listfilm.judul]',
            'sutradara' => 'required',
            'synopsis' => 'required',
            'cover' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            
            return redirect()->to('/film/create')->withInput()->with('validation', $validation);
        }
        
        $slug = url_title($this->request->getVar('judul'), '-', true);
		$this->filmModel->save([
			'judul'			=> $this->request->getVar('judul'),
			'slug'			=> $slug,
			'sutradara'		=> $this->request->getVar('sutradara'),
			'synopsis'		=> $this->request->getVar('synopsis'),
			'cover'			=> $this->request->getVar('cover')
		]);	
		
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
		return redirect()->to('/film');
	}

    public function delete($id)
    {
        $this->filmModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/film');
    }

    public function edit($slug)
    {
        session();
        $data = [
			'title' 	=> 'Form Edit Data | Ratna D',
            'validation' => \Config\Services::validation(),
            'film'    	=> $this->filmModel->getFilm($slug)
		];

		return view('film/edit_film', $data);
    }

    public function update($id)
    {
        $film_lama = $this->filmModel->getFilm($this->request->getVar('slug'));
        if ($film_lama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[listfilm.judul]';
        }
        
        if (!$this->validate([
            'judul' => $rule_judul,
            'sutradara' => 'required',
            'synopsis' => 'required',
            'cover' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            
            return redirect()->to('/film/edit' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
		$this->filmModel->save([
			'id'            => $id,
            'judul'			=> $this->request->getVar('judul'),
			'slug'			=> $slug,
			'sutradara'		=> $this->request->getVar('sutradara'),
			'synopsis'		=> $this->request->getVar('synopsis'),
			'cover'			=> $this->request->getVar('cover')
		]);	
		
        session()->setFlashdata('pesan', 'Data berhasil diupdate!');
		return redirect()->to('/film');
    }
}
