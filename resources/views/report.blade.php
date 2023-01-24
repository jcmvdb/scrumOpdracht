@extends("layout")

@section("title")
    Report
@endsection

@section("content")
    <div id="reportWrapper">
        <div class="heading">
            <img src="/assets/img/brantweerj.png">
        </div>
        <div class="content">
            <div class="basicInformation">
                <form>
                    <input class="report" type="text" name="report" placeholder="melding">
                    <input type="text" name="location" placeholder="locatie">
                    <input type="datetime-local" name="beginDate" placeholder="begintijd">
                    <input type="datetime-local" name="endDate" placeholder="begintijd">
                    <input list="ovd" name="ovd" placeholder="ovd">
                    <datalist id="ovd">
                        <option>ovd 1</option>
                        <option>ovd 2</option>
                        <option>ovd 3</option>
                    </datalist>
                </form>
            </div>
        </div>
    </div>
@endsection
