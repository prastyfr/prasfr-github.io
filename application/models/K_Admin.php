<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class K_Admin extends CI_Model {


	public function CekLogin($data){
		return $this->db->get_where('admin', $data)->num_rows();
	}

	public function getDataStasiun(){
		return $this->db->get('stasiun');
	}

	public function tambah_stasiun($nama){
		$data = array(
			'nama_stasiun' => $nama,
			 );
		return $this->db->insert('stasiun', $data);
	}

	public function delete_stasiun($id)
	{
	    $this->db->where('id', $id);
		return $this->db->delete('stasiun');
	}

	public function getDataEditStasiun($id)
	{
	    $data = array(
			'id' => $id,
			 );
		return $this->db->get_where('stasiun', $data);
	}

	public function edit_stasiun($nama)
	{
		$data = array(
			'nama_stasiun' => $nama,
			 ); 
	    $this->db->where('id', $this->input->post('id'));
		return $this->db->update('stasiun', $data);
	}

	public function tambah_jadwal($data){
		return $this->db->insert('jadwal', $data);
	}

	public function getJadwal(){
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->from('jadwal');
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get();
	}

	public function hapusJadwal($id){
		$this->db->where('id', $id);
		return $this->db->delete('jadwal');
	}

	public function getDataEditJadwal($id){
		$data = array(
			'jadwal.id' => $id, 
		);
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->from('jadwal');
		$this->db->where($data);
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get();
	}

	public function edit_jadwal($data){
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('jadwal', $data);
	}

	public function keHalamanKonfirPem(){
		$data['list']	= $this->M_Admin->getKonfirmasiPembayaran()->result();

		$this->load->view('admin/konfirmasi_pembayaran', $data);
	}

	public function verifikasiPembayaran($id){
		$update = $this->K_Admin->updatePembayaran($id);

		if($update){
			$this->session->set_flashdata('pesan','Berhasil Melakukan Verifikasi!');
			redirect('admin/konfirmasi-pembayaran');
		}else{
			echo "gagal";
		}
	}



}
