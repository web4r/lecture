<!-- Content Row -->
<?php 
	
	if($item->stat_akun == 1)
	{
		$statusAkun = '<span class="badge badge-success">Sudah Terverifikasi</span>';
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
	


	if($item->approval == 0)
	{
		$approvalStat = '<span class="badge badge-danger">Tidak</span>';
	}
	if($item->approval == 1)
	{
		$approvalStat = '<span class="badge badge-primary">Ya</span>';
	}
	

?>

<?php if($this->session->userdata('role_akun')==1){ ?>
<div class="row">
	<div class="container">
		<div class="row mb-3">

			<div class="col-md-4">
				<div class="card border-left-primary mb-3">
					<div class="card-body">
						<div class="card-title text-center"><h4><i class="fa fa-users" style="color: #375ECE"></i> Total Users</h4></div>
						
						<ul class="list-group">
							<li class="list-group-item">
								Total <span class="badge badge-primary counter"><?php echo $totalUser ?></span> User 
								<a href="<?php echo base_url() ?>Backend/Person/" class="btn btn-primary btn-block">Lihat User</a>
							</li>
							
						</ul>
					</div>
				</div>	

				
				
			</div>
			<div class="col-md-4">
				<div class="card border-left-primary mb-3">
					<div class="card-body">
						<div class="card-title text-center"><h4><i class="fa fa-bell" style="color: #375ECE"></i> Notifikasi Users</h4></div>
						
						<ul class="list-group">
							<li class="list-group-item">
								Ada <span class="badge badge-primary"><?php echo $notif ?></span> User Belum Diverifikasi
								<a href="<?php echo base_url() ?>Backend/Person/verifyUser" class="btn btn-primary btn-block">Lihat User</a>
							</li>
							
						</ul>
					</div>
				</div>

				

			</div>

			<div class="col-md-4 ">
				<div class="card border-left-danger mb-3">
					<div class="card-body">
						<div class="card-title text-center"><h4><i class="fa fa-bell" style="color: red"></i> Coming Soon</h4></div>
						
						<ul class="list-group">
							<li class="list-group-item">
								 <span class="badge badge-danger">Coming Soon Feature</span> 
								<!-- <a href="<?php echo base_url() ?>Backend/Person/verifyUser" class="btn btn-primary btn-block">Lihat User</a> -->
							</li>
							
						</ul>
					</div>
				</div>

			
			</div>
			
			
		</div>

		<div class="row mb-3">
			<div class="col-md-4">
				<div class="card bg-primary text-white">
					<div class="card-body">
						<div class="card-title text-center"><h4><i class="fa fa-file"></i> Total Portofolio Perusahaan</h4></div>
						
						<h2 class="text-center"><span class="counter"><?php echo $totalPortofolio ?></span></h2>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card bg-primary text-white">
					<div class="card-body">
						<div class="card-title text-center"><h4><i class="fa fa-file"></i> Total Nomor Surat</h4></div>
						
						<h2 class="text-center"><span class="counter"><?php echo $totalNomorSurat ?></span></h2>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card bg-primary text-white">
					<div class="card-body">
						<div class="card-title text-center"><h4><i class="fa fa-file"></i> Total Cloud File</h4></div>
						
						<h2 class="text-center"><span class="counter"><?php echo $totalCloudFile ?></span></h2>
					</div>
				</div>
			</div>

		</div>
		<div class="row mb-5">
			<div class="col-md-8">
				<div class="card border-left-primary">
					<div class="card-body">
						<div class="card-title text-center"><h1><i class="fa fa-user" style="color: #375ECE"></i> My Profile</h1></div>
						
						<ul class="list-group">
							<li class="list-group-item">Divisi : <?php echo $roleAkun ?></li>
							<li class="list-group-item">Nama Lengkap : <?php echo $item->fullname ?></li>
							<li class="list-group-item">Email : <?php echo $item->email ?></li>
							<li class="list-group-item">Telepon : <?php echo $item->phone ?></li>
							<li class="list-group-item">FAX : <?php echo $item->fax ?></li>
							<li class="list-group-item">Status Akun : <?php echo $statusAkun ?></li>
							<li class="list-group-item">Hak Approval : <?php echo $approvalStat ?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mt-3 border-left-danger">
					<div class="card-body">
						<div class="card-title text-center"><h4><i class="fa fa-list" style="color: #375ECE"></i> Kode Status</h4></div>
						
						<ul class="list-group">
							<li class="list-group-item">01 - Sudah Terverifikasi</li>
							<li class="list-group-item">02 - Belum Diverifikasi</li>
						</ul>

						<div class="card-title text-center mt-3"><h4><i class="fa fa-list" style="color: #375ECE"></i> Kode Divisi</h4></div>
						
						<ul class="list-group">
							<li class="list-group-item">01 - Administrator</li>
							<li class="list-group-item">02 - Direktur Utama</li>
							<li class="list-group-item">03 - Direktur Keuangan</li>	
							<li class="list-group-item">04 - Finance</li>
							<li class="list-group-item">05 - HRD</li>
							<li class="list-group-item">06 - Legal</li>
							<li class="list-group-item">07 - Konstruksi</li>
							<li class="list-group-item">08 - IT Development</li>
							<li class="list-group-item">09 - Research and Development</li>
						</ul>
					</div>
				</div>
				<ul class="list-group">
					
				</ul>
			</div>
		</div>
		
	</div>
</div>
<?php } else { ?>

<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="card-title text-center"><h1><i class="fa fa-user" style="color: #375ECE"></i> My Profile</h1></div>
						
						<ul class="list-group">
							<li class="list-group-item">Divisi : <?php echo $roleAkun ?></li>
							<li class="list-group-item">Nama Lengkap : <?php echo $item->fullname ?></li>
							<li class="list-group-item">Email : <?php echo $item->email ?></li>
							<li class="list-group-item">Password : <a href='<?php echo base_url() ?>Backend/Person/showPassword/<?php echo $item->id_user ?>' class="btn btn-danger">Ganti Password <i class="fa fa-edit"></i></a></li>
							<li class="list-group-item">Telepon : <?php echo $item->phone ?></li>
							<li class="list-group-item">FAX : <?php echo $item->fax ?></li>
							<li class="list-group-item">Status Akun : <?php echo $statusAkun ?></li>
							<li class="list-group-item">Hak Approval : <?php echo $approvalStat ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

