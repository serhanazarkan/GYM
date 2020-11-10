@extends("site.index")

@section('content')


    <div class="owl-carousel owl-theme">
        <img class="owl-lazy" data-src="https://www.ozyegin.edu.tr/sites/default/files/upload/spormerkezi/fitness.jpg" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x650&text=2" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x250&text=4" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x250&text=5" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x250&text=6" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x250&text=7" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x250&text=8" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x400&text=9" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x400&text=10" alt="">
        <img class="owl-lazy" data-src="https://placehold.it/350x450&text=11" alt="">
    </div>

@endsection

@section('custom-scripts')
    <script src="{{ asset('assets/library/OwlCarousel2-2.3.4/js/owl.lazyload.js') }}"></script>
    <script src="{{ asset('assets/scripts/home.js') }}" type="text/javascript"></script>

@endsection
