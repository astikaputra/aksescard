<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 40px;">
    <h1 class="pull-left">
      Tambah penerimaan Kartu
    <div class="pull-right">
    <a href="<?php echo base_url('penerimaankartu')?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
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
              <form action="<?php echo base_url('penerimaankartu/simpan')?>" method="post" class="form-horizontal"> 
                  <!-- no -->
                 <!--  <div class="form-group ">
                      <label for="no" class="col-md-3 control-label">ID</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php //echo $d_id; ?>" class="form-control" name="txt_id" readonly required>
                      </div>
                  </div> -->
                  <!-- dari -->
                  <div class="form-group ">
                      <label for="dari" class="col-md-3 control-label">Dari</label>
                      <div class="col-md-7 col-sm-12 required">
                      <!--   <input type="text" value="<?php //echo $this->session->userdata['nama_lengkap'];?>" class="form-control" name="txt_dari" required>
                      -->                         
                      <input type="text" value="" class="form-control" name="txt_dari" required>
                      </div>
                  </div>
               
                 
                  <div class="form-group ">
                      <label for="tgl" class="col-md-3 control-label">Tanggal</label>
                      <div class="col-md-7 col-sm-12 required">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="txt_tgl" class="form-control pull-right" id="datepickerNow" data-date-format="dd/mm/yyyy" required>
                        </div>
                      </div>
                  </div>

                     <div class="form-group ">
                      <label for="dari" class="col-md-3 control-label">Qty</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="" class="form-control" name="txt_qty" required>
                      </div>
                  </div>

                  <!-- catatan -->
        <!--           <div class="form-group ">
                      <label for="catatan" class="col-md-3 control-label">Catatan</label>
                      <div class="col-md-7 col-sm-12 required">
                        <textarea style="resize:none;" rows="3" name="txt_catatan" class="form-control" placeholder="Catatan ..." required></textarea>
                      </div>
                  </div> -->

                  <div class="box-footer text-right">
                    <a class="btn btn-default" href="<?php echo base_url('penerimaankartu/tambah')?>"><i class="fa fa-close"></i> Batal</a>
                    <button type="submit" name="btnSimpan" class="btn btn-success"><i class="fa fa-check icon-white"></i> Simpan</button>
                  </div>
                </form>
            </div>
        </div>
    </div> <!-- col -->
  </div><!-- row -->

</div>
<!-- /.content-wrapper-->
