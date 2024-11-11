@extends('layouts.app')
@section('title', 'CuboGame - Welcome')
@section('class', 'welcome')

@section('content')
<header>
    <img src="{{ asset('images/logo-top.svg')}}" alt="Logo">
</header>
<section class="owl-carousel owl-theme">
    @foreach ($sliders as $slider)
    <img src="{{ asset('images/'. $slider->image)}}" alt="{{ $slider->title}}">
    @endforeach
</section>
<footer>
    <a href="{{ url('catalogue')}}" class="btn btn-explore">
        <img src="{{ asset('images/content-btn-welcome.png')}}" alt="Explore">
    </a>
</footer>
@endsection

@section('js')
<script>
$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsive: {
            0: {
                items: 1
            }
        }
    })
})
</script>
@endsection