@extends("layout")

@section("title")
    login
@endsection

@section("content")
    <div id="wrapperlogin">
        <div class="form">
            <img src="/assets/img/brantweerj.png" alt="Brandweer" class="image">
            <form>
                <h1>Log in</h1>
                <input type="email" name="email" placeholder="e-mailadres">
                <input type="password" name="password" placeholder="wachtwoord">
                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
@endsection
