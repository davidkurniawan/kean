<section class="w-100 p-4 d-flex justify-content-center pb-4">
    <div style="width:26em;">
      <?php if ($this->session->flashdata('msg')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('msg') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>
    </div>
  </section>
<section class="w-100 p-4 d-flex justify-content-center pb-4">
    
    <div style="width: 26rem;">
        <!-- Pills navs -->
        
        <ul class="nav nav-tabs" id="loginTab" role="tablist">
          <li class="nav-item" style="width:50%" role="presentation">
            <button class="nav-link active w-100" id="login-tab" data-bs-toggle="tab" data-bs-target="#pills-login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
          </li>
          <li class="nav-item" style="width:50%" role="presentation">
            <button class="nav-link w-100" id="register-tab" data-bs-toggle="tab" data-bs-target="#pills-register" type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
          </li>
        </ul>
        <!-- Pills navs -->
        
        <!-- Pills content -->
        <div class="tab-content" id="loginTabContent">
          <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form action="<?php echo BASEURL.'user/login' ?>" method="POST">
              <!-- Email input -->
              <div data-mdb-input-init="" class="form-outline mb-4 mt-4" data-mdb-input-initialized="true">
                <label class="form-label" for="loginName" style="margin-left: 0px;">Email or username</label>
                <input type="email" id="loginName" name="email" class="form-control">
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 114.4px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Password input -->
              <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                <label class="form-label" for="loginPassword" style="margin-left: 0px;">Password</label>
                <input type="password" name="password" id="loginPassword" class="form-control">
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- 2 column grid layout -->
              <div class="row mb-4">
                <div class="col-md-6 d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-3 mb-md-0">
                    <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked="">
                    <label class="form-check-label" for="loginCheck"> Remember me </label>
                  </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center">
                  <!-- Simple link -->
                  <a href="<?php echo BASEURL.'forgot-password' ?>" class="link">Forgot password?</a>
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" data-mdb-button-init="" data-mdb-ripple-init="" class="btn btn-warning btn-block mb-4" data-mdb-button-initialized="true">Sign in</button>

            </form>
          </div>
          <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form action="<?php echo BASEURL.'user/daftar' ?>" method="POST">
              <!-- Name input -->
              <div data-mdb-input-init="" class="form-outline mb-4 mt-4" data-mdb-input-initialized="true">
                <label class="form-label" for="registerName" style="margin-left: 0px;">* Name</label>
                <input type="text" id="registerName" name="namaLengkap" class="form-control" required>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Username input -->
              <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                <label class="form-label" for="registerUsername" style="margin-left: 0px;">* Username</label>
                <input type="text" id="registerUsername" name="username" class="form-control" required>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- PhoneNumber input -->
              <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                <label class="form-label" for="registerEmail" style="margin-left: 0px;">* Phone Number</label>
                <input type="tel" id="PhoneNumber" name="telepon" class="form-control" required>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Email input -->
              <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                <label class="form-label" for="registerEmail" style="margin-left: 0px;">* Email</label>
                <input type="email" id="registerEmail" name="email" class="form-control" required>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Password input -->
              <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                <label class="form-label" for="registerPassword" style="margin-left: 0px;">* Password</label>
                <input type="password" id="registerPassword" name="password" class="form-control" required>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Repeat Password input -->
              <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                <label class="form-label" for="registerRepeatPassword" style="margin-left: 0px;">* Repeat password</label>
                <input type="password" id="registerRepeatPassword" name="repeatPassword" class="form-control" required>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Repeat Password input -->
              <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                <label class="form-label" for="registerreferalCode" style="margin-left: 0px;">Referal Code</label>
                <input type="text" id="registerreferalCode" name="referalCode" class="form-control" >
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="aggree" id="registerCheck" name="registerCheckHelpText" checked="" aria-describedby="registerCheckHelpText">
                <label class="form-check-label" for="registerCheck">
                  I have read and agree to the terms
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" data-mdb-button-init="" data-mdb-ripple-init="" class="btn btn-warning btn-block mb-3" data-mdb-button-initialized="true">Sign Up</button>
            </form>
          </div>
        </div>
        <!-- Pills content -->
      </div>
</section>
