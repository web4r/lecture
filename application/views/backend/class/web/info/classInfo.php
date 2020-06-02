<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('success'); ?>
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

<a href="<?php echo base_url() ?>Backend/WebClass" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
<div class="row mt-5 mb-5">
	<div class="col-md-6">
		<h1>Informasi Kelas</h1>

		<div class="card">
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item">
						Nama Pengajar : <?php echo $classInfo->fullname ?>
					</li>
					<li class="list-group-item">
						Tipe Kelas : <?php echo $classInfo->type_name ?>
					</li>
					<li class="list-group-item">
						Kategori Kelas : <?php echo $classInfo->category_name ?>
					</li>
					<li class="list-group-item">
						Nama Kelas : <?php echo $classInfo->class_name ?>
					</li>
					<li class="list-group-item">
						Kode Video Kelas : <?php echo $classInfo->class_link_video_preview ?>
					</li>
					<li class="list-group-item">
						Deskripsi Kelas : <?php echo $classInfo->class_description ?>
					</li>
					<li class="list-group-item">
						Harga Kelas : Rp. 	<?php echo ($classInfo->class_price) ? number_format($classInfo->class_price,2) : 0 ?>
					</li>
					<li class="list-group-item">
						Banner Kelas : <br>
						<img class="img-fluid mx-auto d-block" src="<?php echo base_url() ?>assets/img/bannerClass/<?php echo $classInfo->class_banner ?>" alt="<?php echo $classInfo->class_name ?> " width="320" height="320">
					</li>
					<li class="list-group-item">
						Video Preview Kelas : <br>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $classInfo->class_link_video_preview ?>?rel=0" allowfullscreen></iframe>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<h1>Edit Kelas</h1>
		<div class="card">
			<div class="card-body">
				<?php echo form_open_multipart('Backend/WebClass/update/'.$classInfo->id_class) ?>

				<div class="form-group">
					
					<?php 
						echo form_label('Nama Kelas');
						$data = array(
							'class'=>'form-control',
							'name'=>'class_name',
							'type'=>'text',
							'value'=>$classInfo->class_name
						);
						echo form_input($data);
					
					?>
				</div>
				<div class="form-group">
					<label>Upload Banner</label>
					<input type="file" name="class_banner" class="form-control">
				</div>			
				<div class="form-group">
					
					<?php 
						echo form_label('Kode Video Kelas');
						$data = array(
							'class'=>'form-control',
							'name'=>'class_link_video_preview',
							'type'=>'text',
							'value'=>$classInfo->class_link_video_preview
						);
						echo form_input($data);
					?>
				</div>

				<div class="form-group">
					<?php 
						echo form_label('Deskripsi Kelas');
						$data = array(
							'class'=>'form-control',
							'name'=>'class_description',
							'rows'=>3,
							'cols'=>3
						);
						echo form_textarea($data,$classInfo->class_description);
					
					?>
				</div>

				<div class="form-group">
					
					<?php 
					 if($classInfo->class_type_id == 2) {
						echo form_label('Harga Kelas');
						$data = array(
							'class'=>'form-control',
							'name'=>'class_price',
							'type'=>'number',
							'value'=>$classInfo->class_price
						);
						echo form_input($data);
					}
					?>
					
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-outline-primary btn-block"> <i class="fa fa-edit"></i> Update Kelas</button>
				</div>

				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>
<div class="row mt-3 mb-3">
	<div class="col-md-12">
		<a href="<?php echo base_url() ?>Backend/WebClass/deleteClass/<?php echo $classInfo->id_class ?>" class="btn btn-outline-danger btn-lg btn-block"> <i class="fa fa-trash"></i> Hapus Kelas</a>
	</div>
</div>
