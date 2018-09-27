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
               <form role="form" action="<?php echo $action;?>" method="POST">
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label for="varchar">Input ID</label>
                         <!--    <input width="65" type="text" class="form-control" name="no_kartu"  id="lantai" value ="<?php //echo $no_kartu; ?>" autofocus/> -->
                       <!--   <input width="100" type="text" class="form-control" name="no_kartu"  id="no_kartu" value ="" autofocus/> -->
                        <input type="text" value="" class="form-control" name="txt_id" autofocus>
                        </div>
                       
                       <div class="form-group">  
                    <input type="hidden" name="id" value="<?php echo $id_penerimaan; ?>"/><br>
                    <button type="submit" hidden="true"><?php echo $button ?></button> 
                </form>

                <div class="panel-body">
                        <?php echo $this->session->flashdata('berhasil') ?>
                            <div class="table-responsive">
                              <!--   <table class="table table-striped table-bordered table-hover" id="dataTable1"> -->
                                <table id="dataTable1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Penerima</th>
                                            <th>No Kartu</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            
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
                            </div>
                            
                        </div>
                      
            </div>
        </div>
    </div> <!-- col -->
  </div><!-- row -->

</div>
<!-- /.content-wrapper-->