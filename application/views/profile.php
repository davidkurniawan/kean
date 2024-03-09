<div class="container-fluid content profile px-0">
  <div class="py-0 py-lg-5 px-0 container">
    
    <div class="d-flex align-content-between flex-wrap text-start px-0">
        
        <div class="col-12 empty mx-0 text-center mt-5">
            <ul class="nav d-flex justify-content-center flex-wrap g-4 px-2 profile-tab" id="pills-tab" role="tablist">
                <li class="nav-item col-3 col-lg-2">
                    <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item col-3 col-lg-2">
                    <a class="nav-link" id="pills-order-tab" data-bs-toggle="pill" data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order" aria-selected="true">Order</a>
                </li>
                <li class="nav-item col-3 col-lg-2">
                    <a class="nav-link" id="pills-point-tab" data-bs-toggle="pill" data-bs-target="#pills-point" type="button" role="tab" aria-controls="pills-point" aria-selected="true">Point</a>
                </li>
                <li class="nav-item col-3 col-lg-2">
                    <a class="nav-link" id="pills-history-tab" data-bs-toggle="pill" data-bs-target="#pills-history" type="button" role="tab" aria-controls="pills-history" aria-selected="true">History</a>
                </li>
            </ul>
        </div>            

    </div>

  </div>

  <div class="tab-content container p-0 mt-0 pb-5 mb-5" id="pills-tabContent">
        <div class="tab-pane parent fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <?php loadview("tabs/profile"); ?>
        </div>
        <div class="tab-pane parent fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab" tabindex="0">
            <?php loadview("tabs/orders"); ?>        
        </div>
        <div class="tab-pane parent fade" id="pills-point" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <?php loadview("tabs/points"); ?>
        </div>
        <div class="tab-pane parent fade" id="pills-history" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
            <?php loadview("tabs/history"); ?>
        </div>
    </div>

  
</div>
