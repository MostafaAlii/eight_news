<!-- Start scroll up -->
<div id="scroll-up">
    <button id="scroll-btn" class="secondary-color" style="display: inline;">
        <i class="fa fa-angle-up"></i>
    </button>
</div>
<!-- End scroll up -->
<!-- Scripts -->
<!-- jquery  -->
<script src="{{ URL::asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>

<!-- bootstrap  -->
<script src="{{ URL::asset('assets/frontend/js/bootstrap.min.js') }}"></script>

<!-- fontawesome  -->
<script src="{{ URL::asset('assets/frontend/js/all.min.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>

<!-- DarkMode script -->
<script src="{{ URL::asset('assets/frontend/js/darken.js') }}"></script>

<!-- My script -->
<script src="{{ URL::asset('assets/frontend/js/script.js') }}"></script>
@yield('js')
</body>

</html>