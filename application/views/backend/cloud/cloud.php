<section class="cloud-head">
	<h1 class="text-center">Cloud File</h1>
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
	<?php if ($this->session->flashdata('errors')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('errors'); ?>
			</strong> 
		</div>
	<?php endif; ?>
</section>

<section class="cloud-body">
	<div class="container">
		<div class="row mt-3 mb-5">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				<i class="fa fa-plus"></i> Cloud File	
			</button>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table" id="cloudTable">
						<thead>
							<tr>
								<th>Tanggal Upload</th>
								<th>Nama File</th>
								<th>Download File</th>
								<th>Keterangan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($cloud as $item) { ?>
							<tr>
								<td><?php echo date('d-m-Y',strtotime($item->tgl_upload)) ?></td>
								<td><?php echo $item->nama_file ?></td>
								<td>
									<a href="<?php echo base_url() ?>assets/cloud/public/<?php echo $item->file_upload ?>" download="<?php echo $item->nama_file ?>">
										<i class="fa fa-file-pdf fa-3x" style="color: red"></i>
									</a>
								</td> 
								<td><?php echo $item->keterangan_file ?></td>
								<td>
									<a href="<?php echo base_url() ?>Backend/Cloud/delete/<?php echo $item->id_cloud ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									<a href="<?php echo base_url() ?>Backend/Cloud/edit/<?php echo $item->id_cloud ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Upload Cloud File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php echo form_open_multipart('Backend/Cloud/do_post') ?>
			<div class="form-group">
				<?php 
					echo form_label('Tanggal Upload File');
					$data = array(
						'class'=>'form-control',
						'name'=>'tgl_upload',
						'type'=>'date'
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
						'placeholder'=>'Masukan Nama File'
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
						'placeholder'=>'Masukan Keterangan File',
						'rows'=>3,
						'cols'=>3
					);
					echo form_textarea($data);
				
				?>
			</div>
			<div class="form-group">
				<?php 
				
					$data = array(
						'class'=>'btn btn-primary',
						'value'=>'Simpan'
					);
					echo form_submit($data);
				
				?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		<?php echo form_close() ?>
		</div>	
    </div>
  </div>
</div>
