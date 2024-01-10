@extends('layouts.layout')

@section('admin')
    <section class="flex justify-center mt-20">
        <div class="flex flex-col text-center w-full">
            <h1 class="text-3xl text-yellow-900 font-semibold">ADMIN LOGIN</h1>
            <form action="/admin/login" method="POST" class="flex flex-col space-y-2 mt-10
            w-full">
                @csrf
                <label for="username" class="text-2xl text-yellow-900">
                    Username
                </label>
                <input id="username" type="text" name="username" class="text-xl py-1 px-2
                rounded-lg border border-yellow-900 w-full" required>
                <label for="username" class="text-2xl text-yellow-900">
                    Password
                </label>
                <input id="password" type="password" name="password" class="text-xl py-1 px-2
                rounded-lg border border-yellow-900 w-full" required>
                <div class="text-center pt-10">
                    <button class="px-4 py-2 bg-yellow-900 text-white border-2 border-white
                    font-semibold text-xl rounded-lg w-40 hover:border-yellow-300 
                    hover:text-yellow-300 ease-in duration-300">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection