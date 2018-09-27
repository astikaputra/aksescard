<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 40px;">
    <h1 class="pull-left">
      Aktivasi Kartu
    </h1>
    <div class="pull-right">
    <a href="<?php echo base_url('aktivasikartu')?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </section>

  <?php echo $this->session->flashdata('psn_sukses');?>
  <?php
    if($this->session->flashdata('psn_sukses')){
  ?>
    <div class="alert alert-success">
      <?php echo $this->session->flashdata('psn_sukses');?>
    </div>
  <?php
  }
  ?>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
            <form role="form" action="<?php echo $action;?>" method="POST">
                <div class="form-group ">
                    <label for="no" class="col-md-3 control-label">INPUT ID CARD</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $no_kartu; ?>" class="form-control" name="txt_id" autofocus>
                        <input type="hidden" name="id" value="<?php echo $id_aktivasi; ?>"/><br>
                        <button type="submit" hidden="true"><?php echo $button ?></button> 
                      </div>
            </div>                 
           
        <div class="box-body">
        <?php echo $this->session->flashdata('berhasil') ?>
            <div class="row">
              <div class="col-md-12">
                <table id="dataTable1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>ID AKTIVASI</th>
                         <th>NO KARTU</th>
                         <th>TANGGAL</th>
                         <th>STATUS</th>
                      </tr>
                 </thead>
                 <tbody>
            <?php 
             $no = 1;
             foreach ($data1 as $r) {?>
                    <tr>
                        <td ><?php echo $no;?></td>
                        <td width="25%"><?php echo  $r['id_aktivasi'];?></td>
                        <td width="25%"><?php echo  $r['no_kartu'];?></td>
                        <td width="25%"><?php echo  $r['tanggal'];?></td>
                        <td width="50%"><center><?php echo $r['status']; $no++?></center></td>
                        <td>
                         <a class="btn btn-danger btn-xs hapus-data" href="#" data-url="<?php //echo base_url() . 'refill/hapus/' . $d->id_refill ?>"  rel="tooltip" title="Hapus"><i class="fa fa-trash-o "></i></a>
                        </td>
                    </tr>


                <?php }  ?>
                 </tbody>
             </table>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!--box body-->




 


                    <div class="box-footer text-right">
                   <!--  <a class="btn btn-default" href="<?php //echo base_url('penerimaan/identifikasi/'. $id_penerimaan )?>"><i class="fa fa-close"></i> Batal</a>
                    <button type="submit" name="btnSimpan" class="btn btn-success"><i class="fa fa-check icon-white"></i> Simpan</button> -->
                  </div>
                </form>
            </div>
        </div>
    </div> <!-- col -->
  </div><!-- row -->

</div>
<!-- /.content-wrapper-->