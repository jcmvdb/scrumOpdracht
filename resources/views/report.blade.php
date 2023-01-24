@extends("layout")

@section("title")
    Report
@endsection

@section("content")
    <div id="reportWrapper">
        <div class="heading">
            <img src="/assets/img/brandweerLogo.png">
        </div>
        <div class="content">
            <div class="basicInformation">
                <form>
                    <div class="basicInput">
                        <input type="text" placeholder="Melding" name="report">
                        <input type="text" placeholder="locatie" name="locatie">
                        <div class="basicinput-2">
                            <input type="datetime-local" name="beginTime">
                            <input type="datetime-local" name="endTime">
                        </div>
                        <input type="text" name="ovd" placeholder="ovd">
                        <div class="basicinput-2">
                            <input type="text" placeholder="soort melding">
                            <input type="radio" id="prio1" name="prio1" value="1" checked>
                            <label for="prio1">1</label>
                            <input type="radio" id="prio2" name="prio2" value="2">
                            <label for="prio2">2</label>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
