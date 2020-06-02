<div class="container">
	<h3 class="text-center">Form Edit Video</h3>
	
	<div class="row mt-3">
		<div class="col-md-12">
			<div class="card mx-auto">
				<div class="card-body">
					<?php echo form_open('Backend/WebClass/do_update_video/'.$video->class_id.'/'.$video->id_detail_lecture) ?>
						<div class="form-group">
							<?php 
								echo form_label('Judul Materi');
								$data = array(
									'name' => 'lecture_name',
									'type' => 'text',
									'class' => 'form-control',
									'value' => $video->lecture_name
								);
								echo form_input($data);
							?>
						</div>
						<div class="form-group">
							<?php 
								echo form_label('Kode Video Youtube');
								$data = array(
									'name' => 'lecture_video_link',
									'type' => 'text',
									'class' => 'form-control',
									'value' => $video->lecture_video_link
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
