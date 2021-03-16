<section class="person">
	<h1 class="text-center">Student List</h1>
</section>

<section class="person-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered" id="usersTable">
						<thead>
							<tr>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Status Akun</th>
								
							</tr>
						</thead>
						<tbody>
							<?php foreach($student as $item) 
								{ 
									if($item->is_active == 1)
									{
										$statusAkun = '<span class="badge badge-danger">Belum Terverifikasi</span>';
									}
									if($item->is_active == 2)
									{
										$statusAkun = '<span class="badge badge-primary">Sudah Terverifikasi</span>';
									}

							?>
							<tr>
								<td><?php echo $item->fullname ?></td>
								<td><?php echo $item->email ?></td>
								<td><?php echo $statusAkun ?></td>
								
							</tr>
							<?php 
								}	
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

