<main class="main">

<section class="section-portal pt-5">
  <div class="container-fluid height-lg-523 pb-5">
    <div class="row">
      <div class="col-12 col-lg-3">
        <?php foreach ($left as $key => $l): ?>
        <div class="card left-featured height-lg-523 pb-3">
          <img src="<?php echo BASEBACK.$l['thumbnail'] ?>">
          <div class="card-body pb-3">
            <h5 class="card-title fw-bold"><?php echo $l['title'] ?></h5>
          </div>
        </div>
        <?php endforeach ?>
      </div>
      <div class="col-12 col-lg-5">
        <?php foreach ($center as $key => $l): ?>
        <div class="responsive center-featured height-lg-523" style="background-image:url('<?php echo BASEBACK.$l['thumbnail'] ?>');">
          <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $l['title'] ?></h5>
          </div>
        </div>
        <?php endforeach ?>
      </div>
      <div class="col-12 col-lg-4">
        <?php foreach ($right as $key => $l): ?>
        <div class="responsive right-featured pb-3 height-lg-523">
          <img src="<?php echo BASEBACK.$l['thumbnail'] ?>" class="img-fluid">
          <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $l['title'] ?></h5>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts mt-5">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row g-5">

          <div class="col-lg-9">
            <div class="row g-5 ms-3">
              <div class="col-lg-12 p-5-5  custom-border">
                <?php foreach ($non as $key => $n): ?>
                <div class="post-entry-1 d-flex">
                  <div class="text large-1 p-2 margin-bottom columns">
                    <div class="date-day"><?php echo date('d',strtotime($n['created_date'])) ?></div>
                    <div class="date-month"><?php echo date('F',strtotime($n['created_date'])) ?></div>
                    <div class="date-year"><?php echo date('Y',strtotime($n['created_date'])) ?></div>
                  </div>
                  <a href="single-post.html"><img src="<?php echo BASEBACK.$n['thumbnail'] ?>" alt="" class="img-fluid"></a>
                  <div class="card-body col-lg-8 col-12">
                    <h3 class="fw-bold"><a href="single-post.html"><?php echo $n['title'] ?></a></h3>
                    <p style="font-size: 18px;" class="pb-4 d-block"><?php echo $n['description'] ?></p>
                  </div>
                </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <div class="col-lg-3 p-5-5  custom-border">
            <div class="post-entry-1">
                <a href="single-post.html"><img src="<?php echo ASSETS.'img/news/' ?>post-landscape-2.jpg" alt="" class="img-fluid"></a>
                <div class="card-body">
                  <h2 class="fw-bold"><a href="single-post.html">Let’s Get Back to Skate, Jakarta</a></h2>
                  <p style="font-size: 14px;" class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus </p>
                </div>
                
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="<?php echo ASSETS.'img/news/' ?>post-landscape-5.jpg" alt="" class="img-fluid"></a>
              <h2 class="fw-bold"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
            </div>
            <div class="post-entry-1">
              <a href="single-post.html"><img src="<?php echo ASSETS.'img/news/' ?>post-landscape-7.jpg" alt="" class="img-fluid"></a>
              <h2 class="fw-bold"><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->

  </main><!-- End #main -->