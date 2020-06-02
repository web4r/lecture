<section class="person-edit">
	<h1 class="text-center">Form Edit User</h1>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>

<section class="person-content">
	<div class="container">
		<div class="row mb-3">
			<div class="col-md-12">
				<a href="<?php echo base_url() ?>Backend/Person" class="btn btn-secondary">
					<i class="fa fa-arrow-left"></i> Kembali
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						
					<?php echo form_open_multipart('Backend/Person/updateUser/'.$person->id_users,array('class'=>'user')) ?>			
						
						<div class="form-group row">
						<?php 
							
							$data = array(
								'1' => 'Administrator',
								'2' => 'Staff',
								'3' => 'Pengajar',
								'4' => 'Peserta',
								


							);
							echo form_dropdown('role_id',$data,set_value('stat_akun',$person->role_id));
						?>
						</div>

						<div class="form-group row">
							<?php 
								echo form_label('Nama Lengkap');
								$data = array(

									'class' => 'form-control',
									'name' => 'fullname',
									'value' => $person->fullname

								);
							
							?>
							<?php echo form_input($data) ?>
						
						</div>

						<div class="form-group row">
							<?php 
								echo form_label('Email');
								$data = array(

									'class' => 'form-control',
									'name' => 'email',
									'type' => 'email',
									'value' => $person->email		
								);
							
							?>
							<?php echo form_input($data) ?>
						</div>

						<div class="form-group row">
							<?php 
								echo form_label('Nomor Telepon');
								$data = array(

									'class' => 'form-control',
									'name' => 'phone',
									'value' => $person->phone

								);
							
							?>
							<?php echo form_input($data) ?>
						</div>
							
					
						<div class="form-group">
						<?php 
							$data  = array(
								'class' => 'btn btn-success btn-user btn-block',
								'name' => 'submit',
								'value' => 'Update Account'

							);
						?>
						
						<?php echo form_submit($data); ?>
						
						</div>																				
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
