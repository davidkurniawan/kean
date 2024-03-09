<div class="container-fluid content product-detail bg-cyan px-0">
  <div class="py-5 px-4 container">
    
    <div class="d-flex align-content-between flex-wrap text-start px-0 gap-3 pb-3">    
    
        <img loading="lazy" src="<?php echo ASSETS ?>img/title/diary-news.png" class="img-title-detail align-self-center my-3"/>

        <div class="tips">
            <div class="row row-cols-1 row-cols-md-3 g-4 g-lg-5 mb-5 shadowed">
                <?php foreach ($beautytips as $key => $beu): ?>
                    <div class="col">
                        <div class="card py-4 px-3">
                            <img src="<?php echo BACKENDURL.$beu['image'] ?>" class="card-img-top" alt="..." loading="lazy">
                            <div class="card-body text-left px-1 py-3">
                                <h5 class="card-title"><?php echo $beu['title'] ?></h5>
                                <p class="card-text text-left"><?php echo word_limiter($beu['description'],25); ?></p>
                            </div>
                            <div class="card-footer d-flex justify-content-between px-1">
                                <a href="<?php echo BASEURL.'diarynews/readmore/'.$beu['url_title'] ?>">Lihat Selengkapnya</a>
                                <a href=""><i class="bi bi-share"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                
            </div>

            <div class="col-12 text-center">
                <a href="" class="btn btn-blue d-relative mt-4" type="button">Show More</a>
            </div>

        </div>
        
        
    </div>

  </div>
  
</div>
