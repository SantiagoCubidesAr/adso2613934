@extends('layouts.app')
@section('title', 'GameApp - Games Module')
@section('class', 'users')

@section('content')
<header>
  <a class="btn-back" href="{{ url('dashboard') }}">
    <img src="{{ asset('images/btn-back.svg') }}" alt="Back" />
  </a>
  <h1>Games</h1>
  <svg class="btn-burger" viewBox="0 0 100 100" width="80">
    <path
      class="line top"
      d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
    <path class="line middle" d="m 70,50 h -40" />
    <path
      class="line bottom"
      d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
  </svg>
</header>
@include('menuburguer')
<section>
  <div class="area">
    <a class="add" href="{{ url('games/create') }}">
      <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add" />
    </a>
    <div>
      <a href="{{ url('export/games/pdf') }}">
        <img src="{{ asset('images/btn-export-pdf.svg') }}" alt="PDF">
      </a>
      <input type="text" placeholder="Search..." name="qsearch" id="qsearch">
      <a href="{{ url('export/games/excel') }}">
        <img src="{{ asset('images/btn-export-excel.svg') }}" alt="Excel">
      </a>
    </div>
    <div id="list">
      @foreach($games as $game)
      <article class="record">
        <figure class="avatar">
          <img class="mask" src="{{ asset('images'). '/' . $game->image }}" alt="Photo" />
          <img
            class="border"
            src="{{ asset('images/border-small.svg') }}"
            alt="Border" />
        </figure>
        <aside>
          <h3>{{$game->title}}</h3>
          <h4>{{$game->category->name}}</h4>
        </aside>
        <figure class="actions">
          <a href="{{ url('games/' . $game->id) }}">
            <img src="{{ asset('images/ico-search.svg') }}" alt="Show" />
          </a>
          <a href="{{ url('games/' . $game->id . '/edit') }}">
            <img src="{{ asset('images/ico-edit.svg') }}" alt="Edit" />
          </a>
          <a href="javascript:;" class="delete" data-title="{{ $game->title }}">
            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete" />
          </a>
          <form action="{{ url('games/' . $game->id) }}" method="post" style="display: none">
            @csrf
            @method('delete')
          </form>
        </figure>
      </article>
      @endforeach
    </div>
  </div>
</section>
<script src="../js/jquery-3.7.1.min.js"></script>
<script>
  $(document).ready(function() {
    // - - - - - - - - - - - - - - -
    $("header").on("click", ".btn-burger", function() {
      $(this).toggleClass("active");
      $(".nav").toggleClass("active");
    });
    // - - - - - - - - - - - - - - -
  });

  $('figure').on('click', '.delete', function() {
    $title = $(this).attr('data-title')

    Swal.fire({
      title: "Are you sure?",
      text: "Desea eliminar a:" + $title,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        $(this).next().submit()
      }
    });
  })

  $('body').on('keyup', '#qsearch', function(e) {
    e.preventDefault()
    $query = $(this).val()
    $token = $('input[name=_token]').val()
    $model = 'games'

    $.post($model + '/search', {
        q: $query,
        _token: $token
      },
      function(data) {
        $('#list').html(data)
      }
    )
  })
</script>
@endsection