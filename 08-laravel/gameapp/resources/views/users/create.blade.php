@extends('layouts.app')
@section('title', 'GameApp - Create User')
@section('class', 'my-profile')
@section('content')
    <header>
        <a href="{{ url('users') }}" class="btn-back">
            <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
        </a>
        <h1>Add User</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburguer')
    <section class="scroll">
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <img id="upload" class="mask" src="{{ asset('images/upload-photo.svg') }}" alt="">
                <img class="border" src="{{ asset('images/border-photo.svg') }}" alt="">
                <input id="photo" type="file" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <label>
                    Document:
                </label>
                <input type="number" name="document" placeholder="648454 ">
            </div>
            <div class="form-group">
                <label>
                    Fullname:
                </label>
                <input type="text" name="fullname" placeholder="Alfonso">
            </div>
            <div class="form-group">
                <label>
                    Gender:
                </label>
                <input type="text" name="gender" placeholder="Masculino" value="{{ old('gender') }}">
            </div>
            <div class="form-group">
                <label>
                    Email:
                </label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="gmail@gmail.com">
            </div>
            <div class="form-group">
                <label>
                    Phone Number:
                </label>
                <input type="number" value="{{ old('phone') }}" name="phone" placeholder="312494564">
            </div>
            <div class="form-group">
                <label>
                    Birth Date:
                </label>
                <input type="date" value="{{ old('birthdate') }}" name="birthdate" placeholder="1978-12-10">
            </div>
            <div class="form-group">
                <label>
                    Password:
                </label>
                <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="">
                <input type="password" name="password" placeholder="dontmesswithmydog">
            </div>
            <div class="form-group">
                <label>
                    Confirm Password:
                </label>
                <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="">
                <input type="password" name="password_confirmation" placeholder="dontmesswithmydog">
            </div>
            <div class="form-group">
                <button type="submit">
                    <img src="{{ asset('images/content-btn-add.svg') }}" alt="Login">
                </button>
            </div>
        </form>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })

            $togglePass = false
            $('section').on('click', '.ico-eye', function() {
                !$togglePass ? $(this).next().attr('type', 'text') :
                    $(this).next().attr('type', 'password') !$togglePass ? $(this).attr('src',
                        'images/ico-eye-hidden.svg') :
                    $(this).attr('src', 'images/ico-eye.svg')
                $togglePass = !$togglePass
            })

            $('.border').click(function(e) {
                $('#photo').click()
            })
            $('#photo').change(function(e) {
                e.preventDefault()
                let reader = new FileReader()
                reader.onload = function(evt) {
                    $('#upload').attr('src', event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })

        })
    </script>
    @if (count($errors->all()) > 0)
        @php $error = '' @endphp
        @foreach ($errors->all() as $message)
            @php $error .= '<li>' . $message . '</li>' @endphp
        @endforeach
        <script>
            $(document).ready(function() {
                Swal.fire({
                    position: "top",
                    title: "Error!",
                    html: `@php echo $error @endphp`,
                    icon: "error",
                    toast: true,
                    showConfirmButton: false,
                    timer: 5000,
                })
            })
        </script>
    @endif
@endsection
