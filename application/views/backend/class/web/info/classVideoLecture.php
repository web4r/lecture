<h1 class="text-center">List Materi Video</h1>
<?php if ($this->session->flashdata('success_add')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('success_add'); ?>
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

<?php if ($this->session->flashdata('success_update')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>
			<?php echo $this->session->flashdata('success_update'); ?>
		</strong> 
	</div>
	<?php endif; ?>
<div class="row mt-5">
	<div class="col-md-12">
		
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-plus"></i> Materi Video
		</button>

		<div class="table-responsive mt-2">
			<table class="table" id="webTable"> 
				<thead>
					<tr>
						<th>Judul Materi</th>
						<th>Kode Video Youtube</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach($classVideoLecture as $video){ ?>
					<tr>
						<td><?php echo $video->lecture_name ?></td>
						<td><?php echo $video->lecture_video_link ?></td>
						<td>
							<a href="<?php echo base_url() ?>Backend/WebClass/deleteVideoClass/<?php echo $video->id_detail_lecture ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							<a href="<?php echo base_url() ?>Backend/WebClass/editVideoClass/<?php echo $video->id_detail_lecture ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Video Materi Form -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php echo form_open('Backend/WebClass/saveVideo/'.$classInfo->id_class) ?>
			<div class="form-group">
				<?php 
					echo form_label('Judul Materi');
					$data = array(
						'name' => 'lecture_name',
						'type' => 'text',
						'class' => 'form-control'
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
						'class' => 'form-control'
					);
					echo form_input($data);
				?>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-block btn-primary">Simpan</button>
			</div>
		<?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
