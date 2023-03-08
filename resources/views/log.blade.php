@extends("layout")

@section("title")
    Log
@endsection

@section("content")
    <div id="logWrapper">
        <div class="content">
            <div class="log">
                <?php
//                for ($i = 0; $i < 4; $i++) {
                foreach ($Reportlog as $opperKey => $item) {
                    ?>
                <div class="melding">
                    <div class="firstrow row">
                        <p class="meldingen"><?= $item->report ?></p>
                        <p class="prio prio<?= $item->prio ?>"><b><?= $item->prio ?></b></p>
                    </div>
                    <div class="secondrow row">
                        <p><?= $item->type ?></p>
                        <p><?= $item->locatie ?></p>
                    </div>
                    <div class="thirdrow row">
                        <p><?= $item->begintime ?></p>
                        <p><?= $item->endTime ?></p>
                    </div>
                    <div class="buttonRow row">
                        <button>&darr;</button>
                    </div>
                    <div class="vehicles">
                            <?php
                            $vehicleJsonDecode = json_decode($item->vehicles, true);
                        foreach ($vehicleJsonDecode as $key => $vehicles) {
                            ?>

                        <div class="vehicle">
                            <h1><?= $key ?></h1>
                                <?php
                            foreach ($vehicles as $person) {
                                ?>
                            <p><?= $person ?></p>
                                <?php
                            }
                                ?>
                            <br>
                        </div>
                            <?php
                        }
                            ?>
                    </div>

                </div>
                <?php } ?>

            </div>


            <div class="search">
                <form method="post" class="searchForm">
                    @csrf
                    <div class="searchPart">
                        <div class="left">
                            <p>Prioriteit</p>
                        </div>
                        <div class="right prio-right">
                            <div class="prio1div">
                                <input type="checkbox" id="prio1" name="prio[]" value="1" checked>
                                <label class="prio1" for="prio1">1</label>
                            </div>
                            <div class="prio2div">
                                <input type="checkbox" id="prio2" name="prio[]" value="2" checked>
                                <label class="prio2" for="prio2">2</label>
                            </div>
                        </div>
                    </div>

                    <div class="searchPart">
                        <div class="left">
                            <p>Voertuigen</p>
                        </div>
                        <div class="right vehicle-right">
                            <?php
                                $i = 0;
                                ?>
                            @foreach ($testing as $vehicle)
                                <?php
                                    $i++;
                                    ?>
                                <input type="checkbox" id="vehicle{{$i}}" name="vehicle[]" value="{{ $vehicle->number }}">
                                <label class="vehicle{{$i}}" for="vehicle{{$i}}">{{ $vehicle->number }}</label>
                            @endforeach
                        </div>
                    </div>

                    <div class="searchPart">
                        <div class="left">
                            <p>Persoon</p>
                        </div>
                        <div class="right person-right">

                            <?php
                            $array = ["x", "jan zoon", "Jan Pieterzoon Coen", "Jan Jansen", "Inter net", "Par IJs", 'Huub', "Cedric Cervelaat"];
                            ?>
                            <input type="text" list="person" placeholder="&#xF002;"/>
                            <datalist id="person">
                                <?php
                                foreach ($array as $name) {
                                    echo "<option>$name</option>";
                                }
                                ?>
                            </datalist>

                        </div>
                    </div>

                    <div class="searchPart">
                        <div class="left">
                            <p>Type<br>melding</p>
                        </div>
                        <div class="right type-right">
                            <?php
                            $meldingen = ["Brand", "Kat uit de boom"];
                            ?>
                            <input type="text" list="melding" placeholder="&#xF002;"/>
                            <datalist id="melding">
                                <?php
                                foreach ($meldingen as $melding) {
                                    echo "<option>$melding</option>";
                                }
                                ?>
                            </datalist>
                        </div>
                    </div>

                    <div class="searchPart">
                        <div class="left">
                            <p>Type<br>Datum</p>
                        </div>
                        <div class="right date-right">
                            <input name="date" type="date">
                        </div>
                    </div>


                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
        </div>
    </div>

@endsection
