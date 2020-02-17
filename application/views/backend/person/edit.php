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
						
					<?php echo form_open_multipart('Backend/Person/updateUser/'.$person->id_user,array('class'=>'user')) ?>			
						<div class="form-group row">
						<?php 
							
							$data = array(
								'1' => 'Administrator',
								'2' => 'Direktur Utama',
								'3' => 'Direktur Keuangan',
								'4' => 'Finance',
								'5' => 'HRD',
								'6' => 'Legal',
								'7' => 'Konstruksi',
								'8' => 'IT Development',
								'9' => 'Research and Development',


							);
							echo form_dropdown('role_akun',$data,set_value('stat_akun',$person->role_akun));
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

						<div class="form-group row">

							<?php 
								echo form_label('Nomor Fax');
								$data = array(

									'class' => 'form-control',
									'name' => 'fax',
									'value' => $person->fax
								);
							
							?>
							<?php echo form_input($data) ?>
							
						</div>	
						<div class="form-group row">
							<label class="control-label">Hak Approval</label><br>	
						</div>	
						
						<div class="form-group row">

							<div class="form-check form-check-inline">
								
								<input class="form-check-input" type="radio" name="approval" value="1" <?php 
									echo set_value('approval', $person->approval) == 1 ? "checked" : ""; 
								?> />Ya

								<input class="form-check-input" type="radio" name="approval" value="0" <?php 
									echo set_value('approval', $person->approval) == 0 ? "checked" : ""; 
								?> />Tidak
								
							</div>
							
							
							
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
