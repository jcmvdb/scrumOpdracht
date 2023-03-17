@extends("layout")

@section("title")
    Manscappen
@endsection

@section("content")
    <div id="usersWrapper">
        <div class="status">
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
        </div>
        <div class="content">
            <div class="left">
                <div class="users">
                    <form method="post" action="{{ url("manschappen") }}">
                        @csrf
                        <input type="hidden" value="{{ $order }}" name="order">
                        <input type="submit" value="submit" name="submit">
                    </form>
                    <?php $i = 0; ?>
                    @foreach ($users as $user)
                            <?php $i++; ?>
                        <div class="user">
                            <p> {{ $user->firstname }} {{ $user->lastname }}</p>
                            <span style="font-size:30px;cursor:pointer" onclick="openNav2({{$user->formuser_id}})"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></span>

                            <div id="myNav{{ $user->formuser_id }}" class="overlay hide"
                                 onclick="closeNav2({{ $user->formuser_id }}">
                                <div class="editor">
                                    <a href="javascript:void(0)" class="closebtn"
                                       onclick="closeNav2({{ $user->formuser_id }})">&times;</a>
                                    <div class="overlay-content">
                                        <p>Persoon {{ $user->firstname }} {{ $user->lastname }}</p>
                                        <div class="udpateform">
                                            <form name="updateperson" method="post" action="{{ url('updateperson') }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value=" {{ $user->formuser_id }}">
                                                <label for="firstname"></label>
                                                <input id="firstname" type="text" name="firstname"
                                                       value="{{$user->firstname}}" placeholder="Voornaam">
                                                <label for="lastname"></label>
                                                <input id="lastname" type="text" name="lastname"
                                                       value="{{$user->lastname}}" placeholder="Achternaam">
                                                <input type="submit" value="submit" name="submit">
                                            </form>
                                        </div>
                                        <div class="deleteForm">
                                            <form class="deleteperson" name="deleteperson" method="post"
                                                  action="{{ url("deleteperson") }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->formuser_id }}">
                                                <input type="submit" value="delete" name="submit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="right">
                <h3>Manschap toevoegen</h3>
                <form id="PersoonToevoegen" method="post" action="{{url("persoontoevoegen")}}">
                    @csrf

                    <input type="text" name="firstname" id="firstname" placeholder="voornaam" autocomplete="off" value="@if(session('firstname')){{ session('firstname') }}@endif">
                    <input type="text" name="lastname" id="lastname" placeholder="achternaam" autocomplete="off" value="@if(session('lastname')){{ session('lastname') }}@endif">
                    <button type="submit" class="btn btn-primary">Toevoegen aan de lijst +</button>
                </form>
            </div>
        </div>
    </div>
@endsection
