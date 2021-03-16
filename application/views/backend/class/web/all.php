<h1 class="text-center">List Kelas</h1>

<section class="classWeb">
	<?php if ($this->session->flashdata('update')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('update'); ?>
			</strong> 
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('failed')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('failed'); ?>
			</strong> 
		</div>
	<?php endif; ?>

	
</section>


<div class="row mt-5">
	<div class="col-md-12">

		<div class="table-responsive mt-2">
			<table class="table" id="webTable"> 
				<thead>
					<tr>
						<th>Tipe Kelas</th>
						<th>Nama Kelas</th>
						<th>Nama Pengajar</th>
						<th>Status Kelas</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($all_class_data as $class)
						{
					?>
					<tr>
						<td><?php echo ($class->class_type_id == 1) ? '<span class="badge badge-secondary">'.$class->type_name.'</span>' : '<span class="badge badge-primary">'.$class->type_name.'</span>' ?></td>
						<td><?php echo  $class->class_name ?></td>
						<td><?php echo  $class->fullname ?></td>
						<td>
						<?php if($class->class_status == 0) : ?>
							<?php echo form_open('Backend/WebClass/updateKelasAktif/'. $class->id_class) ?>
									<button data-toggle="tooltip" title="Aktifasi Kelas" class="btn btn-secondary" type="submit"><i class="fa fa-window-close"></i></button>
							<?php echo form_close() ?>
						<?php endif; ?>
						<?php if($class->class_status == 1) : ?>
							<?php echo form_open('Backend/WebClass/updateKelasNonAktif/'. $class->id_class) ?>
								<button data-toggle="tooltip" title="Non Aktifasi Kelas" class="btn btn-info" type="submit"><i class="fa fa-check"></i></button>
							<?php echo form_close() ?>
						<?php endif; ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
