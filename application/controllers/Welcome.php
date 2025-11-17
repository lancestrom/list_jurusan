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

	public function list_kelas_akl_x()
	{
		$this->load->view('tampilan_akl_x');
	}
	public function list_kelas_akl_xi()
	{
		$this->load->view('tampilan_akl_xi');
	}
	public function list_kelas_akl_xii()
	{
		$this->load->view('tampilan_akl_xii');
	}

	public function list_kelas_mplb()
	{
		$this->load->view('tampilan_mplbl');
	}

	public function list_kelas_mplb_x()
	{
		$this->load->view('tampilan_mplbl_x');
	}

	public function list_kelas_mplb_xi()
	{
		$this->load->view('tampilan_mplbl_xi');
	}

	public function list_kelas_mplb_xii()
	{
		$this->load->view('tampilan_mplbl_xii');
	}

	public function list_kelas_pm_dkv()
	{
		$this->load->view('tampilan_pm_dkv');
	}

	public function list_kelas_tjkt()
	{
		$this->load->view('tampilan_tjkt');
	}
	public function list_kelas_tjkt_x()
	{
		$this->load->view('tampilan_tjkt_x');
	}
	public function list_kelas_tjkt_xi()
	{
		$this->load->view('tampilan_tjkt_xi');
	}
	public function list_kelas_tjkt_xii()
	{
		$this->load->view('tampilan_tjkt_xii');
	}
}
