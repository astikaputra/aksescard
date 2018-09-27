<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aktivasikartu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_penerimaankartu','mp'); //load model, simpan ke m
		$this->load->model('M_identifikasi','mi'); //load model, simpan ke m
		$this->load->model('Main_model');
		$this->_cek_login();
	}

	function _cek_login()
	{
		if (!isset($this->session->userdata['id_user'])) {
	  redirect(base_url("login"));
	  }
	}

	function index()
	{
		$data = array(
			'd_aktivasikartu' => $this->mp->ambilDataaktivasi()
		);
		$d_header['d_penerimaankartu'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');
		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('aktivasikartu/index', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function tambah()
	{
		$data = array(
				//'d_departemen' => $this->mp->ambilDataDepartemen(),
				//'d_id' => $this->mp->idaktivasi(),
			);
		$d_header['d_penerimaan'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$d_header['title'] = 'penerimaankartu';

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('aktivasikartu/tambah', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}


	function simpan(){
		$hasil = $this->mp->simpanDataaktivasi();
		//print_r($hasil);
		if($hasil){
			$this->session->set_flashdata('psn_sukses','Data Aktivasi telah disimpan');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		}
		redirect(base_url('aktivasikartu'));
	}

	function ubah($id)
	{
			$data = array(
				'd_departemen' => $this->mp->ambilDataDepartemen(),
				'd_penerimaan' => $this->mp->ambilDatapenerimaanbyID($id)
			);
		$d_header['d_penerimaan'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('penerimaankartu/ubah', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function update(){
    $hasil = $this->mp->updateDatapenerimaan();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Data telah diubah');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mengubah data ');
    }
    redirect(base_url('penerimaankartu'));
  }

	function hapus($id){
    $hasil = $this->mp->hapusDatapenerimaan($id);
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dihapus');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal menghapus data ');
    }
    redirect(base_url('penerimaankartu'));
  }

	function cetak($id){
    $hasil = $this->mp->hapusDatapenerimaan($id);
    if($hasil){
    $this->session->set_flashdata('psn_sukses','Data telah dicetak');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal mencetak data ');
    }
    redirect(base_url('penerimaankartu'));
  }


	function identifikasi($id_penerimaan = 0){
		$data = $this->mp->ambilDatapenerimaanbyID($id_penerimaan);

				$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$bc['button'] = "Save";
        $bc['action'] = base_url().'penerimaankartu/save';
        $bc['id'] = "";
        $bc['no_kartu'] = "";
        $bc['data'] = $this->Main_model->manualQuery("SELECT * FROM tb_detail_penerimaan_kartu");
   		$bc['proses'] = "add";

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('penerimaankartu/index', $bc);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}
	//simpan identifikasi
	//terus ubah status menjadi on progress
	function simpan_identifikasi(){
		$data = $this->mi->simpanDataIdentifikasi();
		if($data){
			$this->session->set_flashdata('psn_sukses','Pekerjaan telah diidentifikasi');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal identifikasi pekerjaan');
		}
		redirect(base_url('penerimaankartu/terima/'));
	}

public function save($id_aktivasi)
{
  
		$id1 = $this->input->post('id');
		//$no_kartu = $this->input->post('txt_id');
	   // $tanggal = date('Y-m-d  H:i:s');
		$status = "Active";
		

		//$tanggal = $this->input->post('txt_tanggal_identifikasi');
		//$oleh = $this->session->userdata['nama_lengkap'];
		//if($no_kartu != "")
		//{
		$row = $this->Main_model->manualQuery("Select * From tb_detail_penerimaan_kartu where no_kartu = ".$no_kartu." ");
		
		if($row)
		{
		  $data['id_aktivasi'] = $id1;
		  $data['status'] = $status;
         // $data['tgl'] = $tgl;
           	//echo"<prev>";
      	   $res = $this->main_model->updateData('tb_detail_penerimaan_kartu',$data,$no_kartu);
           if($res)
           {
          $this->session->set_flashdata('berhasil',' <div class="alert alert-success alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Input Sukses!</strong> Transaksi anda berhasil di proses
           </div>');
      		 
	        //Cara redirect dynamic URI segment
		     redirect(base_url('aktivasikartu/aktivasi/'.$id1));
		}
		
	}

  }
  

  function aktivasi($id_aktivasi = 0){
		$data = $this->mp->ambilDataaktivasibyID($id_aktivasi);

		$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$bc['button'] = "Save";
        $bc['action'] = base_url().'aktivasikartu/save';
        $bc['id'] = "";
        $bc['no_kartu'] = "";
        $bc['data1'] = $this->Main_model->manualQuery("SELECT * FROM tb_detail_penerimaan_kartu where id_aktivasi = $id_aktivasi");
   		$bc['proses'] = "add";
   		$bc['id_aktivasi'] = $id_aktivasi;


		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('aktivasikartu/aktivasi', $bc);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}


}
