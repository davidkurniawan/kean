<div class="whatsapp-fix-divisi">
    <div class="whatsapp-border">
        <a href="https://wa.me/+6288294669690" target="_blank">
            <i class="bi bi-whatsapp"></i>
        </a>
    </div>
</div> 
<div class="container-fluid footer p-4 ">
    <div class="container content py-5 px-0">
        <div class="d-flex justify-content-center align-content-between text-start flex-wrap px-0">
            <div class="col-12 col-lg-3 order-1 order-lg-2 menu-footer">
                <h4 class="fw-bold">SHOP APPAREL</h4>
                <div><a href="#">T-Shirt</a></div>
                <div><a href="#">Hoodies</a></div>
                <div><a href="#">Jacket</a></div>
                <div><a href="#">Pants</a></div>
                <div><a href="#">Hats</a></div>
                <div><a href="#">Footwear</a></div>
            </div>
            <div class="col-12 col-lg-3 order-1 order-lg-2 menu-footer">
                <h4 class="fw-bold">SHOP SKATE</h4>
                <div><a href="#">Decks</a></div>
                <div><a href="#">Wheels</a></div>
                <div><a href="#">Trucks</a></div>
                <div><a href="#">Griptapes</a></div>
                <div><a href="#">Bearings</a></div>
                <div><a href="#">Hardware</a></div>
            </div>
            <div class="col-12 col-lg-3 order-2 order-lg-3 menu-footer">
                <h4 class="fw-bold">INFORMATION</h4>
                <div><a href="#">About Us</a></div>
                <div><a href="#">News</a></div>
                <div><a href="#">Shipping</a></div>
                <div><a href="#">Return Policy</a></div>
                <div><a href="#">Contact Us</a></div>
            </div>
            <div class="col-12 col-lg-3 order-2 order-lg-3 mb-4 mb-lg-0 ">
                <div>Email : Info@kean.com</div>
                <div>Telp. 021 - 97864523</div>
                <div>Address : Kebayoran lama, Jakarta 12240, Indonesia</div>
                <div class="mt-4">
                    <div class="follow-us"><h4 class="fw-bold">FOLLOW US</h4></div>
                    <ul class="list-inline socials ">
                        <li class="list-inline-item">Instagram</li>
                        <li class="list-inline-item">Facebook</li>
                        <li class="list-inline-item">Twitter</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <div class="follow-us"><h4 class="fw-bold">PAYMENT OPTION</h4></div>
                    <ul class="list-inline socials ">
                        <li class="list-inline-item">Bank Virtual Account</li>
                        <li class="list-inline-item">Indomaret</li>
                        <li class="list-inline-item">Alfamart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container p-3">
        <div class="float-end">
            <i class="bi bi-c-circle"></i> COPYRIGHT <?php echo date('Y') ?> KEAN.COM.ID
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalTurnPayment" tabindex="-1" aria-labelledby="exampleModalTurnPaymentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalTurnPaymentLabel">Pemberitahuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Mohon maaf, operasional kembali berjalan pada hari senin jam 08:00 wib!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <button type="button" class="btn btn-primary d-none" id="btnexampleModalTurnPayment" data-bs-toggle="modal" data-bs-target="#exampleModalTurnPayment">
</button>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo JS.'jquery.nicescroll.min.js' ?>"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  -->
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

    <?php
        if(isset($_GET["page"]) && $_GET["page"] == "product") {
            echo '<script src="js/Nzoom.min.js"></script>';
        }
    ?> 

    <script src="<?php echo ASSETS ?>js/base.js"></script>   

    <script type="text/javascript">
        jQuery(document).ready(function() {
            <?php if (cekTurnPayment() == 2) { ?>
            $('#btnexampleModalTurnPayment').click();
            <?php } ?>
        });
    </script>   
</body>

</html>