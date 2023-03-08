@extends("layout")

@section("title")
    login
@endsection

@section("content")
    <div id="loginScreenWrapper">
        <div class="redblur">
            <div class="login">
                <div class="logo">
                    <img src="assets/img/loginLogo.png" alt="brandweer">
                </div>
                <div class="loginForm">
                    <h1>Log in</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input id="email" type="email" name="email" required placeholder="john@doe.com">
                        <x-input-error :messages="$errors->get('email')" class="text-black-500" />
                        <input id="password" type="password" name="password" required placeholder="password">
                        <input type="submit" name="submit" value="Log in">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
