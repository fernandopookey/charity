    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="{{ Storage::url($about->logo ?? '') }}"
                                        style="width: 20px; height: 20px; object-fit: cover" alt="">
                                </a>
                            </div>
                            <p class="address_text">{{ $about->description }}</p>
                            <div class="socail_links">
                                <ul>
                                    @foreach ($mediaSocials as $mediaSocial)
                                        <li>
                                            <a href="{{ $mediaSocial->link }}" target="_blank" style="cursor: pointer;">
                                                <img src="{{ Storage::url($mediaSocial->icon ?? '') }}"
                                                    style="width: 20px; height: 20px; object-fit: cover" alt="">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Services
                            </h3>
                            <ul class="links">
                                <li><a href="#">Donasi</a></li>
                                {{-- <li><a href="#">Sponsor</a></li> --}}
                                {{-- <li><a href="#">Fundraise</a></li> --}}
                                <li><a href="#">Sukarelawan</a></li>
                                {{-- <li><a href="#">Partner</a></li> --}}
                                {{-- <li><a href="#">Jobs</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Kontak
                            </h3>
                            <div class="contacts">
                                <p>{{ $about->phone }} <br>
                                    {{ $about->email }} <br>
                                    {{ $about->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Top News
                            </h3>
                            <ul class="news_links">
                                <li>
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ asset('charifit-master/img/news/news_1.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="#">
                                            <h4>School for African
                                                Childrens</h4>
                                        </a>
                                        <span>Jun 12, 2019</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ asset('charifit-master/img/news/news_2.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="#">
                                            <h4>School for African
                                                Childrens</h4>
                                        </a>
                                        <span>Jun 12, 2019</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="bordered_1px "></div>
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}
    </footer>
    <!-- footer_end  -->

    <!-- link that opens popup -->

    <!-- JS here -->
    <script src="{{ asset('charifit-master/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/popper.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/ajax-form.js') }}"></script>
    <script src="{{ asset('charifit-master/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/scrollIt.js') }}"></script>
    <script src="{{ asset('charifit-master/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/wow.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/plugins.js') }}"></script>
    <script src="{{ asset('charifit-master/js/gijgo.min.js') }}"></script>
    <!--contact js-->
    <script src="{{ asset('charifit-master/js/contact.js') }}"></script>
    <script src="{{ asset('charifit-master/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/jquery.form.js') }}"></script>
    <script src="{{ asset('charifit-master/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('charifit-master/js/mail-script.js') }}"></script>

    <script src="{{ asset('charifit-master/js/main.js') }}"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



    {{-- Custom --}}

    {{-- Rupiah Format --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            var initialGoalValue = $('#rupiah').val();
            $('#rupiah').val(formatRupiah(initialGoalValue, 'Rp'));

            $('#rupiah').on('keyup', function() {
                $(this).val(formatRupiah($(this).val(), 'Rp'));
            });

            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const galleryImages = document.querySelectorAll('.gallery-image');
            const modalImage = document.getElementById('modalImage');

            galleryImages.forEach(image => {
                image.addEventListener('click', function() {
                    const imgSrc = this.getAttribute('data-bs-image');
                    modalImage.setAttribute('src', imgSrc);
                });
            });
        });
    </script>



    </body>

    </html>
