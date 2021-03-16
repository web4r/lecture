<?php if ($this->session->flashdata('login_success')): ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('login_success'); ?>
	</strong> 
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('create_feedback')): ?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('create_feedback'); ?>
	</strong> 
</div>
<?php endif; ?>


<?php if ($this->session->flashdata('delete')): ?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>
		<?php echo $this->session->flashdata('delete'); ?>
	</strong> 
</div>
<?php endif; ?>



	
<div class="container">
    <h1 class="text-center mt-5">Selamat Datang, <?php echo  $this->session->userdata('fullname') ?></h1>
	
	
	<h1 class="text-center mt-5">Total Kelas : <?php echo  $total   ?></h1>
	<div class="row">
		<div class="col-md-4">
			<a href="<?php echo  base_url() ?>" class="btn btn-primary btn-block">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
				<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			</svg>	
			Beli Kelas
			</a>
		</div>
		<div class="col-md-4">
			<button data-toggle="modal" data-target="#tutorialModal" class="btn btn-success btn-block">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
			</svg>	
			Tutorial Beli Kelas dan Pembayaran
			</button>
		</div>
		<div class="col-md-4">
			<button data-toggle="modal" data-target="#feedabackModal" class="btn btn-danger btn-block">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
			</svg>	
			Feedback
			</button>
		</div>
	</div>
	
	<div class="row mt-3">
		<?php foreach($myClass as $class) 
		{ 
			if($class->status_order == 2) {
				$classStatus = '';
			}
		?>
		<div class="col-md-4">
		
			<div class="card">
			
			<?php if($class->id_type == 1) : ?>
				<div class="alert alert-secondary" role="alert">
					Kelas Gratis
				</div>
			<?php endif; ?>
			<?php if($class->id_type == 2) : ?>
				<div class="alert alert-primary" role="alert">
					Kelas Premium
				</div>
			<?php endif; ?>
				<div class="mx-auto pt-2">
					<img class="card-img-top img-fluid" style="width: 240px;height:240px;" src="<?php echo base_url() ?>assets/img/bannerClass/<?php echo $class->class_banner ?>" alt="Card image cap">
				</div>
				<div class="card-body">
					<h5 class="card-title text-center"><?php echo $class->class_name ?></h5>
					<?php if($class->status_order == 1) : ?>
						<div class="text-center"> <span class="badge badge-danger">Kelas belum di aktivasi</span> </div>
						<a href="<?php echo base_url() ?>Frontend/Lecture/deleteLectureStudent/<?php echo $class->id_student_lecture ?>" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Hapus Kelas</a>
						<a href="<?php echo base_url() ?>Frontend/Lecture/confirm/<?php echo $class->id_student_lecture ?>" class="btn btn-primary btn-block"><i class="fas fa-list"></i> Konfirmasi Pembayaran</a>
					<?php endif; ?>

					
					<?php if($class->status_order == 2) : ?>
						<a href="<?php echo base_url() ?>Frontend/Lecture/playClass/<?php echo $class->id_class ?>" class="btn btn-success btn-block"><i class="fas fa-graduation-cap"></i> Mulai Belajar</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

</div>

<!-- Modal tutorial -->
<div class="modal fade" id="tutorialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tutorial beli kelas dan pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/faF1aoLr5yw?rel=0" allowfullscreen></iframe>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal feedback -->
<div class="modal fade" id="feedabackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<div class="modal-title" id="exampleModalLabel">
			<h3>Feedback</h3>
			
			<span class="text-muterd">Silahkan berikan feedback kepada kami agar menjadi lebih baik lagi</span>
			</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <?php echo form_open('Frontend/Feedback/addFeedback'); ?>
      <div class="modal-body">
	  	<div class="form-group">
			  <textarea name="feedback_message" class="form-control" cols="30" rows="10" placeholder="tuliskan feedback anda" required></textarea>
		  </div>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Kirim Feedback</button>
	  </div>
	  <?php echo form_close(); ?>
    </div>
  </div>
</div>
