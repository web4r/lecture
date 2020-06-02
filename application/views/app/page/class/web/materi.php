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
                    <div class="card-body">
						<div class="embed-responsive embed-responsive-16by9" >
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $materiVideo->lecture_video_link ?>?controls=0" allowfullscreen></iframe>
						</div>
					
                    </div>
                </div>
			</div>
			
        </div>
    </section>
</div>

