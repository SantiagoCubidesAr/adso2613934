@extends('layouts.app')
@section('title', 'GameApp - Show User')
@section('class', 'my-profile')
@section('content')
        <header>
            <a href="{{ url('users') }}" class="btn-back">
                <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
            </a>
            <h1>Edit User</h1>
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
        <section class="scroll">
            <form action="{{ url('users/' .$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if(count($errors->all()) > 0)
                @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
                @endif
                <div class="form-group">
                    <img id="upload" class="mask" src="{{ asset('images/' . $user->photo)}}" alt="">
                    <img class="border" src="{{ asset('images/border-photo.svg')}}" alt="">
                    <input id="photo" type="file" name="photo" accept="image/*">
                    <input type="hidden" name="originphoto" value="{{ $user->photo }}">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </div>
                <div class="form-group">
                    <label>
                        Document:
                    </label>
                    <input type="number" name="document" value="{{ old('document', $user->document) }}">
                </div>
                <div class="form-group">
                    <label>
                        Fullname:
                    </label>
                    <input type="text" name="fullname" value="{{ old('document', $user->fullname) }}">
                </div>
                <div class="form-group">
                    <label>
                        Gender:
                    </label>
                    <input type="text" name="gender"  value="{{ old('gender', $user->gender)}}">
                </div>
                <div class="form-group">
                    <label>
                        Email:
                    </label>
                    <input type="email" name="email" value="{{old('email', $user->email)}}">
                </div>
                <div class="form-group">
                    <label>
                        Phone Number:
                    </label>
                    <input type="text" value="{{old('phone', $user->phone)}}" name="phone">
                </div>
                <div class="form-group">
                    <label>
                        Birth Date:
                    </label>
                    <input type="text" value="{{old('birthdate', $user->birthdate)}}" name="birthdate">
                </div>
                <div class="form-group">
                    <button type="submit">
                        <img src="{{ asset('images/content-btn-add.svg')}}" alt="Login">
                    </button>
                </div>
            </form>
        </section>
        @endsection
        @section('js')
    <script src="../js/jquery-3.7.1.min.js"></script>  
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