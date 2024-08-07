@extends('layouts.app')
@section('title', 'CuboGame - login')
@section('class', 'login')

@section('content')
<header>
    <a href="javascript:;" class="btn-back">
        <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/title-login.svg') }}" alt="">
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path
            class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path
            class="line middle"
            d="m 70,50 h -40" />
        <path
            class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('menuburguer')
<section>
    <form action="{{ route('login')}}" method="post">
        @csrf
        @if(count($errors->all()) > 0)
            @foreach($errors->all() as $message)
                <li>{{$message}}</li>
            @endforeach
        @endif
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-email.svg') }}" alt="">
                Email:
            </label>
            <input type="email" name="email" placeholder="alfonso@gmail.com">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-pass.svg') }}" alt="">
                Password:
            </label>
            <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="">
            <input type="password" name="password" placeholder="dontmesswithmydog">
        </div>
        <div class="form-group">
            <button type="submit">
                <img src="{{ asset('images/content-btn-login.png') }}" alt="Login">
            </button>
            <a href="">Forgot your password</a>
        </div>
    </form>
</section>
@endsection

@section('js')
<script>
        $(document).ready(function () {
            $('header').on('click', '.btn-burger', function () {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })

            $togglePass = false
            $('section').on('click', '.ico-eye', function () {
                !$togglePass ? $(this).next().attr('type', 'text')
                            : $(this).next().attr('type', 'password')
                !$togglePass ? $(this).attr('src', 'images/ico-eye-hidden.svg')
                            : $(this).attr('src', 'images/ico-eye.svg')
                $togglePass = !$togglePass
            })
        })

</script>
@endsection