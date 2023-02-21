@extends("layout")

@section("title")
    Personeel
@endsection

@section("content")
    <h1>Personeel</h1>
    @if(session("status"))
        <div>
            {{ session("status") }}
        </div>
    @endif
    <form action="manschappen" id="manschappen" method="post" action="{{url("manschappen")}}">
        @csrf
        <input type="text" name="firstname" id="firstname">
        <input type="text" name="lastname" id="lastname">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
        echo "<pre>";
//            var_dump($users);
    foreach ($users as $item) {
        echo "$item->firstname - $item->lastname <br>";
        ?>
    <form name="updateperson" method="post" action="{{ url('updateperson') }}">
        @csrf
        <input type="hidden" name="user_id" value="<?= $item->formuser_id ?>">
        <label for="firstname"></label>
        <input id="firstname" type="text" name="firstname">
        <label for="lastname"></label>
        <input id="lastname" type="text" name="lastname">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php

    }
        echo "</pre>";
    ?>
@endsection
