<h1 class="text-center">Kelas Pemrograman Website</h1>

<section class="classWeb">
	<?php if ($this->session->flashdata('class_register')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('class_register'); ?>
			</strong> 
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('class_failed')): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>
				<?php echo $this->session->flashdata('class_failed'); ?>
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
</section>


<div class="row mt-5">
	<div class="col-md-12">
		
		<a href="<?php echo base_url() ?>Backend/WebClass/add"  class="btn btn-primary">
			<i class="fa fa-plus"></i> Kelas
		</a>

		<div class="table-responsive mt-2">
			<table class="table" id="webTable"> 
				<thead>
					<tr>
						<th>Tipe Kelas</th>
						<th>Nama Kelas</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($class_data as $class)
						{
					?>
					<tr>
						<td><?php echo ($class->class_type_id == 1) ? '<span class="badge badge-secondary">'.$class->type_name.'</span>' : '<span class="badge badge-primary">'.$class->type_name.'</span>' ?></td>
						<td><?php echo  $class->class_name ?></td>
						<td>
							<a href="<?php echo base_url() ?>Backend/WebClass/classInfo/<?php echo $class->id_class ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Informasi Kelas"><i class="fa fa-eye"></i></a>
							<a href="<?php echo base_url() ?>Backend/WebClass/classVideo/<?php echo $class->id_class ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="+ Materi Video Kelas"><i class="fa fa-list"></i></a>
							<a href="<?php echo base_url() ?>Backend/WebClass/classMateri/<?php echo $class->id_class ?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="+ Informasi materi yang akan dipelajari"><i class="fa fa-list"></i></a>
							<a href="<?php echo base_url() ?>Backend/WebClass/classCondition/<?php echo $class->id_class ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="+ Informasi Syarat Mengikuti Kelas"><i class="fa fa-list"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
