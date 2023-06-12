<form action="{{route("login_do")}}" method="post"  autocomplete="off">

    @csrf

    <x-input-easy type="text" name="email" placeholder="e-mail" ></x-input-easy>
    <x-input-easy type="password" name="password" placeholder="Пароль" ></x-input-easy>

    @error('email')
        <p class="form_error">{{$message}}</p>
    @enderror

    <x-submit-btn></x-submit-btn>
</form>
