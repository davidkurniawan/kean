function previewFile(){
    var file = $("#customFileInput").get(0).files[0]; 
    var formData = new FormData();
    formData.append('photo', file);

    $.ajax({
           url : 'https://diaryofficial.id/profile/photoProfile',
           type : 'POST',
           data : formData,
           processData: false,  // tell jQuery not to process the data
           contentType: false,  // tell jQuery not to set contentType
           success : function(data) {
               console.log(data);
           }
    });
    
    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#previewImage").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}




(function($) {

    /*------------------
        ScrollBar
    --------------------*/
    $(".width-overflow").niceScroll({
        cursorborder:"",
        cursorcolor:"#afafaf",
        boxzoom:false
    });

    $(".product-thumbs-track").niceScroll({
        cursorborder:"",
        cursorcolor:"#afafaf",
        boxzoom:false
    });

})(jQuery);

$(document).ready(function() {

    const BASEURL = "http://localhost/kean/";

    $('.color-product').click(function () {
        var dataidProd = $(this).data('idprod');
        var dataidProdItem = $(this).data('idproditem');
        var slugColor = $(this).data('slugcolor');

        $.post( BASEURL+'product/searchProductSize', { dataidProd: dataidProd, slugColor: slugColor }).done(function( data ) {
            $('#size-product').html(data);
            $('#qty').val('0');
        });
    });

    $('#size-product').change(function () {
        var dataidProdItem = $(this).find(":selected").val();
        $.post( BASEURL+'product/getProductItem', { dataidProdItem: dataidProdItem }).done(function( data ) {
            var obj = JSON.parse(data);
            $('#show-qty-product').html(obj.result);
            $("#qty").attr('data-max',obj.qty);
            $(".plus").attr('data-max',obj.qty);
            $("#idProductItem").val(obj.idProductItem);
        });
    });

    $('#buyNow').click(function () {
        var idProductItem = $('#idProductItem').val();
        var qty = $('#qty').val();
        $.post( BASEURL+'cart/buynow', { prodItem: idProductItem, qty: qty }).done(function( data ) {
            var obj = JSON.parse(data);
            window.location=obj.message;
        });
    });

    $('.slick-brand').slick({
        autoplay: true,
        autoplaySpeed: 1000,
    });

    if ($(this).scrollTop() >= 1) {
        $('.header').addClass('sticky'); 
        $('.sectionFirst').addClass('top'); 
        
        if(document.getElementsByClassName('profile') != null) {
            $('.profile').addClass('top'); 
        }

      }else{
        $('.header').removeClass('sticky');
        $('.header').removeClass('up');
        $('.sectionFirst').removeClass('top'); 
        
        if(document.getElementsByClassName('profile') != null) {
            $('.profile').removeClass('top'); 
        }
    }

    if(document.getElementsByClassName('profile-tab') != null) {
        var url = window.location.href;
        var activeTab = url.substring(url.indexOf("#") + 1);

        if(document.getElementById(activeTab) != null) {
            $(".tab-pane.parent").removeClass("active");
            $(".tab-pane.parent").removeClass("show");
            $("#" + activeTab + "-tab").addClass("active");
            $("#" + activeTab).addClass("show active");
        }

        if(document.getElementById('customFileInput') != null) {
            document.querySelector('.custom-file-input').addEventListener('change', function (e) {
                var name = document.getElementById("customFileInput").files[0].name;
                var nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = name;
            })
        }
        
    }

    const toastTrigger = document.getElementById('saveChange')

    if (toastTrigger != null) {
        const toastChange = document.getElementById('changeToast')
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastChange)

            toast.show()
        })
    }


    /**
   * Hero Slider
   */
    var swiper = new Swiper(".sliderFeaturedPosts", {
    spaceBetween: 0,
    speed: 500,
    centeredSlides: true,
    loop: true,
    slideToClickedSlide: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".custom-swiper-button-next",
      prevEl: ".custom-swiper-button-prev",
    },
    });
    

    let items = document.querySelectorAll('#carouselStack .carousel .carousel-item')
    
    if (items != null) {
        items.forEach((el) => {
            const minPerSlide = 3
            let next = el.nextElementSibling
            for (var i=1; i<minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    }

    let thumbnails = document.getElementsByClassName('thumbnail')
    let activeImages = document.getElementsByClassName('active')

    if(thumbnails != null && activeImages != null) {
        for (var i=0; i < thumbnails.length; i++){
            thumbnails[i].addEventListener('mouseover', function(){				
            
                if (activeImages.length > 0){
                    activeImages[0].classList.remove('active')
                }
        
                this.classList.add('active')
                document.getElementById('NZoomImg').src = this.src
            })
        }
    
        let buttonRight = document.getElementById('slideRight');
        let buttonLeft = document.getElementById('slideLeft');

        if(buttonRight != null && buttonLeft != null) {
            buttonLeft.addEventListener('click', function(){
                document.getElementById('slider').scrollLeft -= 180
            })
        
            buttonRight.addEventListener('click', function(){
                document.getElementById('slider').scrollLeft += 180
            })
        }
    
    }

    if(document.getElementById('totalJumlah') != null && document.getElementsByClassName('minus') != null && document.getElementsByClassName('plus') != null) {
        $(".totalkeun").change(function() {
            var count = $(this).val();
            var price = $(this).data('price');
            var total = price * count;
            if(price > 0) {
                $('.totalHarga').text("IDR " + (total/1000).toFixed(3));            
                console.log($(".totalHarga").text())
            }else{
                hitungTotalan()
            }
        });
    
        $('.minus').click(function () {

            var input = $("#qty");
            var count = parseInt(input.val()) - 1;
            count = count < 1 ? 1 : count;
            input.val(count);
            input.change();

            return false;
        });
    
        $('.plus').click(function () {
            var input = $("#qty");
            var countQty = parseInt(input.val()) + 1;
            var getMaxQty = $(this).data('max');
            if(countQty <= getMaxQty){
                input.val(parseInt(input.val()) + 1);
                input.change();
            } else {
                alert('Choose color and size first/Batas Maksimal');
            }

            return false;
        });
    
    }

    if(document.getElementById('flexCheckCartItems') != null) {
        $('#flexCheckCartItems').change(function() {
            $('.check-item').prop("checked", this.checked);             
        });
    }    


});

function hitungTotalan() {
    var total = 0;
    $(".totalkeun").map(function() {        
         total += $(this).data('nilai') * $(this).val();
    }).get();
    $('.totalHarga').text("IDR " + (total/1000).toFixed(3));
}

var lastScrollTop = 0;

$(window).scroll(function(){

    if ($(this).scrollTop() >= 1)  {
        $('.header').addClass('sticky'); 
        $('.sectionFirst').addClass('top'); 
        
        if(document.getElementsByClassName('profile') != null) {
            $('.profile').addClass('top'); 
        }

      }else{
        $('.header').removeClass('sticky');
        $('.header').removeClass('up');
        $('.sectionFirst').removeClass('top'); 
        
        if(document.getElementsByClassName('profile') != null) {
            $('.profile').removeClass('top'); 
        }
      }

    var st = window.pageYOffset || document.documentElement.scrollTop;

    
    if (st > lastScrollTop && st > 400){
        $('.header').addClass('up');
    } else {
        $('.header').removeClass('up');
    }
    
    lastScrollTop = st <= 0 ? 0 : st;
});

 /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });
