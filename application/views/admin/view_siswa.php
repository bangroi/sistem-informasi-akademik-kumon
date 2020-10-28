
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
                  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-daftar">Daftar Siswa Baru</button>
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
				                  <th>Foto</th>
				                  <th>ID Siswa</th>
				                  <th>Nama Siswa</th>
				                  <th>Tanggal Lahir</th>
				                  <th>Kelas</th>
				                  <th>Tanggal Daftar</th>
				                  <th>Sekolah</th> 
				                  <th>Details</th> 
				                  <th class="text-rigth">aksi</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
							$no=0;
								foreach ($dtsiswa->result_array() as $ds) {
			                      $no++;
			                       $id=$ds['id_siswa'];
							       $nama=$ds['nama_siswa'];
							       $tgllhr=$ds['tgl_lahir'];
							       $kelas=$ds['kelas'];
							       $tgldftr=$ds['tanggal_daftar'];
							       $sekolah=$ds['sekolah'];
							       $foto = $ds['foto_siswa'];
			        
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
					                <td>
					                	<a class="btn btn-icon-toggle" href="#" title="Edit row" data-toggle="modal" data-target="#modal-detail-siswa<?php echo $id;?>">Details</a>
					                	
					                	
					                </td>
									<td>
										<a class="btn btn-icon-toggle" href="#" title="Edit row" data-toggle="modal" data-target="#modal-subyek-belajar<?php echo $id;?>"><i class="fa fa-plus"></i></a>
									 	<a class="btn btn-icon-toggle" href="#" title="Edit row" data-toggle="modal" data-target="#modal-edit_siswa<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                   						 <a href="<?php echo base_url('admin/c_siswa/hapusSiswa/'.$id);?>" class="btn btn-icon-toggle" title="Delete row"><i class="fa fa-trash"></i></a>
                   						 
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

			
			<!-- ============ MODAL EDIT siswa =============== -->
			<?php 
				foreach ($dtsiswa->result_array() as $a) {
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
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/c_siswa/updateSiswa'?>" enctype="multipart/form-data">
			        <div class="modal-body">
			        				<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">ID Siswa</label>
										<div class="col-sm-8">
											<input type="text" name="idbaru" value="<?= $id;?>" class="form-control" id="regular13" >
										</div>
									</div>
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

			<!-- ============ MODAL details siswa =============== -->
			<?php 
				foreach ($dtsiswa->result_array() as $a) {
					 $id=$a['id_siswa'];
			         $nama=$a['nama_siswa'];
			         $tgllhr=$a['tgl_lahir'];
			         $kelas =$a['kelas'];
			         $sekolah=$a['sekolah'];
			         $tgldftr=$a['tanggal_daftar'];
			         $namawm=$a['nama_wali_murid'];
			         $alamat=$a['alamat_wali_murid'];
			         $notlp=$a['no_tlp_wali_murid'];
			         $foto = $a['foto_siswa'];
								
			?>
			<div class="modal fade large" id="modal-detail-siswa<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
				<div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Detail Data <?php echo $nama;?></h3>
			    </div>
			     <div class="modal-body">

			   
				  <div class="row justify-content-md-center">
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">ID SISWA</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $id;?></p>
						</div>
				    </div>
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">NAMA SISWA</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $nama;?></p>
						</div>
				    </div>
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">NAMA WALI MURID</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $namawm;?></p>
						</div>
				    </div>
				    
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">ALAMAT SISWA</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $alamat;?></p>
						</div>
				    </div>
				    <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">NO.TLP SISWA</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $notlp;?></p>
						</div>
				    </div>
				     <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">TANGGAL LAHIR</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $tgllhr;?></p>
						</div>
				    </div>
				     <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">TANGGAL DAFTAR</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $tgldftr;?></p>
						</div>
				    </div>
				     <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">KELAS</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $kelas;?></p>
						</div>
				    </div>
				     <div class="col col-lg-8">
				     <label for="regular13" class="col-sm-3 control-label">NAMA SEKOLAH</label>
						<div class="col-sm-auto">
						<p id="regular13" >: <?php echo $sekolah;?></p>
						</div>
				    </div>
				    <!-- bagian kanan -->
				    <div class="col-md-auto">
						<div class="col-md-auto">
						<td><img style="width:100px;height:100px;"  src="<?php echo base_url().'assets/foto_siswa/'.$foto;?>" alt="<?php echo 'foto '.$foto; ?>" /></td>
						<?php echo $foto; ?>
						
						</div>
				    
				    </div>
				    </div>
				  </div>
			    </div>
			    </div>
			</div>
			<?php } ?>

			


			<!-- ============ MODAL tambah subyek belajar =============== -->
			<?php 
				foreach ($dtsiswa->result_array() as $a) {
					 $id=$a['id_siswa'];
			         $nama=$a['nama_siswa'];
			?>
			<div class="modal fade" id="modal-subyek-belajar<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Pendaftaran Subyek Belajar Baru <?= $nama; ?></h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/c_siswa/tambahSubyekBelajar'?>">
			        <div class="modal-body">
			        	<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Id Siswa</label>
							<div class="col-sm-8">
								<input type="text" name="idsiswa" value="<?php echo $id;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Nama Siswa</label>
							<div class="col-sm-8">
								<input type="text" name="namasiswa" value="<?php echo $nama;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Subyek Belajar</label>
							<div class="col-sm-8">
								<select id="select13" name="subyek" class="form-control" required>
												<option value="">Pilih Subyek Belajar</option>
												<option value="math">Matematika</option>
												<option value="efl">EFL</option>
								</select>
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Jenis Tes Penempatan</label>
							<div class="col-sm-8">
								<input type="text" name="jnstp" class="form-control" id="regular13" required>
							</div> 
						</div>
						
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Real Level Bulan ini</label>
							<div class="col-sm-3">
								<select id="select13" name="reallevel" class="form-control" required>
												<option value="">Pilih Level</option>
												<option value="7a">7A</option>
												<option value="6a">6A</option>
												<option value="5a">5A</option>
												<option value="4a">4A</option>
												<option value="3a">3A</option>
												<option value="2a">2A</option>
												<option value="a">A</option>
												<option value="b">B</option>
												<option value="c">C</option>
												<option value="d">D</option>
												<option value="e">E</option>
												<option value="f">F</option>
												<option value="g">G</option>
												<option value="h">H</option>
												<option value="i">I</option>
												<option value="j">J</option>
												<option value="k">K</option>
												<option value="l">L</option>
												<option value="m">M</option>
												<option value="n">N</option>
												<option value="o">O</option>
								</select>
							</div>
							<label for="regular13" class="col-sm-2 control-label">Nomor</label>
							<div class="col-sm-4">
								<input type="text" name="nomerreallevel" class="form-control" placeholder="input nomer" id="regular13" required>
							</div>  
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Status Siswa</label>
							<div class="col-sm-8">
								<select id="select13" name="status" class="form-control" required>
												<option value="">Pilih Status Belajar Siswa</option>
												<option value="coba gratis">Coba Gratis</option>
												<option value="aktif">Aktif</option>
												<option value="cuti">Cuti</option>
								</select>
							</div> 
						</div>
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Daftar</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($datasiswa->result_array() as $a) {
					 $id=$ds['id_siswa'];
			         $nama=$ds['nama_siswa'];
			         $tgllhr=$ds['tgl_lahir'];
			         $kelas=$ds['kelas'];
			         $tgldftr=$ds['tanggal_daftar'];
			         $sekolah=$ds['sekolah'];
			         $foto=$ds['foto_siswa'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="nama" value="<?php echo $nama;?>">
											<p>Apakah Anda yakin mau menghapus data <b><?php echo $nama;?></b> ?</p>
										</div>
									</div>
	
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-trash"></span> Hapus</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

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
