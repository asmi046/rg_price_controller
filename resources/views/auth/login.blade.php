
@extends('layouts.all')


@section('title', "Вход в систему - Контроль цен")
@section('description', "Вход в систему - Контроль цен конкурентов")

@section('content')

<section class="flex flex-col">
    <div class="shadow-md w-1/4 mx-auto mt-20 bg-white px-9 py-12 rounded-lg">
        <img class="mb-5" src="{{asset("img/logo.svg")}}" alt="">
        <x-login-form></x-login-form>
    </div>

</section>

@endsection
