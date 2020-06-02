
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
				
				<li class="list-group-item">Nama PIC : <?php echo $person->fullname ?></li>
				<li class="list-group-item">Email : <?php echo $person->email ?></li>
				<li class="list-group-item">Password : <a href="<?php echo base_url() ?>Backend/Person/showPassword/<?php echo $person->id_users ?>" class="btn btn-danger">Ganti Password <i class="fa fa-edit"></i></a></li>
				<li class="list-group-item">Nomor Telepon : <?php echo $person->phone ?></li>
				
				
			</ul>
		</div>
	</div>
</section>
