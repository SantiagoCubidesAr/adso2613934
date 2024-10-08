@extends('layouts.app')
@section('title', 'GameApp - Create Game')
@section('class', 'my-profile')
@section('content')
    <header>
        <a href="{{ url('games') }}" class="btn-back">
            <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
        </a>
        <h1>Add Game</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburguer')
    <section class="scroll">
        <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <img id="upload" class="mask" src="{{ asset('images/upload-photo.svg') }}" alt="">
                <img class="border" src="{{ asset('images/border-photo.svg') }}" alt="">
                <input id="photo" type="file" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label>
                    Title:
                </label>
                <input type="text" value="{{ old('title') }}" name="title" placeholder="God of war"">
            </div>
            <div class="form-group">
                <label>
                    Developer:
                </label>
                <input type="text" value="{{ old('developer') }}" name="developer" placeholder="312494564">
            </div>
            <div class="form-group">
                <label>
                    Releasedate:
                </label>
                <input type="date" value="{{ old('releasedate') }}" name="releasedate" placeholder="312494564">
            </div>
            <div class="form-group">
                <label>
                    Category:
                </label>
                <select name="category_id" value="{{ old('category_id') }}">
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}" @if (old('category_id') == $cat->id) selected @endif>
                            {{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>
                    Price:
                </label>
                <input type="number" value="{{ old('price') }}" name="price" placeholder="648454 ">
            </div>
            <div class="form-group">
                <label>
                    Genre:
                </label>
                <input type="text" value="{{ old('genre') }}" name="genre" placeholder="648454 ">
            </div>
            <div class="form-group">
                <label>
                    Slider:
                </label>
                <select name="slider">
                    <option value="">Select...</option>
                    <option value="0" @if (old('slider') == 1) selected @endif>Inactive</option>
                    <option value="1" @if (old('slider') == 0) selected @endif>Active</option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Description:
                </label>
                <textarea name="description" value="{{ old('description') }}" placeholder="lorem ipsum"></textarea>
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
