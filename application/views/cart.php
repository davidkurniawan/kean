<div class="container-fluid cart px-0">
  <div class="py-0 py-lg-5 pb-5 px-0 px-lg-4 container">
    
    <div class="d-flex align-content-between flex-wrap text-start px-0 pb-3">
        
        <?php
            if(empty($this->cart->contents())) {
                loadview('components/cart/empty.php');
            } else {
                loadview('components/cart/ringkasan.php');
            } 
        ?>
        
        
    </div>

  </div>
  
</div>
