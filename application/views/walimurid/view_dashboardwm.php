
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
                	<h3 class="card-title">Data Siswa</h3>
            	</div>
                <div class="col-md-2" style="margin:20px;">
                  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-daftar">Tambah Siswa</button>
              	</div>
            </div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					<div class="section-body">	
						<div class="row">
							
							<table class="table table-bordered table-hover" id="datatable1">
							<thead>
								<tr>
				                  <th>No.</th>
				                  <th>Foto</th>
				                  <th>ID Siswa</th>
				                  <th>Nama Siswa</th>
				                  <th>Tanggal Lahir</th>
				                  <th>Kelas</th>
				                  <th>Tanggal Daftar</th>
				                  <th>Sekolah</th> 
				                  <th class="text-rigth">aksi</th>
				                </tr>
							</thead>
							<tbody>
								<?php 
							$no=0;
								foreach ($datasiswa->result_array() as $ds) {
			                      $no++;
			                      $id=$ds['id_siswa'];
			                      $nama=$ds['nama_siswa'];
			                      $tgllhr=$ds['tgl_lahir'];
			                      $kelas=$ds['kelas'];
			                      $tgldftr=$ds['tanggal_daftar'];
			                      $sekolah=$ds['sekolah'];
			                      $foto=$ds['foto_siswa']; 
			                     
								
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><img style="width:40px;height:40px;"  src="<?php echo base_url().'assets/foto_siswa/'.$foto;?>" alt="<?php echo 'foto '.$foto; ?>" /></td>
					                <td><?php echo $id; ?></td>
					                <td><?php echo $nama; ?></td>
					                <td><?php echo $tgllhr; ?></td>
					                <td><?php echo $kelas; ?></td>
					                <td><?php echo $tgldftr; ?></td>
					                <td><?php echo $sekolah; ?></td>
									 <td class="text-right">
									 	<a class="btn btn-icon-toggle" href="#" title="Edit row" data-toggle="modal" data-target="#modal-edit_siswa<?php echo $id;?>"><i class="fa fa-pencil"></i></a>
                   						 </td>
                 
								</tr>

							<?php } ?>
							
								
							</tbody>
						  </table>

						</div>
					</div><!--end .section-body -->

					
				</section>
				<!-- END TABLE HOVER -->
			</div><!--end #content-->
			<!-- END CONTENT -->
		</div><!--end #base-->
		<!-- END BASE -->

			<!-- tambah siswa -->
			<div class="modal fade" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Pendaftaran Siswa Baru</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?= base_url().'walimurid/daftar_siswa';?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input type="hidden" name="idsiswa">
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

		
			<!-- ============ MODAL EDIT siswa =============== -->
			<?php 
				foreach ($datasiswa->result_array() as $a) {
					 $id=$a['id_siswa'];
			         $nama=$a['nama_siswa'];
			         $tgllhr=$a['tgl_lahir'];
			         $kelas=$a['kelas'];
			         $tgldftr=$a['tanggal_daftar'];
			         $sekolah=$a['sekolah'];
			        
								
			?>
			<div class="modal fade" id="modal-edit_siswa<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Edit Data Siswa</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'walimurid/updatesiswawm'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input type="hidden" name="idsiswa" value="<?php echo $id;?>">
											<input type="text" name="namasiswa" value="<?php echo $nama;?>" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Tanggal Lahir</label>
										<div class="col-sm-8">
											<input type="text" name="tgllahir" value="<?php echo $tgllhr;?>" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kelas</label>
										<div class="col-sm-8">
											<input type="text" name="kelas" value="<?php echo $kelas;?>" class="form-control" id="regular13" >
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Tanggal Daftar</label>
										<div class="col-sm-8">
											<input type="text" name="tgldaftar" value="<?php echo $tgldftr;?>" class="form-control" id="regular13" readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Sekolah</label>
										<div class="col-sm-8">
											<input type="text" name="sekolah" value="<?php echo $sekolah;?>" class="form-control" id="regular13" >
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
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Edit</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>
		<!-- BEGIN JAVASCRIPT -->
		
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
