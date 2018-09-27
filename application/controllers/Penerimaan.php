<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

public function __construct()
  {
    parent::__construct();
     $this->load->model('M_penerimaankartu','mp');
    $this->load->model('main_model');
   
  }

public function index()
	{
		//$data= $this->main_model->manualQuery("Select * From tb_taping");
		//print_r($data);

    $bc['button'] = "Save";
    $bc['title'] = "Transaksi Koperasi";
    $bc['action'] = base_url().'tabping/save';
    $bc['id'] = "";
    $bc['no_kartu'] = "";
    // $bc['data'] = "";$this->main_model->manualQuery("SELECT b.nama, b.departemen, a.tgl,a.jam,a.lokasi,a.id FROM tb_tabping a, tb_karyawan b where a.no_kartu=b.no_kartu and a.lokasi='1' order by a.id desc LIMIT 10");
    $bc['proses'] = "add";

    $d_header['d_penerimaan'] = $this->mp->ambilDatapenerimaanbyStatus('waiting');
    $d_header['d_progress'] = $this->mp->ambilDatapenerimaanbyStatusJoin('on progress');

    $d_header['total_waiting'] = $this->mp->hitungDatapenerimaanbyStatus('waiting');
    $d_header['total_progress'] = $this->mp->hitungDatapenerimaanbyStatus('on progress');

    $d_header['title'] = 'penerimaankartu';

    $this->load->view('template/header',$d_header);
    $this->load->view('template/leftside');
    $this->load->view('permintaan_/index', $bc);
    $this->load->view('template/footer_js');
    $this->load->view('template/footer');
	
	}

public function save()
{
  
  $no_kartu  = $_POST['no_kartu'];
  $tgl = date("Y-m-d");
  $jam = date("H:i:s");
  
  $row = $this->main_model->manualQuery("Select * From tb_karyawan where no_kartu = ".$no_kartu." ");
  if($row)
  {
      $data['no_kartu'] = $no_kartu;
      $data['tgl'] = $tgl;

      $row2 = $this->main_model->getSelectedData('tb_tabping',$data);
    if($row2)
    {
     $this->session->set_flashdata('berhasil',' <div class="alert alert-danger alert-dismissable" role="alert">
     <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <strong>Error!</strong> Anda sudah melakukan transaksi hari ini
      </div>');
      redirect('tabping');
    }
    else
    {
     $lokasi = "1";
       $data = 
        array(
              'no_kartu'=> $no_kartu,
              'tgl'=> $tgl,
              'jam'=> $jam,
              'lokasi'=> $lokasi);  
      /*echo"<prev>";
      print_r($data);
      echo "</prev>";*/
      $res = $this->main_model->insertData('tb_tabping',$data);
      if($res)
      {
         $this->session->set_flashdata('berhasil',' <div class="alert alert-success alert-dismissible" role="alert">
       <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Input Sukses!</strong> Transaksi anda berhasil di proses
        </div>');
       redirect('tabping');
      }
      else
      {
         $this->session->set_flashdata('berhasil',' <div class="alert alert-danger alert-dismissable" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Error!</strong> Proses Insert data Gagal...
        </div>');
         redirect('tabping');
      }
    }
  }
    else{
      //jika data karyawan belum ada..
     $this->session->set_flashdata('berhasil',' <div class="alert alert-danger alert-dismissable" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Error!</strong> Anda belum terdaftar silahkan hubungi TAD.
        </div>');
         redirect('tabping'); }
  
  }
  

public function save1()
{
  
  $no_kartu  = $_POST['no_kartu'];
  $tgl = date("Y-m-d");
  $jam = date("H:m:s");
  
  $row = $this->main_model->manualQuery("Select * From tb_karyawan where no_kartu = ".$no_kartu." ");
  if($row)
  {
      $data['no_kartu'] = $no_kartu;
      $data['tgl'] = $tgl;
      $data1['nik']=$row[0]['nik'];
      $data1['tgl'] = $tgl;
      $data1['aktif'] = "Y" ;

    $row2 = $this->main_model->getSelectedData('tb_tabping',$data);
    if($row2)
    {
      //cek data tambahan kupon makan
      $row3 = $this->main_model->getSelectedData('tb_kupon',$data1);
      if($row3)
      {

         $lokasi = "2";
         $data = 
         array(
              'no_kartu'=> $no_kartu,
              'tgl'=> $tgl,
              'jam'=> $jam,
              'lokasi'=> $lokasi);
        $res = $this->main_model->insertData('tb_tabping',$data);
        if($res)
          {
            //update data kupon menjadi non aktif
          $id['id'] = $row3[0]['id'];
          $dat['aktif'] = "N";
          $this->main_model->updateData("tb_kupon",$dat,$id);
          $this->session->set_flashdata('berhasil',' <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Input Sukses!</strong> Transaksi kupon tambahan anda berhasil di proses
            </div>');
          redirect('tabping/sfg');
          }
          else
          {
            $this->session->set_flashdata('berhasil',' <div class="alert alert-danger alert-dismissable" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Error!</strong> Proses Insert data Gagal...
            </div>');
          redirect('tabping/sfg');
          }

      }
      else{
      $this->session->set_flashdata('berhasil',' <div class="alert alert-danger alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <strong>Error!</strong> Anda sudah melakukan transaksi hari ini
      </div>');
      redirect('tabping/sfg');
      }
    }
    else
    {
     $lokasi = "2";
       $data = 
        array(
              'no_kartu'=> $no_kartu,
              'tgl'=> $tgl,
              'jam'=> $jam,
              'lokasi'=> $lokasi);  
      /*echo"<prev>";
      print_r($data);
      echo "</prev>";*/
      $res = $this->main_model->insertData('tb_tabping',$data);
      if($res)
      {
         $this->session->set_flashdata('berhasil',' <div class="alert alert-success alert-dismissible" role="alert">
       <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Input Sukses!</strong> Transaksi anda berhasil di proses
        </div>');
       redirect('tabping/sfg');
      }
      else
      {
         $this->session->set_flashdata('berhasil',' <div class="alert alert-danger alert-dismissable" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Error!</strong> Proses Insert data Gagal...
        </div>');
         redirect('tabping/sfg');
      }
    }
  }
    else{
      //jika data karyawan belum ada..
     $this->session->set_flashdata('berhasil',' <div class="alert alert-danger alert-dismissable" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Error!</strong> Anda belum terdaftar silahkan hubungi TAD.
        </div>');
         redirect('tabping'); }
  
  }

public function today_sfg()
{

   $tgl = date("Y-m-d");

     $bc['data'] = $this->main_model->manualQuery("SELECT b.nama,b.nik, b.departemen, a.tgl,a.jam,a.lokasi,a.id FROM tb_tabping a, tb_karyawan b where a.no_kartu=b.no_kartu and a.lokasi='2' and a.tgl='".$tgl."' order by a.id desc");
     $bc['judul'] = "Catring";
     $bc['aksi'] = "cetak/cetak_today_sfg_excel";

    $this->load->view('menu/head');
    $this->load->view('menu/menu1');
    $this->load->view('tabping/tables_today', $bc);
}

public function today_kopkar()
{

   $tgl = date("Y-m-d");

     $bc['data'] = $this->main_model->manualQuery("SELECT b.nama,b.nik, b.departemen, a.tgl,a.jam,a.lokasi,a.id FROM tb_tabping a, tb_karyawan b where a.no_kartu=b.no_kartu and a.lokasi='1' and a.tgl='".$tgl."' order by a.id desc");
     $bc['judul'] = "Koperasi ";
     $bc['aksi'] = "cetak/cetak_today_kopkar_excel";

    $this->load->view('menu/head');
    $this->load->view('menu/menu');
    $this->load->view('tabping/tables_today', $bc);
}

public function koperasi_data(){

  $tgl = date("Y-m-d");

  $tgl1= "0000-00-00";
  $tgl2= "0000-00-00";

     $bc['data'] = $this->main_model->manualQuery("SELECT b.nik,b.nama,b.departemen,a.no_kartu, count(a.no_kartu) as jum  FROM tb_tabping a,tb_karyawan b WHERE  lokasi='1' and a.no_kartu=b.no_kartu and a.tgl between '".$tgl1."'and '".$tgl2."' group by a.no_kartu");
     
    $bc['tgl1'] = "";
    $bc['tgl2'] = "";
   // $bc['data'] = "";
    $bc['judul'] = "Koperasi ";
    $bc['button'] = "submit"; 
    $bc['aksi'] = site_url('tabping/koperasi_data_view');

   $this->load->view('menu/head');
   $this->load->view('menu/menu');
   $this->load->view('tabping/tables_kop', $bc);
}

public function koperasi_data_view(){

  $tgl = date("Y-m-d");

  $tgl1= $_POST['tgl1'];
  $tgl2= $_POST['tgl2'];

     $bc['data'] = $this->main_model->manualQuery("SELECT b.nik, b.nama,b.departemen,a.no_kartu, count(a.no_kartu) as jum  FROM tb_tabping a,tb_karyawan b WHERE  lokasi='1' and a.no_kartu=b.no_kartu and a.tgl between '".$tgl1."'and '".$tgl2."' group by a.no_kartu");
     
    $bc['tgl1'] = $tgl1;
    $bc['tgl2'] = $tgl2;
   // $bc['data'] = "";
    $bc['judul'] = "Koperasi ";
    $bc['button'] = "submit"; 
    $bc['aksi'] = site_url('tabping/koperasi_data_view');

   $this->load->view('menu/head');
   $this->load->view('menu/menu');
   $this->load->view('tabping/tables_kop', $bc);
}

public function sfg_data(){

  $tgl = date("Y-m-d");

  $tgl1= "0000-00-00";
  $tgl2= "0000-00-00";

     $bc['data'] = $this->main_model->manualQuery("SELECT b.nik,b.nama,b.departemen,a.no_kartu, count(a.no_kartu) as jum  FROM tb_tabping a,tb_karyawan b WHERE  lokasi='2' and a.no_kartu=b.no_kartu and a.tgl between '".$tgl1."'and '".$tgl2."' group by a.no_kartu");
     
    $bc['tgl1'] = "";
    $bc['tgl2'] = "";
   // $bc['data'] = "";
    $bc['judul'] = "Catering ";
    $bc['button'] = "submit"; 
    $bc['aksi'] = site_url('tabping/sfg_data_view');

   $this->load->view('menu/head');
   $this->load->view('menu/menu');
   $this->load->view('tabping/tables_kop', $bc);
}

public function sfg_data_view(){

  $tgl = date("Y-m-d");

  $tgl1= $_POST['tgl1'];
  $tgl2= $_POST['tgl2'];

     $bc['data'] = $this->main_model->manualQuery("SELECT b.nik, b.nama,b.departemen,a.no_kartu, count(a.no_kartu) as jum  FROM tb_tabping a,tb_karyawan b WHERE  lokasi='2' and a.no_kartu=b.no_kartu and a.tgl between '".$tgl1."'and '".$tgl2."' group by a.no_kartu");
     
    $bc['tgl1'] = $tgl1;
    $bc['tgl2'] = $tgl2;
   // $bc['data'] = "";
    $bc['judul'] = "Catering ";
    $bc['button'] = "submit"; 
    $bc['aksi'] = site_url('tabping/sfg_data_view');

   $this->load->view('menu/head');
   $this->load->view('menu/menu');
   $this->load->view('tabping/tables_kop', $bc);
}


}
?>
