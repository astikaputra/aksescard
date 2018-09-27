<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('M_identifikasi','mi'); //load model, simpan ke m
		$this->load->model('M_permintaan','mp'); //load model, simpan ke m
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
			'd_penerimaankartu' => $this->mp->ambilDatapenerimaanbyStatus('waiting')
		);
		$d_header['d_penerimaankartu'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

		$bc['button'] = "Save";
        $bc['action'] = base_url().'penerimaankartu/save';
        $bc['id'] = "";
        $bc['no_kartu'] = "";
        $bc['data1'] = $this->Main_model->manualQuery("SELECT * FROM tb_detail_penerimaan_kartu WHERE id_penerimaan = '1'");
   		$bc['proses'] = "add";

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('penerimaankartu/index', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function simpan(){
		$hasil = $this->mi->simpanDataSolusi();
		if($hasil){
			$this->session->set_flashdata('psn_sukses','Data pekerjaan telah disimpan');
		}
		else {
			$this->session->set_flashdata('psn_error','Gagal menyimpan data pekerjaan');
		}
		redirect(base_url('identifikasi/index'));
	}

	function solusi($kode){
		$did = $this->mi->ambilDataIdentifikasibyID($kode);
		$dpk = $this->mp->ambilDataPermintaanbyID($kode);

		$data = array(
			'id_identifikasi' => $did->id_identifikasi,
			'dari' => $dpk->dari,
			'tanggal_permintaan' => $dpk->tanggal,
			'departemen' => $dpk->departemen,
			'catatan' => $dpk->catatan,
			'tanggal_identifikasi' => $did->tanggal,
			'identifikasi' => $did->identifikasi,
			'oleh' => $did->oleh
			);

		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('identifikasi/solusi', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function update($kode){
		$did = $this->mi->ambilDataIdentifikasibyID($kode);
		$dpk = $this->mp->ambilDataPermintaanbyID($kode);

		$data = array(
			'id_permintaan' => $dpk->id_permintaan,
			'dari' => $dpk->dari,
			'tanggal_permintaan' => $dpk->tanggal,
			'departemen' => $dpk->departemen,
			'catatan' => $dpk->catatan,
			'tanggal_identifikasi' => $did->tanggal,
			'identifikasi' => $did->identifikasi,
			'oleh' => $did->oleh,
			'persentase' => $did->persentase
			);

		$d_header['d_permintaan'] = $this->mp->ambilDataPermintaanbyStatus('waiting');
		$d_header['d_progress'] = $this->mp->ambilDataPermintaanbyStatusJoin('on progress');

		$d_header['total_waiting'] = $this->mp->hitungDataPermintaanbyStatus('waiting');
		$d_header['total_progress'] = $this->mp->hitungDataPermintaanbyStatus('on progress');

		$this->load->view('template/header',$d_header);
		$this->load->view('template/leftside');
		$this->load->view('identifikasi/update', $data);
		$this->load->view('template/footer_js');
		$this->load->view('template/footer');
	}

	function simpan_update(){
    $hasil = $this->mi->updateDataIdentifikasi();
    if($hasil){
      $this->session->set_flashdata('psn_sukses','Identifikasi telah di-update');
    }
    else {
      $this->session->set_flashdata('psn_error','Gagal meng-update data identifikasi');
    }
    redirect(base_url('identifikasi'));
  }

}
