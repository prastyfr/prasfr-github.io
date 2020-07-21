<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function keHalamanLogin(){
		$this->load->view('admin/login');
	}

	public function login(){
		$data = array(
			'username' => $this->input->post('username'), 
			'password' => sha1($this->input->post('password'))
		);


		$cek = $this->K_Admin->cekLogin($data);

		if ($cek > 0) {
			$data = array(
				'status' => TRUE,
				'level'  => 'admin'
			);

			redirect(base_url('admin/dasboard'));

		}else{

			redirect(base_url('login'));

		}

	}

	public function logout()
		{
			redirect(base_url());
		}

	public function keHalamanDasboard()
		{
			$data['stasiun'] = $this->K_Admin->getDataStasiun()->result();

			$this->load->view('admin/dasboard', $data);
		
		}

	public function tambah_stasiun()
		{
			$nama = $this->input->post('stasiun');

			$input = $this->K_Admin->tambah_stasiun($nama);
			redirect(base_url('admin/dasboard'));
	
		}

	public function hapus_stasiun($id)
	    {
			$delete = $this->K_Admin->delete_stasiun($id);

			redirect(base_url('admin/dasboard'));
	
		}

	public function keHalamanEditStasiun($id)
	    {
			$data['data_stasiun'] = $this->K_Admin->getDataEditStasiun($id)->row();

			$this->load->view('admin/edit_stasiun', $data);
	
		}

		public function edit_stasiun()
	    {
			$nama = $this->input->post('nama_stasiun');

			$edit = $this->K_Admin->edit_stasiun($nama);

			redirect(base_url('admin/dasboard'));
	
		}


		public function keHalamanKelolaJadwal(){
		$data['stasiun'] = $this->K_Admin->getDataStasiun()->result();

		$data['jadwal'] = $this->K_Admin->getJadwal()->result();

		$this->load->view('admin/kelola_jadwal', $data);
	}

	public function tambah_jadwal(){
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'), 
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'tanggal_berangkat' => $this->input->post('tanggal_berangkat'), 
			'tanggal_tiba' => $this->input->post('tanggal_tiba'), 
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);

		$this->K_Admin->tambah_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

	public function hapusJadwal($id){
		$this->K_Admin->hapusJadwal($id);
		redirect(base_url('admin/dashboard/kelola-jadwal'));
	}

	public function keHalamanEditJadwal($id){
		$data['data_edit'] = $this->K_Admin->getDataEditJadwal($id)->row();
		$data['stasiun'] = $this->K_Admin->getDataStasiun()->result();

		$this->load->view('admin/edit_jadwal', $data);
	}

	public function edit_jadwal(){
		$data = array(
			'nama_kereta' => $this->input->post('nama_kereta'), 
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'tanggal_berangkat' => $this->input->post('tanggal_berangkat'), 
			'tanggal_tiba' => $this->input->post('tanggal_tiba'), 
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);

		$this->K_Admin->edit_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

	public function getKonfirmasiPembayaran(){
		$where = array(
			'status'	=> 1
		);
		return $this->db->get_where('pembayaran', $where);
	}



}	

