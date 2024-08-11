@extends('layouts.app')
@section('title', 'CuboGame - my-profile')
@section('class', 'my-profile')

@section('content')
<header>
    <a href="{{ url('dashboard') }}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg')}}" alt="Back">
    </a>
    <h1>My Profile</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('menuburguer')
<section>
            <figure class="avatar" >
                <img class="mask" src="{{ asset('images').'/'.Auth::user()->photo }}" alt="Photo">
                <img class="border" src="{{ asset('images/border-photo.svg')}}" alt="border">
            </figure>
            <h2>{{ Auth::user()->fullname }}</h2>
            <span class="email"><b>{{ Auth::user()->email }}</b></span>
            <span class="role">
                <img src="{{ asset('images/ico-role.svg')}}" alt="role">
                <b>{{ Auth::user()->role }}</b>
            </span>
            <div class="grid">
                <span class="data data-phone-number">
                    <img src="{{ asset('images/ico-data-phone-number.svg')}}" alt="Phone Number">
                    <b>{{ Auth::user()->phone }}</b>
                </span>
                <span class="data data-birth-date">
                    <img src="{{ asset('images/data-birth-date.svg')}}" alt="Birth Date">
                    <b>{{ Auth::user()->birthdate }}</b>
                </span>
                <span class="data data-gender">
                    <img src="{{ asset('images/ico-data-gender.svg')}}" alt="Gender">
                    <b>{{ Auth::user()->gender }}</b>
                </span>
            </div>
        </section>
@endsection

@section('js')
<script>
$(document).ready(function () {
            
            $('header').on('click', '.btn-burger', function(){
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
            })
        //----------------------------       
        })
</script>
@endsection