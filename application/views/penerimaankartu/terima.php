<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 40px;">
    <h1 class="pull-left">
      Penerimaan Kartu
    </h1>
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
         <!--      <form action="<?php //echo base_url('penerimaankartu/simpan_identifikasi')?>" method="post" class="form-horizontal"> -->
              <form role="form" action="<?php echo $action;?>" method="POST">
                  <!-- no -->

               <!--     <div class="form-group ">
                      <label for="varchar">Input Kartu</label>
                            <input width="50" type="text" class="form-control" name="no_kartu"  id="lantai" value ="<?php// echo $no_kartu; ?>" autofocus/>
                        </div>
                       
                  </div> -->
                     <!--  <div class="form-group ">
                    <label for="id" class="col-md-3 control-label">ID PENERIMAAN</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $id_penerimaan; ?>" class="form-control" name="txt_id_penerimaan" readonly required>
                       <input type="hidden" name="txt_id_penerimaan" value="<?php //echo $id_penerimaan; ?>" /> 
                  </div> -->

                  <div class="form-group ">
                      <label for="no" class="col-md-3 control-label">INPUT ID CARD</label>
                      <div class="col-md-7 col-sm-12 required">
                    <!--     <input type="text" value="" class="form-control" name="txt_id" autofocus> -->
                     <input type="text" value="" class="form-control" name="txt_id" autofocus>
                       <!--  <input type="hidden" name="txt_id_penerimaan" value="<?php //echo $id_penerimaan; ?>" /> -->
                    <input type="hidden" name="id" value="<?php echo $id_penerimaan; ?>"/><br>
                    <button type="submit" hidden="true"><?php echo $button ?></button> 
                      </div>
                  </div>
                 
            <!--        <div class="form-group ">
                      <label for="lantai" class="col-md-3 control-label">PILIH LANTAI </label>
                      <div class="col-md-7 col-sm-12 required">
                       <input type="radio" class="minimal" name="lantai" id="lantai" placeholder="3" value="3" checked /> 3 
                         <input type="radio" class="minimal" name="lantai" id="lantai" placeholder="5" value="5"/> 5 
                      </div>
                  </div>  -->
                  <!-- departemen -->
            <!--       <div class="form-group ">
                      <label for="departemen" class="col-md-3 control-label">Departemen</label>
                      <div class="col-md-7 col-sm-12 required">
                        <input type="text" value="<?php echo $departemen; ?>" class="form-control" name="txt_departemen" readonly required>
                      </div>
                  </div> -->
                  <!-- catatan -->
         <!--          <div class="form-group ">
                      <label for="catatan" class="col-md-3 control-label">Catatan</label>
                      <div class="col-md-7 col-sm-12 required">
                        <textarea style="resize:none;" rows="3" name="txt_catatan" class="form-control" required readonly><?php echo $catatan ?></textarea>
                      </div>
                  </div> -->
                  <!-- tgl identifikasi -->
          <!--         <div class="form-group ">
                      <label for="tgl" class="col-md-3 control-label">Tanggal</label>
                      <div class="col-md-7 col-sm-12 required">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="txt_tanggal_identifikasi" class="form-control pull-right" id="datepickerNow" data-date-format="dd/mm/yyyy" required>
                        </div>
                      </div>
                  </div> -->
                  <!-- identifikasi -->
                <!--   <div class="form-group ">
                      <label for="identifikasi" class="col-md-3 control-label">Identifikasi</label>
                      <div class="col-md-7 col-sm-12 required">
                        <textarea style="resize:none;" rows="3" name="txt_identifikasi" class="form-control" placeholder="Identifikasi ..." required></textarea>
                      </div>
                  </div>

                   -->
<!-- 
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Kartu</th>
                                            <th width="40%">Tanggal & Waktu</th>                                         
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
 -->

        <div class="box-body">
        <?php echo $this->session->flashdata('berhasil') ?>
            <div class="row">
              <div class="col-md-12">
                <table id="dataTable1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>ID PENERIMAAN</th>
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
                        <td width="25%"><?php echo  $r['id_penerimaan'];?></td>
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