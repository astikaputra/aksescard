<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pemberiankartu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_penerimaankartu','mp'); //load model, simpan ke m
		$this->load->model('M_identifikasi','mi'); //load model, simpan ke m
		$this->load->model('main_model');
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
				'action' => base_url().'pemberiankartu/save1',
				'd_kartu' => $this->main_model->manualQuery("SELECT * FROM tb_card where status = '1' ORDER BY id DESC")
			);
		$d_header['d_penerimaankartu'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('pemberiankartu/index', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function save1(){
		$id = $this->input->post('id');
		$rfid = $this->input->post('rfid');
		$pasien = $this->input->post('pasien');
		$room = $this->input->post('room');

		if($pasien== ""){
			$this->session->set_flashdata('psn_error','Nama Pasien Tidak Boleh Kosong ');

		}else if ($room == ""){
            $this->session->set_flashdata('psn_error','Room Pasien Tidak Boleh Kosong ');
		}else{
		  $data = array(
			"pasien"=> $pasien,
			"room"=> $room,
			"tgl_aktif" => date("Y-m-d"),
			"status"=> "2");
		  // print_r($data);
		   $where = array("id"=>$id);
		   $hasil = $this->main_model->updateData('tb_card',$data,$where);
		   if($hasil){
		   	$data1 = array("keterangan" => "Aktivasi a/n-->".$pasien."-".$room,
		   		"tgl" => date("Y-m-d"),
		   	 	"jam" => date("H:i:s"),
		   	    "status" => '2',
		   	    "rfid" => $rfid,
		   	    "user" => $this->session->userdata('nama_user'));
		   	// print_r($data1);
		   	$this->main_model->insertData('tb_logcard',$data1);
			$this->session->set_flashdata('psn_sukses','Data Aktivasi telah disimpan');
		   }
		   else {
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		   }
	    }
	   redirect(base_url('pemberiankartu'));
	}

    function valid()
	   {
		    $data = array(
				'action' => base_url().'pemberiankartu/do_valid',
				'd_kartu' => $this->main_model->manualQuery("SELECT * FROM tb_card where status = '2' ORDER BY id DESC")
			);
		   $d_header['d_penerimaankartu'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
		   $d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

		   $d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		 $d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('pemberiankartu/indexvalid', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function do_valid(){

		$rfid = $this->input->post('rfid');
		$pasien = $this->input->post('pasien');
		$room = $this->input->post('room');
		$tgl1 = $this->input->post('tgl_aktif');// pendefinisian tanggal awal
		$tgl2 = date('Y-m-d', strtotime('+4 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
		$id = $this->input->post('id');
		$status = "3";
		//echo $tgl2;

		$data = array('status'=> $status, 'tgl_exp'=> $tgl2);
		$where = array('id'=> $id);

		$hasil = $this->main_model->updateData('tb_card',$data,$where);
		if($hasil){
				$data1 = array("keterangan" => "Valid a/n-->".$pasien."-".$room,
		   		"tgl" => date("Y-m-d"),
		   	 	"jam" => date("H:i:s"),
		   	    "status" => '3',
		   	    "rfid" => $rfid,
		   	    "user" => $this->session->userdata('nama_user'));
		   	// print_r($data1);
		   	$this->main_model->insertData('tb_logcard',$data1);
			$this->session->set_flashdata('psn_sukses','Data Aktivasi telah disimpan');
		}else{
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		}
		redirect(base_url('pemberiankartu/valid'));
	}

	function retur(){
		    $data = array(
				'action' => base_url().'pemberiankartu/do_retur',
				'd_kartu' => $this->main_model->manualQuery("SELECT * FROM tb_card where status = '3' ORDER BY id DESC")
			);
		   $d_header['d_penerimaankartu'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
		   $d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

		   $d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		 $d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('pemberiankartu/indexretur', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function do_retur(){
		
		$id = $this->input->post('id');
		$rfid = $this->input->post('rfid');
		$status = "1";

		$data = array('status'=> $status, 
			'tgl_exp'=> "0000-00-00",
		    'tgl_aktif'=> "0000-00-00",
		    'status'=> $status,
		    'pasien'=> " ",
		    'room'=> " ",);
		$where = array('id'=> $id);

		$hasil = $this->main_model->updateData('tb_card',$data,$where);
		if($hasil){
				$data1 = array("keterangan" => "Kartu Retur ",
		   		"tgl" => date("Y-m-d"),
		   	 	"jam" => date("H:i:s"),
		   	    "status" => '1',
		   	    "rfid" => $rfid,
		   	    "user" => $this->session->userdata('nama_user'));
		   	// print_r($data1);
		   	$this->main_model->insertData('tb_logcard',$data1);
			$this->session->set_flashdata('psn_sukses','Retur Kartu telah disimpan');
		}else{
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		}
		redirect(base_url('pemberiankartu/retur'));

	} 
	
	function simpan(){
		$hasil = $this->mp->simpanDatapenerimaan();
		//print_r($hasil);
		if($hasil){
			$this->session->set_flashdata('psn_sukses','Data telah disimpan');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal menyimpan data ');
		}
		redirect(base_url('penerimaankartu'));
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

public function save($id_penerimaan)
{
  
		$id1 = $this->input->post('id');
		$no_kartu = $this->input->post('txt_id');
	    $tanggal = date('Y-m-d  H:i:s');
		$status = "Receive";
		

		//$tanggal = $this->input->post('txt_tanggal_identifikasi');
		//$oleh = $this->session->userdata['nama_lengkap'];
		if($no_kartu != "")
		{
		$row = $this->Main_model->manualQuery("Select * From tb_detail_penerimaan_kartu where no_kartu = ".$no_kartu." and id_penerimaan = ".$id1."");
		
		if($row){
			$this->session->set_flashdata('psn_error','kartu Sudah ada');
		     //redirect(base_url('penerimaankartu/terima/'.$id1))
		     }
          else{
           	
            $data = array(
				'id_penerimaan' => $id1,	
				'no_kartu' => $no_kartu,			
				'tanggal' => $tanggal,
				'status' => $status
				);
			//print_r($data);
			$this->db->insert('tb_detail_penerimaan_kartu', $data);
			$this->session->set_flashdata('psn_sukses','Sukses');
	         }
		}
	        //Cara redirect dynamic URI segment
		     redirect(base_url('penerimaankartu/terima/'.$id1));
		

  }
  

  function terima($id_penerimaan = 0){
		$data = $this->mp->ambilDatapenerimaanbyID($id_penerimaan);

		$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$bc['button'] = "Save";
        $bc['action'] = base_url().'penerimaankartu/save';
        $bc['id'] = "";
        $bc['no_kartu'] = "";
        $bc['data1'] = $this->Main_model->manualQuery("SELECT * FROM tb_detail_penerimaan_kartu where id_penerimaan = $id_penerimaan");
   		$bc['proses'] = "add";
   		$bc['id_penerimaan'] = $id_penerimaan;


		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('penerimaankartu/terima', $bc);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}


}
