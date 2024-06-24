const BASEURL = "http://localhost/shop/";

function previewFile(){
    var file = $("#customFileInput").get(0).files[0]; 
    var formData = new FormData();
    formData.append('photo', file);

    $.ajax({
           url : BASEURL+'profile/photoProfile',
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
    $('.banner-primary').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    $('.product-thumbs-track .pt').click(function () {
        $('.pt').removeClass('active');
        $(this).addClass('active');

        var imgurl = $(this).data('imgbigurl');
        $('.product-pic-zoom img').attr('src',imgurl);
    });

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
            $('.harga-product').text(obj.harga);
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

    if(document.getElementsByClassName('minus-cart') != null && document.getElementsByClassName('plus-cart') != null) {
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
    
        $('.items-cart').on('click','.minus-cart',function() {
            var rowid = $(this).data('rowid');
            var id = $(this).data('proditem');
            var input = $(this).siblings(".qty-cart");
            var inputVal = $(this).siblings(".qty-cart").val();
            var count = parseInt(input.val()) - 1;
            $.post( BASEURL+"cart/updateshopingcart", { action: "minus",id:id , rowid: rowid, qty:inputVal}).done(function( data ) {
                var myObj = JSON.parse(data);
                $('.totalHarga').text(myObj.totalharga);
            });
            count = count < 1 ? 1 : count;
            input.val(count);
            input.change();
            return false;
        });
    
        $('.items-cart').on('click','.plus-cart',function() {
            var id = $(this).data('proditem');
            var rowid = $(this).data('rowid');
            var input = $(this).siblings(".qty-cart");
            var inputVal = $(this).siblings(".qty-cart").val();
            var countQty = parseInt(input.val()) + 1;
            var getMaxQty = $(this).data('max');
            if(countQty <= getMaxQty){
                $.post( BASEURL+"cart/updateshopingcart", { action: "plus",id:id ,rowid: rowid, qty:inputVal }).done(function( data ) {
                    var myObj = JSON.parse(data);
                    $('.totalHarga').text(myObj.totalharga);
                });
                input.val(parseInt(input.val()) + 1);
                input.change();
            } else {
                alert('Choose color and size first/Batas Maksimal');
            }

            return false;
        });

        $("#ubahStatusAlamat").on('click','.btn-pilih',function () {
            var addressID = $(this).parents(".pilih-address").data("idaddress");
            $(".pilih-address.checked").html( '<button type="button" class="btn btn-pilih px-5">Pilih</button>');
            $(".pilih-address").removeClass("checked");
            $(this).parents(".pilih-address").addClass("checked");
            $(this).parents(".pilih-address").html( '<i class="bi bi-check"></i>');
            $.post( BASEURL+"address/pilihalamat", { addressID: addressID })
              .done(function( data ) {
                    window.location.reload();
            });
        });
    
    }

    if(document.getElementById('flexCheckCartItems') != null) {
        $('#flexCheckCartItems').change(function() {
            $('.check-item').prop("checked", this.checked);             
        });
    }    

    var limit = 8;
    var start = 0;
    var category = $('#category-infinite').data('slug');
    var subcategory = $('#subcategory-infinite').data('slug');
    var sort = $('#sort-infinite').data('slug');
    load_page(limit, start, category, subcategory, sort, false);

    $(window).scroll(function(){
        limit++;
        if ($('#dinamyc-product').scrollTop() + $('#dinamyc-product').height() > $('#dinamyc-product').height() - 100 ) {
            if ($('#dinamyc-product').hasClass("active")) {
                load_page(limit,start, category, subcategory, sort, false);
            } 
        }
    });

    $('#btnsearchYouWant').click(function () {
        var searchVal = $('#searchYouWantText').val();
        $.post( BASEURL+"search/keyword", { keyword: searchVal })
            .done(function( data ) {
            window.location = data;
        });
    });

});

function load_page(limit,start,category, subcategory, sort,loading) {
    if(loading == false){
        loading=true;
        $.ajax({
            url: BASEURL+'product/infiniteData',
            type:'post',
            data: {
                limit:limit,
                start:start,
                category:category,
                subcategory:subcategory,
                sort:sort,
            },
            beforeSend: function (data) {
                $('#ajax-loader').show();
            }
        }).done(function (data) {
            var myObj = JSON.parse(data);

            if (myObj.code == 200) {
                $('#ajax-loader').html("<h5>Not Found ...</h5>");
                loading = true;
            } else {
                $('#dinamyc-product').removeClass('active');
            }
            $('#ajax-loader').hide();
            loading = false;
            $('#dinamyc-product').html(myObj.html);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            $('#ajax-loader').hide();
        })
    }
}

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
