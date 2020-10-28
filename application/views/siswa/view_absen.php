<!DOCTYPE html>
<html lang="en">
  <head> 
    <title><?php echo $title; ?></title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" href="<?php echo base_url().'assets/img/logo.png'?>">
    <!-- BEGIN STYLESHEETS -->
    <link href="<?php echo base_url().'assets/style-material.css'?>" rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/material-design-iconic-font.min.css'?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/materialadmin.css'?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/dist/style.css'?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/jquery.dataTables.css'?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/extensions/dataTables.colVis.css'?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/extensions/dataTables.tableTools.css'?>" />
    <!-- END STYLESHEETS -->
<style>
  
</style>
  </head>
<body>

<!-- partial:index.partial.html -->
<section class="container" >
  <div align="center"><div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
          <ul class="header-nav header-nav-options">
            <li class="header-nav-brand" >
              <div class="brand-holder">
                <a href="#">
                  <img src="<?php echo base_url().'assets/logo/logo-kumon.png'?>" alt="">
                </a>
              </div>
            </li>
           
          </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
          <ul class="header-nav">
              
           <!--  <li>
             <a class="btn btn-primary" href="<?=base_url('home'); ?>">KEMBALI</a>
           </li> -->

            
            
          </ul><!--end .header-nav-options -->
          
          
          
        </div><!--end #header-navbar-collapse -->
      </div></div>
  
<div class="row" style="margin-bottom: 20px; background-color: #f2f2f2;">
<canvas class="col-sm-4" style="height: auto; width:50%;"></canvas>
<select style="display: none;"></select>
<!-- BEGIN TABLE HOVER -->
       
          <div class="section-body">  
            <div class="row">
              <div class="table-responsive" style="overflow-y: auto; overflow-x: scroll; height: 400px; width:50%; background-color: #f2f2f2;">
              <table class="table table-bordered table-hover" id="datatable1" >
              <thead>
                <tr>
                          <th>No.</th>
                          <th>Nama Siswa</th>
                          <th>Subyek Belajar</th>
                           <th>Jam Datang</th>
                         
                        </tr>
              </thead>
              <tbody >
                <?php 
                  $no = 0;
                  foreach ($dtabsensi->result_array() as $x) {
                    $no++;
                    $nama = $x['nama_siswa'];
                    $tgl= $x['tanggal_absensi'];
                    $bulan = $x['bulan_absensi'];
                    $tahun = $x['tahun_absensi'];
                    $subyek = $x['subyek']; 
                    $waktu = $x['waktu'];
                  
                 ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $nama; ?></td>
                  <td><?= $subyek; ?></td>
                  <td><?= $waktu ?></td>
                </tr>
                 <?php } ?>
              </tbody>
              </table>
            </div>
            </div>
          </div><!--end .section-body -->

          
        
        <!-- END TABLE HOVER -->
</div>
<div class="row">


    <div class="form-group col-sm-6" style="align-items:center; justify-content: center;">
      <div class="col-sm-2"><label for="regular13"><button id="btn-play">Play</button></label></div>
       <?php echo form_open('c_absensi/tambahAbsen');?>

                  
        <input type="text" name="idabsen" style="width: 320px;">
        <input type="submit" name="submit" class="btn" style="border-radius: 100%; height: 60px; width:80px; font-size: 13px; background-color: red; color: #ffffff; ">
       
      </form>
      <?php echo $this->session->flashdata('msg');?>
    </div> 



    <div class="col-sm-5">
      <?php 
          $t=$totaldatasiswa->row_array();
      ?>
      <p> Total Siswa yang Hadir Pada tanggal <?php echo date('d-F-Y');?> adalah : <?php echo $t['total_siswa']. ' Siswa'?></p>

    </div>
</div>



  <footer>
    <center>
    <span class="opacity-75">&copy; <?php echo date('Y');?></span> <strong>KUMON CITRA HARMONI</strong>
    </center>
  </footer>
</section>

<!-- partial -->
  <script src='<?php echo base_url().'assets/dist/jquery-2.2.4.min.js'?>'></script>
<script src='<?php echo base_url().'assets/dist/qrcodelib.js'?>'></script>
<script src='<?php echo base_url().'assets/dist/webcodecamjs.js'?>'></script>
<script  >  var txt = "innerText" in HTMLElement.prototype ? "innerText" :
  "textContent";
var arg = {
  resultFunction: function(result) {
    var aChild = document.getElementsByTagName('input')[0];
    a = result.code;
    aChild.setAttribute('value', a);
    decoder.stop();
    $('#btn-play').html('Play').removeClass('playing');
  }
};
var decoder = new
WebCodeCamJS("canvas").init(arg).buildSelectMenu('select', 1);
setTimeout(function() {
  decoder.play();
  decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg);
}, 500);
$('#btn-play').on('click', function() {
  $(this).toggleClass('playing');
  if ($(this).hasClass('playing')) {
    $(this).html('Stop');
    decoder.play();
  } else {
    $(this).html('Play');
    decoder.stop();
  }
});
</script>

</body>
</html>