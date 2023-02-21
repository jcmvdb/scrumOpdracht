@extends("layout")

@section("title")
    Voertuigen
@endsection

@section("content")
    <h1>Vehicle</h1>
    @if(session("status"))
        <div>
            {{ session("status") }}
        </div>
    @endif
    <form action="voertuigen" id="voertuigen" method="post" action="{{url("voertuigen")}}">
        @csrf
        <input type="number" name="number" id="number" required placeholder="voertuig nummer">
        <input type="text" name="type" id="type" required placeholder="Type wagen">
        <input type="number" name="passengers" id="passengers" required placeholder="aantal zitplekken">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    echo "<pre>";
    foreach ($vehicles as $item) {
        echo "<p>$item->number - $item->type - $item->passengers</p>";
    }
    echo "</pre>";
    ?>
@endsection
