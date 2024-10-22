    <!-- ======= Footer ======= -->
    {{-- <footer id="footer" class="footer fixed-bottom">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer --> --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('adminpage/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adminpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminpage/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('adminpage/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('adminpage/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('adminpage/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('adminpage/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('adminpage/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('adminpage/assets/js/main.js') }}"></script>

    {{-- Outside Template --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Custom --}}

    {{-- Rupiah Format --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
                return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
            }
        });
    </script>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>



    </body>

    </html>
