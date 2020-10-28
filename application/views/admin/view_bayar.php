
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
					<div class="section-header">
							<h2><span class="fa fa-user"></span> Data Pengguna</h2>
					</div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					<div class="section-body">	
						<div class="row">
							<div class="table-responsive">
							<table  class="table table-bordered table-hover" id="datatable1">
							<thead style="background-color: yellow;">
								<tr>
				                  <th>No.</th>
				                  <th>Id siswa</th>
				                  <th>Nama Siswa</th>
				                  <th>Subyek</th>
				                  <th>Bulan Pembayaran</th>
				                  <th>Jenis Bayar</th>
				                  <th>Jumlah Tagihan</th>
				                  <th>Jumlah Bayar</th>
				                  <th>Status Pembayaran</th>
				                  <th class="text-rigth">aksi</th>
				                </tr>
							</thead>
							<tbody>
							<?php 
							$no=0;
								foreach ($dtbayar->result_array() as $db) {
		                       $no++;
		                       $id_b = $db['id_bayar'];
		                       $id=$db['id_siswa'];
		                       $nama = $db['nama_siswa'];
		                       $subyek = $db['subyek'];
		                       $bulan = $db['bulan_bayar'];
		                       $tahun = $db['tahun_bayar'];
		                       $jnsbyr = $db['jenis_bayar'];
		                       $jmltghn = $db['jumlah_tagihan'];
		                       $jmlbyr = $db['jumlah_bayar'];

		                       if ($jmltghn == $jmlbyr) {
		                       	$statusbyr ='LUNAS';
		                       } else {
		                       	$statusbyr = 'BELUM LUNAS';
		                       }
		                       
		                      

								if ($statusbyr == 'LUNAS') {
									$warna ='green';
								} else {
									$warna = 'red';
								}


						      

			        
			                ?>
								<tr>
									<td><?= $no; ?></td>
					              
					                <td><?= $id; ?></td>
					                <td><?= $nama; ?></td>
					                <td><?= $subyek; ?></td>
					                <?php 
										$monthName = date("F", mktime(0, 0, 0, $bulan, 10));
									?>
					                <td><?= $monthName.' '.$tahun; ?></td>
					                <td><?= $jnsbyr; ?></td>
					                <td><?= $jmltghn; ?></td>
					                <td><?= $jmlbyr; ?></td>
					                <td style="font-weight: bold; color:<?= $warna; ?>;"><?= $statusbyr; ?></td>
					                <td><a class="btn btn-icon-toggle" href="#" title="Update pembayaran" data-toggle="modal" data-target="#modal_edit_bayar<?php echo $id_b;?>"><i class="fa fa-edit"></i></a></td>

					                                
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

	<!-- ============ MODAL update kemajuan belajar =============== -->
			<?php 
				foreach ($dtbayar->result_array() as $db) {
                   $id_b = $db['id_bayar'];
                   $nama = $db['nama_siswa'];
                   $subyek = $db['subyek'];
                   $bulan = $db['bulan_bayar'];
                   $tahun = $db['tahun_bayar'];
                   $jnsbyr = $db['jenis_bayar'];
                   $jmltghn = $db['jumlah_tagihan'];
                   $jmlbyr = $db['jumlah_bayar'];
			?>

			<div class="modal fade" id="modal_edit_bayar<?php echo $id_b;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Form Update Kemajuan Belajar <?= $nama; ?></h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/c_bayar/editBayar'?>">
			        <div class="modal-body">
			        	<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Nama Siswa</label>
							<div class="col-sm-8">
								<input type="text"  value="<?php echo $nama;?>" class="form-control" id="regular13" readonly >
								<input type="hidden" name="id" value="<?= $id_b; ?>">
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Subyek Siswa</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $subyek;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Jenis Bayar</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $jnsbyr;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Periode Pembayaran</label>
							<div class="col-sm-8">
								 <?php 
										 $monthName = date("F", mktime(0, 0, 0, $bulan, 10));
									?>
								<input type="text" value="<?php echo $monthName.' '.$tahun;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Jumlah Tagihan</label>
							<div class="col-sm-8">
								<input type="text" value="<?php echo $jmltghn;?>" class="form-control" id="regular13" readonly >
							</div> 
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Jumlah Bayar</label>
							<div class="col-sm-8">
								<input type="text" name="jmlbyr" value="<?php echo $jmlbyr;?>" class="form-control" id="regular13" >
							</div> 
						</div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div></div>
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
