@extends("layout")

@section("title")
    login
@endsection

@section("content")
    <div id="loginScreenWrapper">
        <div class="redblur">
            <div class="login">
                <div class="logo">
                    <img src="assets/img/brantweerj.png" alt="brandweer">
                </div>
                <div class="loginForm">
                    <h1>Log in</h1>
                    <form action="/reports" method="post">
                        @csrf
                        <input type="email" name="email" placeholder="john@doe.com">
                        <input type="password" name="password" placeholder="password">
                        <input type="submit" name="submit" value="Log in">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
