
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
				<div class="card-header row">
              	<div class="col-sm-2">
                	<h3 class="card-title">Data Wali Murid</h3>
            	</div>
                <div class="col-md-2" style="margin:20px;">
                  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-daftar-walimurid">Daftar Wali Murid Baru</button>
              	</div>
            </div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					<div class="section-body">	
						<div class="row">
							<div class="table-responsive">
							<table class="table table-bordered table-hover" id="datatable1">
							<thead>
								<tr>
				                  <th>No.</th>
				                  <th>Nama</th>
				                  <th>Alamat</th>
				                  <th>No. Telepon</th>
				                  <th>Email</th>
				                  <th> Password</th>
				                  <th class="text-rigth">aksi</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
							$no=0;
								foreach ($datawalimurid->result_array() as $dw) {
			                      $no++;
			                      $id = $dw['id_wali_murid'];
			                      $nama = $dw['nama_wali_murid'];
			                      $alamat = $dw['alamat_wali_murid'];
			                      $notlp = $dw['no_tlp_wali_murid'];
			                      $email = $dw['email_wali_murid'];
			                      $pass = $dw['pass_wali_murid'];
			                  

			                ?>
								<tr>
									<td><?php echo $no; ?></td>
					                <td><?php echo $nama; ?></td>
					                <td><?php echo $alamat; ?></td>
					                <td><?php echo $notlp; ?></td>
					                <td><?php echo $email; ?></td>
					                <td><?php echo $pass; ?></td>
									<td>

										<a class="btn btn-icon-toggle" href="#" title="Edit row" data-toggle="modal" data-target="#modal-daftar<?php echo $id?>"><i class="fa fa-plus"></i></a>
									 	<a class="btn btn-icon-toggle" href="#" title="Edit row" data-toggle="modal" data-target="#modal-edit-walimurid<?php echo $id?>"><i class="fa fa-edit"></i></a>
                   					</td>
                 
								</tr>

							<?php } ?>
								
							</tbody>
						  </table>
						</div>
						</div>
					</div><!--end .section-body -->

					
				</section>
				<!-- END TABLE HOVER -->
			</div><!--end #content-->
			<!-- END CONTENT -->
		</div><!--end #base-->
		<!-- END BASE -->

		<!-- tambah wali murid baru -->
			<div class="modal fade" id="modal-daftar-walimurid" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Pendaftaran Siswa Baru</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/c_wali_murid/daftarWalimurid';?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama Walimurid</label>
										<div class="col-sm-8">
											<input type="text" name="namawm" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Alamat Walimurid</label>
										<div class="col-sm-8">
											<input type="text" name="alamatwm"  class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">NO. Tlp Walimurid</label>
										<div class="col-sm-8">
											<input type="text" name="notlpwm" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Email</label>
										<div class="col-sm-8">
											<input type="text" name="emailwm" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Passwoard</label>
										<div class="col-sm-8">
											<input type="text" name="passwm" class="form-control" id="regular13">
										</div>
									</div>
									
			        </div>  
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit">Daftar</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>

			<!-- end tambah wali murid baru -->
			<!-- edit wali murid baru -->
			<?php 
				foreach ($datawalimurid->result_array() as $dw) {
                  $id = $dw['id_wali_murid'];
                  $nama = $dw['nama_wali_murid'];
                  $alamat = $dw['alamat_wali_murid'];
                  $notlp = $dw['no_tlp_wali_murid'];
                  $email = $dw['email_wali_murid'];
                  $pass = $dw['pass_wali_murid'];
             

            ?>
			<div class="modal fade" id="modal-edit-walimurid<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Pendaftaran Siswa Baru</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/c_wali_murid/editWalimurid';?>" enctype="multipart/form-data">
			        <div class="modal-body">
        				<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-8">
								<input type="text" name="emailwm" value="<?= $email; ?> " class="form-control" id="regular13" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Nama Walimurid</label>
							<div class="col-sm-8">
								<input type="hidden" name="idwm" value="<?= $id; ?> ">
								<input type="text" name="namawm" value="<?= $nama; ?> " class="form-control" id="regular13" >
							</div>
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Alamat Walimurid</label>
							<div class="col-sm-8">
								<input type="text" name="alamatwm" value="<?= $alamat; ?> " class="form-control" id="regular13" >
							</div>
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">NO. Tlp Walimurid</label>
							<div class="col-sm-8">
								<input type="text" name="notlpwm" value="<?= $notlp; ?> " class="form-control" id="regular13" >
							</div>
						</div>
						
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Passwoard</label>
							<div class="col-sm-8">
								<input type="text" name="passwm" value="<?= $pass; ?>" class="form-control" id="regular13">
							</div>
						</div>
						
			        </div>  
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit">Daftar</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>
			<!-- end edit wali murid baru -->
			<!-- tambah siswa -->
			<?php 
							$no=0;
								foreach ($datawalimurid->result_array() as $dw) {
			                      $no++;
			                      $id = $dw['id_wali_murid'];
			                      $nama = $dw['nama_wali_murid'];
			                      $alamat = $dw['alamat_wali_murid'];
			                      $notlp = $dw['no_tlp_wali_murid'];
			                      $email = $dw['email_wali_murid'];
			                      $pass = $dw['pass_wali_murid'];
			                 

			                ?>
			<div class="modal fade" id="modal-daftar<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Pendaftaran Siswa Baru</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/c_wali_murid/daftarSiswa';?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input type="hidden" name="idwm" value="<?= $id; ?>">
											<input type="text" name="namasiswa" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Tanggal Lahir</label>
										<div class="col-sm-8">
											<input type="date" name="tgllahir"  class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kelas</label>
										<div class="col-sm-8">
											<input type="text" name="kelas" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Sekolah</label>
										<div class="col-sm-8">
											<input type="text" name="sekolah" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Photo</label>
										<div class="col-sm-8">
											<input type="file" name="fotosiswa" class="form-control" id="regular13">
										</div>
									</div>
									
			        </div>  
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit">Daftar</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
		<?php } ?>
			<!-- end tambah siswa baru -->
		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url().'assets/js/jquery-3.1.1.js'?>"></script>
		
		<script src="<?php echo base_url().'assets/js/bootstrap/bootstrap.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/spin/spin.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/autosize/jquery.autosize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/jquery.dataTables.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/ColVis/js/dataTables.colVis.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/nanoscroller/jquery.nanoscroller.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/App.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavigation.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppOffcanvas.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppCard.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppForm.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavSearch.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppVendor.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/core/DemoTableDynamic.js'?>"></script>
		<!-- END JAVASCRIPT -->
			<script type="text/javascript">
				$(document).ready(function(){
					$('.form-chat').submit(function(){
						alert('Ini adalah klik events tombol kirim pesan');
					});
				});
			</script>

	</body>
</html>
