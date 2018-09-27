<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 40px;">
    <h1 class="pull-left">
      Aktivasi Kartu
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
              <form action="<?php echo base_url('aktivasikartu/simpan')?>" method="post" class="form-horizontal"> 
                  <div class="form-group ">
                      <label for="tgl" class="col-md-3 control-label">Dari Tanggal</label>
                      <div class="col-md-7 col-sm-12 required">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="txt_from_tgl" class="form-control pull-right" id="datepickerNow" data-date-format="dd/mm/yyyy" required>
                        </div>
                      </div>
                  </div>
                
                        <div class="form-group ">
                      <label for="tgl" class="col-md-3 control-label">Sampai Tanggal</label>
                      <div class="col-md-7 col-sm-12 required">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="txt_to_tgl" class="form-control pull-right" id="datepicker" data-date-format="dd/mm/yyyy" required>
                        </div>
                      </div>
                  </div>

                     <div class="form-group ">
                      <label for="dari" class="col-md-3 control-label">Qty</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="" class="form-control" name="txt_qty" required>
                      </div>
                  </div>

                  <div class="box-footer text-right">
                    <a class="btn btn-default" href="<?php echo base_url('aktivasikartu/tambah')?>"><i class="fa fa-close"></i> Batal</a>
                    <button type="submit" name="btnSimpan" class="btn btn-success"><i class="fa fa-check icon-white"></i> Simpan</button>
                  </div>
                </form>
            </div>
        </div>
    </div> <!-- col -->
  </div><!-- row -->

</div>
<!-- /.content-wrapper-->
