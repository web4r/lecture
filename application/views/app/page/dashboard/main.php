<?php if ($this->session->flashdata('login_success')): ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('login_success'); ?>
	</strong> 
</div>
<?php endif; ?>
<?php if ($this->session->flashdata('success_order')): ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('success_order'); ?>
	</strong> 
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('have_buy')): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('have_buy'); ?>
	</strong> 
</div>
<?php endif; ?>
	
<div class="container">
    <h1 class="text-center mt-5">Selamat Datang, <?php echo  $this->session->userdata('fullname') ?></h1>
	<br>
	<h1 class="text-center mt-5">Id anda, <?php echo  $user->id_student ?></h1>
	<br>
	<h1 class="text-center mt-5">Total Kelas, <?php echo  $total ?></h1>
	<div class="row mt-3">
		<?php foreach($myClass as $class) 
		{ 
			if($class->class_status == 2) {
				$classStatus = '';
			}
		?>
		<div class="col-md-4">
			<div class="card">
				<div class="mx-auto pt-2">
					<img class="card-img-top img-fluid" style="width: 240px;height:240px;" src="<?php echo base_url() ?>assets/img/bannerClass/<?php echo $class->class_banner ?>" alt="Card image cap">
				</div>
				<div class="card-body">
					<h5 class="card-title text-center"><?php echo $class->class_name ?></h5>
					<?php if($class->class_status == 1) { echo '<div class="text-center"> <span class="badge badge-danger">Kelas belum di aktivasi</span> </div>'; } ?>
					<?php if($class->class_status == 2) : ?>
						<a href="<?php echo base_url() ?>Frontend/Lecture/playClass/<?php echo $class->id_class ?>" class="btn btn-success btn-block"><i class="fas fa-graduation-cap"></i> Mulai Belajar</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

</div>
