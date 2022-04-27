@include('template/header')

<div class="hero-wrap js-fullheight" style="background-image: url(images/bgpa.jpeg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <span class="subheading">Selamat Datang Di Wisata Kawasan Danau Toba</span>
                <h1 class="mb-4">Kunjugi Tempat Favorit Anda</h1>
                <p class="caps">Kepingan Surga Toba</p>
            </div>
            <a href="https://www.youtube.com/watch?v=e9B_a2L7Zr4"
                class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                <span class="fa fa-play"></span>
            </a>
        </div>
    </div>
</div>
<!-- Product -->
<div class="bg0 m-t-23 p-b-140">

    <div class="container">
        <h1 class="title" style="font-weight: bold ; color:black;">Jelajahi Budaya dan Warisan Unik di Danau
            Toba</h1>
        <br>
        <p class="caption" style=" color:black;">Memiliki Budaya dan Warisan yang unik menjadikan Danau Toba
            sebagai destinasi yang harus di kunjungi.
            Berbagai macam wisata yang menyatu dengan budaya yang ada membuat kamu tidak akan melukapan keindahan Danau
            Toba.
		</p>
        <hr class="mt-2 mb-3" style="border:solid 0.5px" />
        <br>
        <div class="container p-md-2 p-2">
            <h4 class="heading" style="font-weight: bold ; color:black;">Pilih Kabupaten yang Ingin Kamu Tinjau!</h4>
            <div class="row g-2 g-md-4">
                @foreach ($objwisatakabupaten as $objekwisatas)
                    <div class="col-6 col-md-3 py-4">
                        <div class="mycard">
                            <img src="{{ url('images/objekwisata/' . $objekwisatas->file_foto) }}" alt=""
                                class="mycard-image">
                            <h3 class="mycard-title">{{ $objekwisatas->nama_kab }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


{{-- <!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Lihat Selengkapnya
				</a>
			</div>
	
	</div> --}}

<!--===============================================================================================-->
<script src="template2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="template2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="template2/vendor/bootstrap/js/popper.js"></script>
<script src="template2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="template2/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="template2/vendor/daterangepicker/moment.min.js"></script>
<script src="template2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="template2/vendor/slick/slick.min.js"></script>
<script src="assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="template2/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="template2/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="template2/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="template2/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>
<!--===============================================================================================-->
<script src="template2/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="assets/js/main.js"></script>

@include('template/footer')
