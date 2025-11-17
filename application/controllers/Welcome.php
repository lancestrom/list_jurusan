<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function list_kelas_akl()
	{
		$this->load->view('tampilan_akl');
	}

	public function list_kelas_mplb()
	{
		$this->load->view('tampilan_mplbl');
	}

	public function list_kelas_pm_dkv()
	{
		$this->load->view('tampilan_pm_dkv');
	}

	public function list_kelas_tjkt()
	{
		$this->load->view('tampilan_tjkt');
	}
}
