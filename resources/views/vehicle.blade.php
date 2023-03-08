@extends("layout")

@section("title")
    Voertuigen
@endsection

@section("content")
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
    <div class="vehicleWrapper">
        <div class="left">
            <table>
                <thead>
                <tr>
                    <th>Wagennummer</th>
                    <th>type wagen</th>
                    <th>zitplekken</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->number }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>{{ $vehicle->passengers }}</td>
                        <td class="edit"><span style="font-size:30px;cursor:pointer"
                                               onclick="openNav2({{ $vehicle->number }})"><i class="fa fa-pencil"
                                                                                             aria-hidden="true"></i></span>
                        </td>
                    </tr>



                    <div id="myNav{{ $vehicle->number }}" class="overlay hide"
                         onclick="closeNav2({{ $vehicle->number }}">
                        <div class="editor">
                            <a href="javascript:void(0)" class="closebtn"
                               onclick="closeNav2({{ $vehicle->number }})">&times;</a>
                            <div class="overlay-content">
                                <p>Voertuig nummer: {{ $vehicle->number }}</p>
                                <p>Type: {{ $vehicle->type }}</p>
                                <p>Aantal passagiers: {{ $vehicle->passengers }}</p>
                                <div class="udpateform">
                                    <form action="{{ url("voertuigupdaten") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->vehicle_id }}">
                                        <input type="number" value="{{ $vehicle->number }}" id="number"
                                               placeholder="voertuignummer" name="number" autocomplete="off">
                                        <input type="text" value="{{ $vehicle->type }}" name="type" id="type"
                                               autocomplete="off" placeholder="voertuig type">
                                        <input type="number" value="{{ $vehicle->passengers }}" id="passengers"
                                               name="passengers" autocomplete="off" placeholder="aantal zitplekken">
                                        <button type="submit">Voertuig updaten</button>
                                    </form>
                                </div>
                                <div class="deleteForm">
                                    <form action="{{ url("voertuigverwijderen") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->vehicle_id }}">
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="right">
            <h3>Voertuig toevoegen</h3>
            <form id="voertuigToevogen" method="post" action="{{url("voertuigtoevoegen")}}">
                @csrf
                <input type="number" id="number" placeholder="voertuignummer" name="number" autocomplete="off">
                <input type="text" name="type" id="type" autocomplete="off" placeholder="voertuig type">
                <input type="number" id="passengers" name="passengers" autocomplete="off"
                       placeholder="aantal zitplekken">
                <button type="submit" class="btn btn-primary">Toevoegen aan de lijst +</button>
            </form>
        </div>

    </div>
@endsection
