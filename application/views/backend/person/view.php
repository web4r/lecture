<?php 
	if($person->role_akun == 1)
	{
		$roleAkun = '<span class="badge badge-success">Administrator</span>';
	}
	if($person->role_akun == 2)
	{
		$roleAkun = '<span class="badge badge-primary">Direktur Utama</span>';
	}
	if($person->role_akun == 3)
	{
		$roleAkun = '<span class="badge badge-primary">Direktur Keuangan</span>';
	}
	if($person->role_akun == 4)
	{
		$roleAkun = '<span class="badge badge-primary">Finance</span>';
	}

	if($person->role_akun == 5)
	{
		$roleAkun = '<span class="badge badge-primary">HRD</span>';
	}
	if($person->role_akun == 6)
	{
		$roleAkun = '<span class="badge badge-primary">Legal</span>';
	}
	if($person->role_akun == 7)
	{
		$roleAkun = '<span class="badge badge-primary">Konstruksi</span>';
	}
	if($person->role_akun == 8)
	{
		$roleAkun = '<span class="badge badge-primary">IT Development</span>';
	}
	if($person->role_akun == 9)
	{
		$roleAkun = '<span class="badge badge-primary">Research and Development</span>';
	}

	if($person->stat_akun == 1)
	{
		$statusAkun = '<span class="badge badge-success">Sudah Terverifikasi</span>';
	}
	if($person->stat_akun == 2)
	{
		$statusAkun = '<span class="badge badge-danger">Belum Terverifikasi</span>';
	}
	

	

?>
<?php if ($this->session->flashdata('update')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('update'); ?>
		</strong> 
	</div>
<?php endif; ?>

<section class="person-head">
	<h1 class="text-center">Detail User</h1>
</section>
<section class="person-view">
	<div class="row mb-3">
		<div class="col-md-12">
			<a href="<?php echo base_url() ?>Backend/Person" class="btn btn-secondary">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="list-group">
				<li class="list-group-item">Divisi : <?php echo $roleAkun	 ?></li>
				<li class="list-group-item">Nama PIC : <?php echo $person->fullname ?></li>
				<li class="list-group-item">Email : <?php echo $person->email ?></li>
				<li class="list-group-item">Password : <a href="<?php echo base_url() ?>Backend/Person/showPassword/<?php echo $person->id_user ?>" class="btn btn-danger">Ganti Password <i class="fa fa-edit"></i></a></li>
				<li class="list-group-item">Nomor Telepon : <?php echo $person->phone ?></li>
				<li class="list-group-item">FAX : <?php echo $person->fax ?></li>
				<li class="list-group-item">Status Akun : <?php echo $statusAkun ?></li>
			</ul>
		</div>
	</div>
	<div class="row verify-akun">
		<div class="col-md-12">
			<?php if($person->stat_akun == 2) : ?>
				<?php echo form_open('Backend/Person/updateVerivication/'. $person->id_user) ?>
					<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Verifikasi Akun</button>
				<?php echo form_close() ?>
			<?php endif; ?>
			<?php if($person->stat_akun == 1) : ?>
				<?php echo form_open('Backend/Person/upateNonActivation/'. $person->id_user) ?>
					<button class="btn btn-danger" type="submit"><i class="fa fa-window-close"></i> Non Aktivasi Akun</button>
				<?php echo form_close() ?>
			<?php endif; ?>
		</div>
	</div>
</section>
