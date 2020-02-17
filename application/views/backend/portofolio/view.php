<?php 
$tglkontrak = $portofolio->tgl_kontrak;
if($tglkontrak != '0000-00-00')
{
	$dateformat = date('d-m-Y',strtotime($tglkontrak)); 
} 
else {
	$dateformat = '<span class="badge badge-danger">Belum ada tanggal</span>';
}

$tglSelesai = $portofolio->tgl_selesai;
if($tglSelesai != '0000-00-00')
{
	$dateformatSelesai = date('d-m-Y',strtotime($tglSelesai)); 
} 
else {
	$dateformatSelesai = '<span class="badge badge-danger">Belum ada tanggal</span>';
}

$tglBa = $portofolio->tgl_ba;
if($tglBa != '0000-00-00')
{
	$dateformatBA = date('d-m-Y',strtotime($tglBa)); 
} 
else {
	$dateformatBA = '<span class="badge badge-danger">Belum ada tanggal</span>';
}



?>
<section class="portofolio-view">
	<h1 class="text-center"><i class="fa fa-users"></i> Detail Portofolio</h1>
</section>

<section class="portofolio-content">
	<div class="container">
		<div class="row mb-3">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<a href="<?php echo base_url() ?>Backend/Portofolio" class="btn btn-secondary">
					<i class="fa fa-arrow-circle-left"></i> Kembali
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<ul class="list-group">
					<li class="list-group-item">Tahun : <?php echo $portofolio->tahun ?></li>
					<li class="list-group-item">Pekerjaan : <?php echo $portofolio->pekerjaan ?></li>
					<li class="list-group-item">Sub Bidang : <?php echo $portofolio->sub_bidang ?></li>
					<li class="list-group-item">Lokasi : <?php echo $portofolio->lokasi ?></li>
					<li class="list-group-item">Nama Pejabat : <?php echo $portofolio->nama_pejabat ?></li>
					<li class="list-group-item">Alamat Pejabat : <?php echo $portofolio->alamat_pejabat ?></li>
					<li class="list-group-item">Nomor Kontrak : <?php echo $portofolio->nomor_kontrak ?></li>
					<li class="list-group-item">Tanggal Kontrak : <?php echo $dateformat ?></li>
					<li class="list-group-item">Nilai Kontrak : Rp. <?php echo number_format($portofolio->nilai) ?></li>
					<li class="list-group-item">Tanggal Selesai : <?php echo $dateformatSelesai ?></li>
					<li class="list-group-item">Tanggal Berita Acara : <?php echo $dateformatBA ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>
