
<section class="reset-password">
	<h3 class="text-center">Reset Password</h3>
	<?php if ($this->session->flashdata('password_change')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('password_change'); ?>
			</strong> 
		</div>
	<?php endif; ?>
	<?php echo form_open('Backend/Person/updatePassword/'.$person->id_user) ?>
	<div class="form-group">
		<?php 
				echo form_label('Password Baru');

				$data = array(
					'name' => 'password',
					'class' => 'form-control',
					'placeholder' => 'Masukan password baru',
					'required' => 'required',
					'type' => 'password'
				);
				echo form_input($data)
			?>
	</div>
	<div class="form-group">	
		<?php 
			$data  = array(
				'class' => 'btn btn-danger btn-user',
				'name' => 'submit',
				'value' => 'Update Password'
			);
	
			echo form_submit($data); 
		?>
	</div>
	<?php echo form_close() ?>
</section>
