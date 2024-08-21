@extends('layouts.app')
@section('title', 'GameApp - Ctaegories Module')
@section('class', 'users')

@section('content')
<header>
        <a class="btn-back" href="{{ url('dashboard') }}">
          <img src="{{ asset('images/btn-back.svg') }}" alt="Back" />
        </a>
        <h1>Categories</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
          <path
            class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20"
          />
          <path class="line middle" d="m 70,50 h -40" />
          <path
            class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20"
          />
        </svg>
      </header>
@include('menuburguer')
<section>
        <div class="area">
          <a class="add" href="{{ url('categories/create') }}">
            <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add" />
          </a>
          @foreach($categories as $category)
          <article class="record">
            <figure class="avatar">
              <img class="mask" src="{{ asset('images/img-categories.png') }}" alt="Photo" />
              <img
                class="border"
                src="{{ asset('images/border-small.svg') }}"
                alt="Border"
              />
            </figure>
            <aside>
              <h3>{{$category->name}}</h3>
              
            </aside>
            <figure class="actions">
              <a href="search.html">
                <img src="{{ asset('images/ico-search.svg') }}" alt="Show" />
              </a>
              <a href="edit.html">
                <img src="{{ asset('images/ico-edit.svg') }}" alt="Edit" />
              </a>
              <a href="javascript:;">
                <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete" />
              </a>
            </figure>
          </article>
          @endforeach
        </div>
      </section>
      <script src="../js/jquery-3.7.1.min.js"></script>
    <script>
      $(document).ready(function () {
        // - - - - - - - - - - - - - - -
        $("header").on("click", ".btn-burger", function () {
          $(this).toggleClass("active");
          $(".nav").toggleClass("active");
        });
        // - - - - - - - - - - - - - - -
      });
    </script>
@endsection