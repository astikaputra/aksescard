<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main_model extends CI_Model {
	public function cek_session(){
		if($this->session->userdata('username')=="")
    	{
     	?><script type="text/javascript" language="javascript">
        	alert("Session Anda habis atau belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
        </script>
        <?php
        	echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
     	}      
	}
    
    public function cek_user($data) {
            $query = $this->db->get_where('tb_user', $data);
            return $query;
    }

    public function cek_kupon($data) {
        $query = $this->db->get_where('tb_karyawan',$data);
        return $query;
    }

    public function updateData($table,$data,$field_key)
    {
        $data = $this->db->update($table,$data,$field_key);
        return $data;
    }
    
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
    
    public function insertData($table,$data)
    {
        $data = $this->db->insert($table,$data);
        return $data;
    }

     public function insertData1($table,$data)
    {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
    public function manualQuery($q)
    {
        $res = $this->db->query($q);
        return $data = $res->result_array();
    }
    public function getSelectedData($table,$data)
    {
        $res = $this->db->get_where($table, $data); 
        return $data = $res->result_array();
    }
    public function getMaxnorcv()
    {
        $q = $this->db->query("select MAX(RIGHT(norcv,5)) as kd_max from tb_riceve");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }   
        $t="RCV";
        //$bln = date("m");
      //  $thn = substr($tgal,6,4);
        $norcv = $t.''.$kd; 
        return $norcv;
    }
public function tambah_order($data)
    {
        $this->db->insert('tbl_order', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
public function total_riceve($id){
    $q = $this->db->query("SELECT SUM( subtotal ) AS total
   FROM  `tb_ricevedetil` 
   WHERE idrcv ='".$id."'");

    if($q->num_rows()>0){
         foreach($q->result() as $k)
            {
                $total = $k->total;
                
            }
        }else{
            $total = 0;
        }

        return $total;
}
public function total_itemriceve($id){

    $q = $this->db->query("select count(id) as conter from tb_ricevedetil where idrcv ='".$id."'");
    if($q->num_rows()>0){
         foreach($q->result() as $k)
            {
                $total = $k->conter;
                
            }
        }else{
            $total = 0;
        }

        return $total;
}
public function Get_periode(){
    $th = date("Y");
    $bln = date("m");
    $periode = $th.''.$bln;

    return $periode ;
}
public function GetTotalsetor($nik)
{
    $q = $this->db->query("SELECT sum(setor) as tot_setor from tb_deposit_detil where nik ='".$nik."'");
    return $data = $q->result_array();
}

public function GetTotaltarik($nik)
{
    $q = $this->db->query("SELECT sum(tarik) as tot_tarik from tb_deposit_detil where nik ='".$nik."'");
    return $data = $q->result_array();
}

public function GetTotalOrder($nik)
{
    $q = $this->db->query("SELECT sum(total_order) as tot_order from tbl_order where status = 'order' and nik ='".$nik."'");
    return $data = $q->result_array();
}

public function saldoOrder($nik){
    $q = $this->db->query("SELECT (b.qty*b.harga) as tot_harga FROM tbl_order a,tbl_detail_order b WHERE b.order_id=a.id and a.nik='".$nik."' and b.terima='N'");
    return $data = $q->result_array();
}

public function Get_ValidasiStok($id){

    $q = $this->db->query("SELECT * FROM tbl_detail_order WHERE order_id = '".$id."'");
    $data = $q->result_array();

    $j=0;
    $valid[$j]= "";
    foreach ($data as $key ) {
        //ambil stok dari table produk
        $idproduk = $key['produk'];
        $i= $this->db->query("SELECT stok, nama_produk  FROM tbl_produk WHERE id_produk = '".$idproduk."'");
        $r= $i->result_array();
        $sisa = $r[0]['stok'] - $key['qty'];
        if($sisa < 0){
            $valid[$j]['nama_produk']= $r[0]['nama_produk'];
            $valid[$j]['sisa']= $sisa;
            $j++;
         } 
    }
    return $data = $valid;
}

public function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
}
?>