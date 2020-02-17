<section class="cloud-edit">
	<h1 class="text-center">Form Edit Cloud</h1>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('success'); ?>
			</strong> 
		</div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('errors')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('errors'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>

<section class="coud-edit-body">
	<div class="continer">
		<div class="row mt-3 mb-3">
			<div class="col-md-12">
				<a href="<?php echo base_url() ?>Backend/Cloud" class="btn btn-secondary">
					<i class="fa fa-arrow-left"></i> Kembali
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php echo form_open_multipart('Backend/Cloud/do_update/'.$cloud->id_cloud) ?>
					<div class="form-group">
						<?php 
							echo form_label('Tanggal Upload File');
							$data = array(
								'class'=>'form-control',
								'name'=>'tgl_upload',
								'type'=>'date',
								'value'=>$cloud->tgl_upload
							);
							echo form_input($data);
						
						?>
					</div>
					<div class="form-group">
						<?php 
							echo form_label('Nama File');
							$data = array(
								'class'=>'form-control',
								'name'=>'nama_file',
								'value'=>$cloud->nama_file
							);
							echo form_input($data);
						
						?>
					</div>
					<div class="form-group">
						<label>Upload File</label>
						<input type="file" name="file_upload" class="form-control">
					</div>
					<div class="form-group">
						<?php 
							echo form_label('Keterangan');
							$data = array(
								'class'=>'form-control',
								'name'=>'keterangan_file',
								'rows'=>3,
								'cols'=>3
							);
							echo form_textarea($data,$cloud->keterangan_file);
						
						?>
					</div>
					<div class="form-group">
						<?php 
						
							$data = array(
								'class'=>'btn btn-primary',
								'value'=>'Update'
							);
							echo form_submit($data);
						
						?>
						
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</section>
