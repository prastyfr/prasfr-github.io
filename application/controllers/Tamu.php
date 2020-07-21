<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {

	public function keHalamanDepan()
	{
		$data['stasiun'] = $this->K_Tamu->getDataStasiun()->result();

		$this->load->view('tamu/halaman_depan', $data);


	}
	public function keHalamanKonfirmasi()
	{
		$data['judul'] = 'Halaman Konfirmasi';
		$this->load->view('tamu/template/header', $data);
		$this->load->view('tamu/halaman_konfirmasi');
	}
	public function keHalamanJadwal()
	{
		$data = array(
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan')
		);
		$data['tiket']  = $this->K_Tamu->cari_tiket($data)->result();
		$data['penumpang'] = $this->input->post('jumlah');
		$data['stasiun'] = $this->K_Tamu->getDataStasiun()->result();
		$this->load->view('tamu/dasboard_jadwal',$data);

	}


	public function pesan($id){

		$data['info'] = $this->K_Tamu->getDataInfoPesan($id)->row();
		$data['id_jadwal'] = $id;
		$this->load->view('tamu/data_diri', $data);
	}

	public function pesanTiket(){
		$penumpang = $this->input->post('penumpang');

		// Generate No Pembayaran
		$cek = $this->K_Tamu->getPembayaran()->num_rows()+1;

		$no_pembayaran = 'AC246'.$cek;
		
		$harga = $this->input->post('harga');

		$total_pembayaran = $penumpang*$harga;

		// Input Pembayaran
		$no_tiket = 'Tk001'.$cek;

		$data = array(
			'no_pembayaran' => $no_pembayaran,
			'no_tiket' => $no_tiket,
			'total_pembayaran' => $total_pembayaran,
			'status' => 0
		);

		$this->K_Tamu->insertPembayaran($data);


		// Generate Nomor Tiket
		$cek = $this->K_Tamu->getTiket()->num_rows()+1;

		

		// Input data Penumpang
		for ($i=1;$i<=$penumpang;$i++) { 
			$data = array(
				'nomor_tiket' => $no_tiket,
				'nama' => $this->input->post('nama'.$i),
				'no_ktp' => $this->input->post('identitas'.$i)
			);

			$this->K_Tamu->insertPenumpang($data);
		}

		// input Data Pemesan
		$data = array(
			'nomor_tiket' => $no_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'), 
			'email' => $this->input->post('email'), 
			'no_telepon' => $this->input->post('no_telp'), 
			'alamat' => $this->input->post('alamat'),
			'tanggal' => date('Y-m-d h:i:s')

		);

		$this->K_Tamu->insertPemesan($data);

		$this->session->set_flashdata('nomor', $no_pembayaran);
		$this->session->set_flashdata('total', $total_pembayaran);
		redirect('pembayaran', $total_pembayaran);
		
	}
	public function keHalamanPembayaran(){
		$this->load->view('tamu/pembayaran');
	}

	public function cekKonfirmasi(){
		$kode = $this->input->post('kode');

		redirect("konfirmasi?kode=".$kode);

	}

}

