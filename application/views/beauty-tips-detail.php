<div class="container-fluid content product-detail px-0">
  <div class="py-5 px-4 container">
    
    <div class="d-flex align-content-between flex-wrap text-start px-0 gap-3 pb-3">
        <div class="col-12 article">
            <h1 class="title"><?php echo $post['title'] ?></h1>
            <small class="date"><?php echo date("j F Y",strtotime($post['created_date'])) ?></small>            

            <p>
                <img src="<?php echo BASEBACK.$post['image'] ?>" class="banner"/>

                <?php echo $post['description'] ?>
            </p>
        </div>

        <h4 class="mt-5 title text-start">Beauty Tips terbaru:</h4>
        <div class="tips">
            <div class="row row-cols-1 row-cols-md-4 g-3 g-lg-4 pt-1 mb-5 shadowed">
                <?php foreach ($beautytips as $key => $beu): ?>
                    <?php if ($beu['url_title'] != $post['url_title']): ?>
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
                    <?php endif ?>
                <?php endforeach ?>
             </div>
        </div>
        
    </div>

  </div>
  
</div>
