<div class="container-fluid" id="bg-placeholder">
    <section class="block-lecture mt-4 pb-4 pt-4">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h3 class="text-white">Informasi Kelas</h3>
                <ul class="list-group">
                    <li class="list-group-item">Nama Pengajar : <?php echo $detailClass->fullname ?></li>
                    <li class="list-group-item">Judul Kelas : <?php echo $detailClass->class_name ?></li>
                    <li class="list-group-item">Tipe Kelas : <?php echo $detailClass->type_name ?></li>
                </ul>
                <!-- <div class="section-btn-action pt-2 text-white">
					
					
					<div class="section-btn-action pt-2 text-white">
					id user bug : <?php echo  $profile->id_student?>
					<br>
					id user setelah login : <?= var_dump($this->session->userdata('id_student')) ?>
					
					
				</div>
			</div> -->
			<a href="<?php echo base_url() ?>Frontend/Lecture/buy/<?php echo $detailClass->id_class ?> " class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Beli Kelas</a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h3 class="text-white">Preview Kelas</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $detailClass->class_link_video_preview ?>?controls=0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3>Materi yang akan kalian pelajari</h3>
                    <ul class="list-group">
						<?php 
							foreach($listMateri as $materi) {
						?>
							<li class="list-group-item"> <i class="fas fa-check"></i> <?php echo $materi->theory_name ?></li>
						<?php 	
							}
						?>
                        
                    </ul>
                   
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3>Persyaratan sebelum memulai kelas</h3>
                    <ul class="list-group">
					<?php 
							foreach($listCondition as $condition) {
						?>
							<li class="list-group-item"> <i class="fas fa-check"></i> <?php echo $condition->condition_name ?></li>
						<?php 		
							}
						?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>Deskripsi kelas</h3>
                    <p>
                        <?php echo $detailClass->class_description ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

