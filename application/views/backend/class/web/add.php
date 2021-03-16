<h1 class="text-center">Form Kelas</h1>
<?php if ($this->session->flashdata('errors')): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('errors'); ?>
		</strong> 
	</div>
<?php endif; ?>
<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<?php echo form_open_multipart('Backend/WebClass/saveClass') ?>

				<div class="form-group row">
					<select  name="class_type_id"  class="form-control col-md-4">
						<option>Pilih Tipe Kelas</option>
						<?php foreach($typeClass as $type) { ?>
							<option value="<?php echo $type->id_type ?>"><?php echo $type->type_name ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group row">
					<select  name="class_category_id"  class="form-control col-md-4">
						<option>Pilih Kategori Kelas</option>
						<?php foreach($categoryClass as $category) { ?>
							<option value="<?php echo $category->id_category ?>"><?php echo $category->category_name ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group row">
					<?php 
						$data = array(

							'class' => 'form-control',
							'name' => 'class_name',
							'placeholder' => 'Nama Kelas'

						);
					
					?>
					<?php echo form_input($data) ?>
					
				</div>
				<div class="form-group row">
					
				</div>

				<div class="form-group row">
					<label>Upload Banner Kelas (Ukuran 512x512 px)</label>
					<input type="file" name="class_banner" class="form-control" accept="image/*">
				</div>			

				<div class="form-group row">
					<?php 
						$data = array(

							'class' => 'form-control',
							'name' => 'class_link_video_preview',
							'placeholder' => 'Kode Video Preview Kelas'

						);
					
					?>
					<?php echo form_input($data) ?>
					<a href="" data-toggle="modal" data-target="#exampleModal">Cara upload video untuk kelas ?</a>
				</div>

				<div class="form-group row">
					<label>Deskripsi Kelas</label>
					<?php 
						$data = array(

							'class' => 'form-control',
							'name' => 'class_description',
							

						);
					
					?>
					<?php echo form_textarea($data) ?>
					
				</div>

				<div class="form-group row">
					<label>Harga Kelas</label>
					<?php 
						$data = array(

							'class' => 'form-control',
							'name' => 'class_price',
							'value' => '0'

						);
					
					?>
					<?php echo form_input($data) ?>
					<small><i>Biarkan default 0 apabila kelas anda gratis</i></small>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tutorial Upload Video Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ltwGdD5NZww?rel=0" allowfullscreen></iframe>
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

