  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form -->
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA
        </li>
        <li>
          <a href="<?php echo base_url() .'dashboard';?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

<!-- 
         
        <li>
 -->

       <!--<li>
            <a href="<?php //echo base_url() .'permintaan';?>"><i class="fa fa-tasks"></i>
              <span>Penggunaan Kartu</span>
            </a>
        </li>
        <li>

         <li>
            <a href="<?php //echo base_url() .'permintaan';?>"><i class="fa fa-tasks"></i>
              <span>Pengembalian Kartu</span>
            </a>
        </li>
        <li> -->
        <!-- 
            <a href="<?php //echo base_url() .'informasi';?>"><i class="fa fa-info"></i>
              <span>Informasi Terbaru</span>
            </a>
        </li>
        <li>
            <a href="<?php //echo base_url() .'identifikasi';?>"><i class="fa fa-wrench"></i>
              <span>Identifikasi Pekerjaan</span>
            </a>
        </li>
        <li>
            <a href="<?php //echo base_url() .'refill';?>"><i class="fa fa-tint"></i>
              <span>Refill Tinta Printer</span>
            </a>
        </li>
        <li> -->
           <!--  <a href="<?php echo base_url() .'jadwal';?>"><i class="fa fa-calendar"></i>
              <span>Jadwal Kerja dan Event</span>
            </a> 
        </li>-->
        <?php if($this->session->userdata('level')=='1'){?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Master Kartu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() .'masterkartu/lantai5';?>"><i class="fa fa-circle-o"></i>Lantai 5</a></li>
            <li><a href="<?php echo base_url() .'masterkartu/lantai3';?>"><i class="fa fa-circle-o"></i> Lantai 3</a></li>
          </ul>
        </li>
        <?php } ?>
         <li>
            <a href="<?php echo base_url() .'Pemberiankartu';?>"><i class="fa fa-calendar"></i>
              <span>Pemberian Kartu</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url().'Pemberiankartu/valid';?>"><i class="fa fa-tint"></i>
              <span>Validasi Kartu</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url().'Pemberiankartu/retur';?>"><i class="fa fa-info"></i>
              <span>Retur Kartu</span>
            </a>
        </li>
       
       <li>
            <a href="<?php echo base_url().'masterkartu/expired';?>"><i class="fa fa-tree"></i>
              <span>Expired Kartu</span>
            </a>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() .'masterkartu/ready';?>"><i class="fa fa-circle-o"></i> Kartu ready</a></li>
            <li><a href="<?php echo base_url() .'masterkartu/aktif';?>"><i class="fa fa-circle-o"></i> Kartu Aktif</a></li>
            <li><a href="<?php echo base_url() .'masterkartu/valid';?>"><i class="fa fa-circle-o"></i> Kartu Valid</a></li>
            <li><a href="<?php echo base_url() .'masterkartu/expired';?>"><i class="fa fa-circle-o"></i> Kartu Expired</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
