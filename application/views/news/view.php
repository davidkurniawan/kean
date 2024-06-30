<main class="main">

<section class="section-portal pt-5">
  <div class="container-fluid height-lg-523 pb-5">
    <div class="row">
      <div class="col-12 col-lg-3">
        <?php foreach ($left as $key => $l): ?>
        <div class="card-news left-featured height-lg-523 pb-3">
          <img src="<?php echo BASEBACK.$l['thumbnail'] ?>" class="img-fluid">
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
    <section id="posts" class="posts">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row ">

          <div class="col-lg-9">
            <div class="row g-5 ms-3">
              <div class="col-lg-12 p-5-5  custom-border">
                <?php foreach ($non as $key => $n): ?>
                <div class="post-entry-1 d-flex">
                  <div class="text large-1 p-2 margin-bottom columns">
                    <div class="date-day text-white"><?php echo date('d',strtotime($n['created_date'])) ?></div>
                    <div class="date-month text-white"><?php echo date('F',strtotime($n['created_date'])) ?></div>
                    <div class="date-year text-white"><?php echo date('Y',strtotime($n['created_date'])) ?></div>
                  </div>
                  <a href="single-post.html"><img src="<?php echo BASEBACK.$n['thumbnail'] ?>" alt="" class="img-fluid"></a>
                  <div class="card-body col-lg-8 col-12">
                    <h3 class="fw-bold "><a href="<?php echo BASEURL.'news/detail/'.$n['url'] ?>"><?php echo $n['title'] ?></a></h3>
                    <p style="font-size: 18px;" class="pb-4 d-block "><?php echo $n['simple_description'] ?></p>
                  </div>
                </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <div class="col-lg-3 p-5-5  custom-border">
            <div class="side-entry ms-2">
                <div class="border-top">
                  <div class="title">ALL ABOUT</div>
                </div>
                <div class="list-entry">
                  <ul>
                    <li>Shop Wiki</li>
                    <li>Shop Trick Tips</li>
                  </ul>
                </div>
            </div>
            <div class="side-entry ms-2">
                <div class="border-top">
                  <div class="title">POPULAR POST</div>
                </div>
                <div class="list-entry">
                  <ul>
                    <li>Shop Wiki</li>
                    <li>Shop Trick Tips</li>
                  </ul>
                </div>
            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->

  </main><!-- End #main -->