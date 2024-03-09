
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <meta name="title" content="-">
    <meta name="description" content="-">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="-">
    <meta property="og:title" content="-">
    <meta property="og:description" content="-">
    <meta property="og:image" content="<?php echo IMAGES ?>metashare.png">
    
    <link rel="shortcut icon" href="<?php echo IMAGES ?>favicon.svg" type="image/x-icon">
    <link rel="icon" href="<?php echo IMAGES ?>favicon.svg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS ?>base.css" rel="stylesheet">    

    <title>Business Partner - Diary</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    </script>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="registerDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-join">
        <div class="modal-content">   
            <div class="modal-header">
                <button type="button" class="btn-close pull-right" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body pb-5">
                <?php loadview("components/join-reseller"); ?>
            </div>
        </div>
    </div>
    </div>


    <div class="container-fluid login p-0">
        <div class="container p-0 p-xl-5 d-flex justify-content-center h-100">
            <div class="card align-self-center col-12 col-lg-6 p-5">
                <a href="index.php?page=reseller&navbar=blue" class="text-center"><img src="<?php echo IMAGES ?>logo.png" class="logo"/></a>
                <div class="card-body my-2 text-center">                    
                    <h1 class="card-title">Hello, welcome to Diary! ?</h1>
                    <p class="card-text mb-4">Please submit your code from email account</p>
                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?php echo $this->session->flashdata('msg') ?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <form class="form-floating mb-0" method="POST" action="<?php echo BASEURL.'user/accountverifikasiAct' ?>">
                        <div class="col-md mb-2">
                            <div class="form-floating">
                                <input type="text" name="kodeVer" class="form-control" id="floatingEmail" placeholder="Email" required>
                                <label for="floatingEmail">Kode Verifikasi</label>
                            </div>
                        </div>
                        
                        <div class="row px-2">
                            <button type="submit" class="btn btn-blue d-block d-lg-inline">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>    

    <?php
        if(isset($_GET["page"]) && $_GET["page"] == "product") {
            echo '<script src="js/Nzoom.min.js"></script>';
        }
    ?> 

    <script src="<?php echo ASSETS ?>js/base.js"></script>   
    <script type="text/javascript">
        $(document).ready(function () {
            var count = 0;
            $('.passwordShow').click(function () {
                count += 1;
                if ((count % 2) == 0) {
                    $("input[name='password']").attr('type','text');
                } else {
                    $("input[name='password']").attr('type','password');
                }
            });
        });
    </script>
        
</body>

</html>