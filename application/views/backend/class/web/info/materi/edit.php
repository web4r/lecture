<div class="container">
	<h3 class="text-center">Form Edit Materi</h3>
	
	<div class="row mt-3">
		<div class="col-md-12">
			<div class="card mx-auto">
				<div class="card-body">
					<?php echo form_open('Backend/WebClass/do_update_materi/'.$materi->class_id.'/'.$materi->id_history) ?>
						<div class="form-group">
							<?php 
								echo form_label('Materi yang akan di pelajari');
								$data = array(
									'name' => 'theory_name',
									'type' => 'text',
									'class' => 'form-control',
									'value' => $materi->theory_name
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
