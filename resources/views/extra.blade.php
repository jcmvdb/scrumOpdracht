@extends("layout")

@section("title")
    dashboard
@endsection


@section("content")
    {{--  list with all the people  --}}
    <datalist id="person">
        @foreach($users as $user)
            <option value="">{{ $user->firstname }} - {{ $user->lastname }}</option>
        @endforeach
        //
    </datalist>

    <div id="wrapper" class="text-center">
        <div class="">
            @if(session('status'))
                <div class="confirm">
                    {{ session('status') }}
                </div>
            @endif
            @if(session("error"))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif
            <form name="dashboard" id="dashboard" method="post" action="{{url('dashboard')}}">
                @csrf
                <div class="firstrow row">
                    <div class="left">
                        <div class="basicInformation">
                            <div class="inputRow">
                                <input type="text" name="report" placeholder="Melding">
                            </div>

                            <div class="inputRow">
                                <input type="text" name="locatie" placeholder="Adres"
                                       value="@if(session('locatie')){{session('locatie')}}@endif">
                            </div>

                            <div class="inputRow">
                                <div class="twoInput">
                                    <label class="leftlabel">Begintijd</label>
                                    <input class="leftinput" type="datetime-local" name="begintime"
                                           placeholder="Begintijd">
                                </div>
                                <div class="twoInput">
                                    <label class="rightlabel" for="">Eindtijd</label>
                                    <input class="rightinput" type="datetime-local" name="endtime"
                                           placeholder="eindtijd">
                                </div>
                            </div>

                            <div class="inputRow">
                                <input type="text" list="person" name="ovd" placeholder="OVD"/>
                            </div>

                            <div class="inputRow">
                                <div class="twoInput">
                                    <input class="leftinput" type="text" name="type"
                                           placeholder="Soort Melding">
                                </div>
                                <div class="twoInput">
                                    <div class="prioChoose rightinput">
                                        <div class="name">
                                            <p>Prioriteit</p>
                                        </div>
                                        <div class="choose">
                                            <input type="radio" name="prio" value="1">
                                            <label>1</label>
                                        </div>
                                        <div class="choose">
                                            <input type="radio" name="prio" value="2">
                                            <label>2</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="vehicles">

                            <?php
                            /**
                             * Makes the input fields for the vehicles on the amount of people that fit in it (data comes from database)
                             */

                            foreach ($vehicles as $item) {
                                ?>
                            <div class="vehicle vehicle-2330 hide" id="vehicle-<?= $item->number ?>">
                                <div class="head"><?= $item->number ?></div>
                                <div class="input">
                                    @for ($i = 1; $i <= $item->passengers; $i++)
                                        <input type="text" list="person" placeholder="Manschappen"
                                               name="inputField<?= $item->number . '_' . $i;?>"
                                               class="<?= $item->number . '_' . $i;?>">
                                    @endfor
                                </div>
                            </div>
                                <?php

                            }
                            ?>

                        </div>
                    </div>
                    <div class="right">
                        <div class="vehicleSelect">

                            <?php
                            foreach ($vehicles as $vehcileInput) {
                                ?>
                            <input type="checkbox" id="vehicleInput<?= $vehcileInput->number; ?>" name="checkboxname[]"
                                   value="<?= $vehcileInput->number; ?>">
                            <label onclick="classHide(<?= $vehcileInput->number ?>)"
                                   for="vehicleInput<?= $vehcileInput->number; ?>"><img
                                    src="/assets/img/vehicle/2330.png"
                                    alt=""><?= $vehcileInput->number; ?></label>
                                <?php

                            }
                            ?>

                            <input type="checkbox" id="overig" name="overig" value="overig">
                            <label class="overig" for="overig">overig</label>

                        </div>
                        <div class="comments">
                            <h3>Opmerkingen</h3>
                            <textarea name="comments" placeholder="Vul hier opmerkingen in..."></textarea>

                        </div>
                        <div class="extraPeople">
                            <a href="javascript:void(0);" class="add_button" title="Add field">+</a>
                            <div class="field_wrapper">
                            </div>
                        </div>
                        <div class="submitField">
                            <button type="submit" class="btn btn-primary">Vezend ></button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
@endsection
