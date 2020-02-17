

<section class="person">
	<h1 class="text-center">Verifikasi Users List</h1>
</section>

<section class="person-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered" id="usersTable">
					<thead>
						<tr>
							<th>Divisi</th>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Status Akun</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($person as $item) { 

							if($item->stat_akun == 1)	
							{
								$statusAkun = '<span class="badge badge-primary">Sudah Terverifikasi</span>';
							}
							if($item->stat_akun == 2)
							{
								$statusAkun = '<span class="badge badge-danger">Belum Terverifikasi</span>';
							}	
							if($item->role_akun == 1)
							{
								$roleAkun = '<span class="badge badge-success">Administrator</span>';
							}
							if($item->role_akun == 2)
							{
								$roleAkun = '<span class="badge badge-primary">Direktur Utama</span>';
							}
							if($item->role_akun == 3)
							{
							$roleAkun = '<span class="badge badge-primary">Direktur Keuangan</span>';
							}
							if($item->role_akun == 4)
							{
								$roleAkun = '<span class="badge badge-primary">Finance</span>';
							}

							if($item->role_akun == 5)
							{
								$roleAkun = '<span class="badge badge-primary">HRD</span>';
							}
							if($item->role_akun == 6)
							{
								$roleAkun = '<span class="badge badge-primary">Legal</span>';
							}
							if($item->role_akun == 7)
							{
								$roleAkun = '<span class="badge badge-primary">Konstruksi</span>';
							}
							if($item->role_akun == 8)
							{
								$roleAkun = '<span class="badge badge-primary">IT Development</span>';
							}	
							if($item->role_akun == 9)
							{
								$roleAkun = '<span class="badge badge-primary">Research and Development</span>';
							}
						?>
						<tr>
							<td><?php echo $roleAkun ?></td>
							<td><?php echo $item->fullname ?></td>
							<td><?php echo $item->email ?></td>
							<td><?php echo $statusAkun ?></td>
							<td>
								<a href="<?php echo base_url() ?>Backend/Person/show/<?php echo $item->id_user ?>" class="btn btn-primary">View</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
