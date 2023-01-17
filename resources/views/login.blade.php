@extends("layout")

@section("title")
    login
@endsection

@section("content")
    <div id="wrapperlogin">
    <form>
        <input type="text" name="email" placeholder="e-mailadres">
        <input type="password" name="password" placeholder="wachtwoord">
        <input type="submit" name="submit" value="submit">
    </form>
    </div>
@endsection
