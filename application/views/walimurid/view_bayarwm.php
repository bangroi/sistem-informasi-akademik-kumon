
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
							<h2><span class="fa fa-user"></span> <?= $title; ?></h2>
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
				                  <th>Id siswa</th>
				                  <th>Nama Siswa</th>
				                  <th>Subyek</th>
				                  <th>Bulan Pembayaran</th>
				                  <th>Jenis Bayar</th>
				                  <th>Jumlah Tagihan</th>
				                  <th>Jumlah Bayar</th>
				                  <th>Status Pembayaran</th>
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
