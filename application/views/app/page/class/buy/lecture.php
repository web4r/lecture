
<?php if ($this->session->flashdata('success_update')): ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('success_update'); ?>
	</strong> 
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('no_cupon')): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('no_cupon'); ?>
	</strong> 
</div>
<?php endif; ?>


<div class="container">
	<div class="row mt-3">
		<div class="col-md-6 mx-auto">
		<?php if ($this->session->flashdata('success_order')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success_order'); ?>
			</strong> 
		</div>
		<?php endif; ?>
			<div class="card">
				<div class="card-body">
					<h1 class="text-center">Detail Pembelian Anda</h1>
					<h3 class="text-center"><?php echo strtoupper($this->session->userdata('fullname'))  ?></h3>
					<ul class="list-group">
						<li class="list-group-item">
							Anda membeli kelas : <?php echo $detailClass->class_name ?>
						</li>
						<li class="list-group-item">
						    Pembayaran ke rek BCA : 0916007072 an Septiady Rahman 
						</li>
						
						<li class="list-group-item">
							<?php if($detailClass->price_diskon && $detailClass->price_diskon)
							{ 
								$hargaawal = $detailClass->class_price ;
								$potongan = $detailClass->price_diskon;
								$hargadiskon = ($hargaawal / 100) * $potongan;
								$totalbayar = $hargaawal - $hargadiskon;
							?>
							Harga kelas : Rp. <?php echo number_format($totalbayar,2) ?>
							<?php }else{
								echo 'Harga kelas : Rp. ' . number_format($detailClass->class_price,2);
							} ?>
						</li>

						<li class="list-group-item">
							<?php echo form_open('Frontend/Lecture/update_cupon/'.$detailClass->id_student_lecture,array('class'=>"form-inline")) ?>
							
								<div class="form-group mx-sm-3 mb-2">
									<input type="text" class="form-control" name="cupon_name" placeholder="Kode Kupon" required>
								</div>
								<button type="submit" class="btn btn-danger mb-2">Update Harga</button>
							
							<?php echo form_close(); ?>
						</li>
						
						
						<?php if($detailClass->class_price == 0) : ?>
						<li class="list-group-item">
							<a href="https://wasap.at/pVFe3D" class="mt-3 mb-2 btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i> Konfirmasi Pembayaran</a>
							<div class="alert alert-danger" role="alert">
							NOTES : UNTUK KELAS GRATIS ATAU HARGA RP.0 SILAHKAN LANGSUNG KLIK TOMBOL KONFIRMASI.
							<br>
							<a href="https://wasap.at/pVFe3D" class="alert-link">ATAU KLIK UNTUK BANTUAN</a>.
							</div>
						</li>
						<?php endif; ?>
						<?php if($detailClass->class_price != 0) : ?>
						<li class="list-group-item">
							<a href="https://wasap.at/pVFe3D" class="mt-3 mb-2 btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i> Konfirmasi Pembayaran</a>
							<div class="alert alert-danger" role="alert">
							NOTES : SILAHKAN TRANSFER SESUAI DENGAN HARGA KELAS YANG ANDA BELI KE REKENING YANG SUDAH ADA PADA DETAIL PEMBELIAN ANDA, 
							SEGERA LANGSUNG KLIK TOMBOL KONFIRMASI PEMBAYARAN AGAR KAMI CEK DAN AKTIVASI KELAS ANDA. 	
							<br>
							<a href="https://wasap.at/pVFe3D" class="alert-link">ATAU KLIK UNTUK BANTUAN</a>.
							</div>
							<?php foreach($cuponlist as $cupon): ?>
									<p><?php echo $cupon->cupon_name ?></p>
							<?php endforeach; ?>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
