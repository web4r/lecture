<div class="container">
	<h3 class="text-center">Form Edit Persyaratan Kelas</h3>
	
	<div class="row mt-3">
		<div class="col-md-12">
			<div class="card mx-auto">
				<div class="card-body">
					<?php echo form_open('Backend/WebClass/do_update_condition/'.$condition->class_id.'/'.$condition->id_condition) ?>
						<div class="form-group">
							<?php 
								echo form_label('Judul Materi');
								$data = array(
									'name' => 'condition_name',
									'type' => 'text',
									'class' => 'form-control',
									'value' => $condition->condition_name
								);
								echo form_input($data);
							?>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> Update</button>
						</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>
