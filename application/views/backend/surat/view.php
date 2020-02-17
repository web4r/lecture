<section class="surat-view">
	<h1 class="text-center">Detail Surat</h1>
</section>

<section class="surat-body">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-group">
					<li class="list-group-item">Pemohon Surat : <?php echo $surat->email ?></li>
					<li class="list-group-item">Tanggal Surat : <?php echo $surat->tgl_surat	 ?></li>
					<li class="list-group-item">Nomor Surat : <?php echo $surat->nomor_surat ?></li>
					<li class="list-group-item">Tujuan Surat : <?php echo $surat->tujuan_surat ?></li>
					<li class="list-group-item">Perihal Surat : <?php echo $surat->perihal_surat ?>
					<li class="list-group-item">Keterangan Surat : <?php echo $surat->keterangan_surat ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>
