@extends('layouts.layout')

@section('content')

    {{-- Header-Nav section --}}
    <header>
        @include('partials._navbar')
        <div class="overflow-y-hidden relative z-10 h-[500px]">
            <img src="{{asset('images/home.jpg')}}" alt="home" class="object-cover w-full h-full overflow-hidden">
            <strong class="text-white font-semibold text-center
            absolute top-1/2 md:left-10 flex flex-col left-1/2 -translate-x-1/2
            md:translate-x-0 -translate-y-1/2 md:w-fit w-full">
                <span class="text-4xl sm:text-6xl">Wie zu hause</span>
                <span class="text-xl sm:text-3xl">{{__('By reservation only')}}</span>
            </strong>
        </div>
    </header>

    {{-- Dove Siamo --}}
    <section id="where-section" class="bg-white w-full pt-20 px-10">
        <h2 class="text-yellow-900 font-semibold flex items-center space-x-2
        justify-center text-center">
            <i class="fa-solid fa-circle"></i>
            <p class="text-3xl">{{strtoupper(__('Where we are'))}}</p>
            <i class="fa-solid fa-circle"></i>
        </h2>
        <div class="mt-20 flex flex-col md:flex-row md:justify-between items-center
        md:space-x-10 md:space-y-0 space-y-10 pb-10 md:pb-0">
            <article class="text-yellow-900 text-2xl w-full text-center md:text-left">
                {{__('home.where')}}
            </article>

            {{-- Map display --}}
            <div id="mapid" class="w-full h-80 rounded-lg"></div>
        </div>

        {{-- Images display --}}
        <div class="mt-16 grid md:grid-cols-2 justify-center gap-10">
            <img src="{{asset('images/dove_siamo_1.jpg')}}" alt="pictures of the wild"
            class="w-full rounded-lg">
            <img src="{{asset('images/dove_siamo_2.jpg')}}" alt="pictures of the wild"
            class="w-full rounded-lg">
        </div>
    </section>

     {{-- Chi Siamo --}}
     <section id="who-section" class="bg-white w-full pt-20 px-10">
        <h2 class="text-yellow-900 font-semibold flex items-center space-x-2
        justify-center text-center">
            <i class="fa-solid fa-circle"></i>
            <p class="text-3xl">{{strtoupper(__('Something about us'))}}</p>
            <i class="fa-solid fa-circle"></i>
        </h2>
        <div class="mt-20 flex flex-col md:justify-between items-center
        md:space-y-0 space-y-10 pb-10 md:pb-0 md:flex-row-reverse">
            <article class="text-yellow-900 text-2xl w-full text-center md:text-left md:ml-10">
                {{__('home.about')}}
            </article>

            {{-- Add new image to gallery --}}
            @auth
                <div class="ml-10">
                    <form id="new-image-form" action="/gallery/upload" method="POST" class="text-center"
                    enctype="multipart/form-data">
                        @csrf
                        <input id="new-image" type="file" name="image"
                        onchange="document.getElementById('new-image-form').submit()"
                        class="hidden">
                        <label for="new-image" class="p-2 w-10 h-10 rounded-full bg-yellow-900
                        cursor-pointer flex items-center justify-center">
                            <i class="fa-solid fa-plus text-white text-2xl"></i>
                        </label>
                    </form>
                </div>
            @endauth

            {{-- Image gallery display --}}
            <div class="mt-20 relative gallery-container w-full overflow-hidden justify-center sm:flex
            bg-black h-96 rounded-lg hidden">
                @foreach ($images as $image)
                    @auth
                        <form action="/gallery/remove" method="POST" class="absolute top-5 z-20
                        gallery-img-remove">
                            @csrf
                            <input type="hidden" name="imageName"
                            value="{{$image}}">
                            <button class="flex justify-center items-center p-2 w-10 h-10
                            bg-white rounded-full">
                                <i class="fa-solid fa-xmark cursor-pointer text-yellow-900"></i>
                            </button>
                        </form>
                    @endauth
                    <img src="/images/gallery/{{$image}}" alt="{{basename($image)}}"
                    class="gallery-img w-fit">
                @endforeach
                <div class="w-full flex justify-between items-center absolute top-1/2 -translate-y-1/2
                h-full">
                    <button class="text-5xl font-semibold text-white
                    gallery-arrow-bg h-full w-20 cursor-default">
                        <i id="galleryBack" class="fa-solid fa-circle-chevron-left cursor-pointer"></i>
                    </button>
                    <button class="text-5xl font-semibold text-white
                    gallery-arrow-bg h-full w-20 cursor-default">
                        <i id="galleryForward" class="fa-solid fa-circle-chevron-right cursor-pointer"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Slogan --}}
        <div class="mt-10 md:mt-20 text-center text-yellow-900 text-3xl font-semibold w-full">
            <h2 class="w-full cursor-pointer
            sm:underline sm:underline-offset-4">
                <a onclick="goToSection('#contact-section')">
                    {{__('Possibility to book the venue exclusively!')}}
                </a>
            </h2>
        </div>
    </section>

    {{-- Contatti --}}
    <section id="contact-section" class="bg-white w-full py-20 px-10">
        <h2 class="text-yellow-900 font-semibold flex items-center space-x-2
        justify-center text-center">
            <i class="fa-solid fa-circle"></i>
            <p class="text-3xl">{{strtoupper(__('Contact us'))}}</p>
            <i class="fa-solid fa-circle"></i>
        </h2>
        <div class="grid md:grid-cols-2 gap-10 justify-center mt-10">
            <div class="w-full text-2xl text-yellow-900 font-semibold md:block flex
            justify-center mt-5">
                <div class="text-center w-full">
                    <img src="{{asset('images/alexandra.jpg')}}" alt="Alexandra Herrmann"
                    class="rounded-lg w-full mb-5">
                    <q>{{__('The owner')}} Alexandra Herrmann</q>
                </div>
            </div>
            @livewire('contact-form')
        </div>

        {{-- Images display --}}
        <div class="mt-16 grid md:grid-cols-2 justify-center gap-10">
            <img src="{{asset('images/salone.jpg')}}" alt="sala"
            class="w-full rounded-lg">
            <img src="{{asset('images/veranda.jpg')}}" alt="veranda"
            class="w-full rounded-lg">
        </div>
    </section>

    {{-- Footer section --}}
    @include('partials._footer')

@endsection
