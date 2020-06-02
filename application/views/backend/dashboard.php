<h1 class="text-center">Dashborad</h1>

<section class="information-account">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h3><i class="fa fa-user"></i> Informasi Akun</h3>
					<ul class="list-group">
						<li class="list-group-item">Nama Lengkap : <?php echo $user->fullname; ?></li>
						<li class="list-group-item">Email : <?php echo $user->email; ?></li>
						<li class="list-group-item">Password : 
							<a href='<?php echo base_url() ?>Backend/Person/showPassword/<?php echo $user->id ?>' class="btn btn-danger">Ganti Password <i class="fa fa-edit"></i></a>
						</li>
						<li class="list-group-item">Status Akun : 
							<span class="badge badge-primary"><?php echo ($user->is_active == 1) ? 'Belum Aktif' : 'Aktif' ; ?></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
