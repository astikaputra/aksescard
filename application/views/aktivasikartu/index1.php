<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header" style="padding-bottom: 30px;">
    <h1 class="pull-left">
      <i class="fa fa-tasks"></i> Aktivasi Kartu
    </h1>


  <div class="pull-right">
    <a href="<?php echo base_url('aktivasikartu/tambah')?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Aktivasi Kartu</a>
  </div>

  </section>

<!-- Main content -->
  <section class="content">

  <!-- Main row -->
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
        <!--
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><! /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table id="dataTable1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>DARI TGL</th>
                         <th>SAMPAI TGL</th>
                         <th>OLEH</th>
                         <th>QTY</th>                                             
                         <th>AKSI</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php if ($d_aktivasikartu) {
                      foreach($d_aktivasikartu as $d) {?>
                     <tr>
                         <td><?php echo $d->id_aktivasi; ?></td>
                         <td><?php echo $d->from_date; ?></td>
                         <td><?php echo $d->to_date; ?></td>
                         <td><?php echo $d->by; ?></td>     
                         <td><?php echo $d->qty; ?></td>             
                         <td>               
                          <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'aktivasikartu/aktivasi/' . $d->id_aktivasi ?>" rel="tooltip" title="List Aktivasi Kartu"><i class="fa fa-wrench"></i></a> 
                          <a class="btn bg-purple btn-xs" href="<?php //echo base_url() . 'penerimaankartu/cetak/' . $d->id_penerimaan ?>" rel="tooltip" title="Cetak"><i class="fa fa-print"></i></a>
                         </td>

                          <?php } ?>
                             
                         <?php }  ?>
                     </tr>
                     <?php}
                   }?>


                 </tbody>
             </table>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!--box body-->
          </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

  <!-- /.row (main row) -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper-->
