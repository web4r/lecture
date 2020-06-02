<div class="container-fluid">
    <section class="playlist mt-2">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <h3>Materi Kelas</h3>
                <ul class="list-group">
					<?php foreach($listMateri as $materi) {?>
						<li class="list-group-item"><a href="<?php echo base_url() ?>Frontend/Lecture/playVideo/<?php echo $materi->class_id ?>/<?php echo $materi->id_detail_lecture ?>"><i class="fas fa-video"></i> <?php echo $materi->lecture_name ?></a> </li>
					<?php } ?>
				</ul>
			</div>
		
            <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-body mx-auto">
						<div class="text-center">
							<h3>Selamat Datang di Kelas</h3>
							<h3><?php echo $detailClass->class_name ?></h3>
						</div>
					
						<div class=" pt-2">
							<img class="card-img-top img-fluid" style="width: 240px;height:240px;" src="<?php echo base_url() ?>assets/img/bannerClass/<?php echo $detailClass->class_banner ?>" alt="Card image cap">
						</div>
                    </div>
                </div>
			</div>
			
        </div>
    </section>
</div>

