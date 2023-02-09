@extends("layout")


<?php

$meld = [
    "1" => [
        "melding" => "P 1 BON-03 BR WONING (SCHOORSTEEN) PLUTOLAAN HARDENBERG 042330 042350 042360",
        "prio" => "1",
        "type" => "brand",
        "Locatie" => "Plutolaan Hardenberg"
    ],
    "2" => [
        "melding" => "	P 2 BON-06 BR NACONTROLE N34 34,9 HARDENBERG 042330",
        "prio" => "1",
        "type" => "brand",
        "Locatie" => "NACONTROLE"
    ],
    "3" => [
        "melding" => "P 2 BON-06 ASSISTENTIE AMBULANCE (TIL ASSISTENTIE) NACONTROLE HARDENBERG 042330",
        "prio" => "1",
        "type" => "Dier",
        "Locatie" => "NACONTROLE"
    ],
    "4" => [
        "melding" => "	P 1 BON-01 BR GEZONDHEIDSZORG STICHTING AMBIQ COEVORDERWEG SLAGHAREN 042338 042360",
        "prio" => "2",
        "type" => "brand",
        "Locatie" => "SLAGHAREN"
    ]
]

?>


@section("title")
    Log
@endsection

@section("content")
    <div id="logWrapper">
        <div class="heading">
            <div class="left-side">
                <img src="/assets/img/logo.png" alt="Brandweer logo">
                <a href="#">Dashboard</a>
                <a href="#">Manschappen</a>
                <a href="#">Wagen</a>
            </div>
            <div class="right-side">
                <a href="#">Maak melding +</a>
            </div>
        </div>

        <div class="content">
            <div class="log">
                <?php
//                for ($i = 0; $i < 4; $i++) {
                foreach ($meld as $item) {
                if ($item["prio"] == "2") {
                    ?>
                <div class="melding">
                    <div class="firstrow row">
                        <p class="meldingen"><?= $item["melding"] ?></p>
                        <p class="prio prio<?= $item["prio"] ?>"><?= $item["prio"] ?></p>
                    </div>
                    <div class="secondrow row">
                        <p><?= $item["type"] ?></p>
                        <p><?= $item["Locatie"] ?></p>
                    </div>
                    <div class="thirdrow row">
                        <p>BeginTijd</p>
                        <p>EindTijd</p>
                    </div>
                    <div class="buttonRow row">
                        <button>&darr;</button>
                    </div>

                </div>
                <?php }
                } ?>
            </div>


            <div class="search">
                <form method="get" class="searchForm">
                    <div class="searchPart">
                        <div class="left">
                            <p>Prioriteit</p>
                        </div>
                        <div class="right prio-right">
                            <div class="prio1div">
                                <input type="checkbox" id="prio1" name="prio" value="1" checked>
                                <label class="prio1" for="prio1">1</label>
                            </div>
                            <div class="prio2div">
                                <input type="checkbox" id="prio2" name="prio" value="2" checked>
                                <label class="prio2" for="prio2">2</label>
                            </div>
                        </div>
                    </div>

                    <div class="searchPart">
                        <div class="left">
                            <p>Voertuigen</p>
                        </div>
                        <div class="right vehicle-right">
                            <input type="checkbox" id="vehicle1" name="2350" value="2350">
                            <label class="vehicle1" for="vehicle1">2330</label>

                            <input type="checkbox" id="vehicle2" name="2360" value="2360">
                            <label class="vehicle2" for="vehicle2">2350</label>

                            <input type="checkbox" id="vehicle3" name="2370" value="2370">
                            <label class="vehicle3" for="vehicle3">2381</label>

                            <input type="checkbox" id="vehicle4" name="2380" value="2380">
                            <label class="vehicle4" for="vehicle4">2340</label>

                            <input type="checkbox" id="vehicle5" name="2390" value="2390">
                            <label class="vehicle5" for="vehicle5">2360</label>

                            <input type="checkbox" id="vehicle6" name="2400" value="2400">
                            <label class="vehicle6" for="vehicle6">2305</label>

                            <input type="checkbox" id="overig" name="overig" value="overig">
                            <label class="overig" for="overig">overig</label>
                        </div>
                    </div>

                    <div class="searchPart">
                        <div class="left">
                            <p>Persoon</p>
                        </div>
                        <div class="right person-right">

                            <?php
                            $array = ["henk", "jan zoon", "Jan Pieterzoon Coen", "Jan Jansen", "Inter net", "Par IJs", 'Huub', "Cedric Cervelaat"];
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
                            <input type="date">
                        </div>
                    </div>


                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
        </div>
    </div>

@endsection
