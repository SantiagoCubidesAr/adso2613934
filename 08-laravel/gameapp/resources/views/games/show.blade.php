@extends('layouts.app')
@section('title', 'GameApp - Show Game')
@section('class', 'my-profile')
@section('content')
    <header>
        <a href="{{ url('games') }}" class="btn-back">
            <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
        </a>
        <h1>Show Category</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburguer')
    <section>
        <figure class="avatar">
            <img class="mask" src="{{ asset('images') . '/' . $game->image }}" alt="Photo">
            <img class="border" src="{{ asset('images/border-photo.svg') }}" alt="border">
        </figure>
        <h2>{{ $game->title }}</h2>
        <div class="grid">
            <span>
                <b>{{ $game->releasedate }}</b>
            </span>
            <span>
                <b>{{ $game->developer }}</b>
            </span>
            <span>
                <b>{{ $game->price }}</b>
            </span>
            <span>
                <b>{{ $game->genre }}</b>
            </span>
            <span class="data data-slider">
                <b>
                    @if ($game->slider == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </b>
            </span>
            <span>
                <b>{{ $game->description }}</b>
            </span>
        </div>
    </section>
@endsection
@section('js')
    <script src="js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
            //----------------------------       
        })
    </script>
@endsection
