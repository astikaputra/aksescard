<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penerimaankartu extends CI_Model {

	function idpenerimaan(){
		$q = $this->db->query("select MAX(RIGHT(id_penerimaan,5)) as kd_max from tb_penerimaan_kartu");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "PK-".$kd;
	}

	function ambilDataDepartemen(){
    $this->db->order_by('nama_departemen','asc');
    $query = $this->db->get('tb_departemen');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

	function ambilDatapenerimaan(){
    $query = $this->db->get('tb_penerimaan_kartu');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }



	function ambilDatapenerimaanbyStatus($status){
		$this->db->where('status', $status);
		//$this->db->order_by('id_penerimaan','asc');
    $query = $this->db->get('tb_penerimaan_kartu');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

    function ambilDatapenerimaan1($status){
    //$this->db->where('status', $status);
    //$this->db->order_by('id_penerimaan','asc');
    $query = $this->db->get('tb_penerimaan_kartu');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }




	function ambilDatapenerimaanbyStatusJoin($status){
 		$this->db->select('*');
		//$this->db->select('tb_penerimaan.id_penerimaan, tb_penerimaan.catatan, tb_status, tb_identifikasi.persen');
		$this->db->where('tb_penerimaan_kartu.status',$status);
		$this->db->from('tb_penerimaan_kartu');
		$this->db->join('tb_identifikasi', 'tb_penerimaan_kartu.id_penerimaan = tb_identifikasi.id_identifikasi');

		//$this->db->order_by('id_penerimaan','asc');
    $query = $this->db->get('');
    //if($query->num_rows()>0)
    //{
      return $query->result();
    //}
    //else
    //{
    //  return false;
  //  }
  }

	function hitungTotalDatapenerimaan(){
		//$this->db->where('status', $status);
		//$this->db->order_by('id_penerimaan','asc');
    $query = $this->db->get('tb_penerimaan_kartu');
		$total=$query->num_rows();
    if($query->num_rows()>0)
    {
      return $total;
    }
    else
    {
      return false;
    }
  }
	function hitungDatapenerimaanbyStatus($status){
		$this->db->where('status', $status);
		//$this->db->order_by('id_penerimaan','asc');
    $query = $this->db->get('tb_penerimaan_kartu');
		$total=$query->num_rows();
    if($query->num_rows()>0)
    {
      return $total;
    }
    else
    {
      return false;
    }
  }

	function insertData($table, $data){
		return $this->db->insert($table, $data);
	}

	function ambilDatapenerimaanbyID($id){
     $this->db->where('id_penerimaan', $id);
     $query = $this->db->get('tb_penerimaan_kartu');
     if($query->num_rows()>0)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
  }



	function simpanDatapenerimaan(){
		//$id = $this->input->post('txt_id');
 		$nofrid = $this->input->post('txt_id');
 //		$departemen = $this->input->post('opt_departemen');
 		$status = "2";
 		$tanggal = date("Y-m-d");
    $jam = date("H:i:s");
    $akses = $this->input->post('id');
    $user = $this->session->userdata('nama_user');


		$data = array(
			//'id_penerimaan'=> $id,
			'fridnum' => $nofrid,
			'status' => $status,			
			'tanggal' => $tanggal,
      'akses' => $akses,
      'user' => $user,
			);

//print_r($data);
		$this->db->insert('tb_card', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }
    else {
      return false;
    }
	}

	function updateDatapenerimaan(){
		$id = $this->input->post('txt_id');
 		$dari = $this->input->post('txt_dari');
 		$departemen = $this->input->post('opt_departemen');
 		$catatan = $this->input->post('txt_catatan');
 		$tanggal = $this->input->post('txt_tgl');

 		$data = array(
 			'dari' => $dari,
 			'departemen' => $departemen,
 			'catatan' => $catatan,
 			'tanggal' => $tanggal
 			);

    $this->db->where('id_penerimaan', $id);
    $this->db->update('tb_penerimaan_kartu', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }

	function hapusDatapenerimaan($id){
		$this->db->where('id_penerimaan', $id);
		$this->db->delete('tb_penerimaan_kartu');
		if($this->db->affected_rows() > 0){
			return true;
		}else {
			return false;
		}
	}

    function ambilDataaktivasi(){
    $query = $this->db->get('tb_aktivasi_kartu');
    if($query->num_rows()>0)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

    function ambilDataaktivasibyID($id){
     $this->db->where('id_aktivasi', $id);
     $query = $this->db->get('tb_aktivasi_kartu');
     if($query->num_rows()>0)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
  }


    function simpanDataaktivasi(){
    $by = "Admin";
    $from_date = $this->input->post('txt_from_tgl');
    $to_date = $this->input->post('txt_to_tgl');
  
    $qty = $this->input->post('txt_qty');


    $data = array(
      //'id_penerimaan'=> $id,
      'by' => $by,
      'from_date' => $from_date,      
      'to_date' => $to_date,
      'qty' => $qty,
      );

    $this->db->insert('tb_aktivasi_kartu', $data);
    if($this->db->affected_rows() > 0){
      return true;
    }
    else {
      return false;
    }
  }


}
