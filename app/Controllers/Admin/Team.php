<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class Team extends BaseController
{
    protected $teamModel;

    public function __construct()
    {
        $this->teamModel = new TeamModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Tim',
            'page_title' => 'Manajemen Tim',
            'teams' => $this->teamModel->findAll()
        ];
        return view('admin/team/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Anggota Tim',
            'page_title' => 'Tambah Anggota Tim',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/team/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('image');
        $fileName = $file->getRandomName();
        $file->move('uploads/team', $fileName);

        $this->teamModel->save([
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'image' => $fileName,
            'social_fb' => $this->request->getPost('social_fb'),
            'social_twitter' => $this->request->getPost('social_twitter'),
            'social_instagram' => $this->request->getPost('social_instagram'),
            'social_linkedin' => $this->request->getPost('social_linkedin'),
        ]);

        return redirect()->to(site_url('admin/team'))->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $team = $this->teamModel->find($id);
        if ($team) {
            if ($team['image'] && file_exists('uploads/team/' . $team['image'])) {
                unlink('uploads/team/' . $team['image']);
            }
            $this->teamModel->delete($id);
            return redirect()->to(site_url('admin/team'))->with('success', 'Anggota tim dihapus.');
        }
        return redirect()->to(site_url('admin/team'));
    }
}
