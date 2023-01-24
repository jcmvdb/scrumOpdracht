@extends("layout")

@section("title")
    reports
@endsection

@section("content")
    {{--<pre>--}}
    <?php
    foreach ($report as $item) {
        $array = json_decode($item->vehicles, true);
//        var_dump($array);
        foreach ($array as $item2) {
            echo $item2['vehicle'] . "<br>";
//            var_dump($item2);
            foreach ($item2['people'] as $item3) {
                echo $item3 . "<br>";
            }
            echo "<br>";
        }

        echo "<br>";
    }
    ?>
    {{--</pre>--}}

@endsection
