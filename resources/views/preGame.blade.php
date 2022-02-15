<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('hier zijn je kaarten, we zijn in de pre-game betting:') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @role('admin')
                <div class="p-6 bg-white border-b border-gray-200">
                    <table style="width: 100%; margin-left: auto; margin-right: auto; ">
                        <tr>
                            <th scope="col"><a style="font-size: 25px;">currently on: {{$cardsTable->currently_on}}</a></th>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                    <table style="width: 50%; margin-left: auto; margin-right: auto; ">
                        <tr>
                            <th scope="col"><a href="/preGame">preGame</a></th>
                            <th scope="col"><a href="/flop">Flop</a></th>
                            <th scope="col"><a href="/turn">Turn</a></th>
                            <th scope="col"><a href="/river">River</a></th>
                            <th scope="col"><a href="/updateCards">NewGame</a></th>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                @endrole
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Kaarten op "tafel"</h1>
                    <table style="width: 80%; margin-left: auto; margin-right: auto;">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        <tr>
                            <td><img src="/cardImages/TurnedCard.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/TurnedCard.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/TurnedCard.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/TurnedCard.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/TurnedCard.jpg" class="w-50 float-left"></td>
                        </tr>
                    </table>

                    </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Jou kaarten</h1>

                    <table style="width: 70%; margin-left: auto; margin-right: auto;">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        <tr>
                            <td><img src="/cardImages/{{ Auth::user()->card1 }}.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/{{ Auth::user()->card2 }}.jpg" class="w-50 float-left"></td>

                        </tr>
                    </table>

                    <td>
                        Credits:<br>
                        Jij hebt {{$highestBet->credits}} credits<br><br>

                        Inzet:<br>
                        De minimale inzet is momenteel: {{$highestBet->currentBet}}

                        <form action="/betting" method="POST">
                            @csrf
                            Inzet: <input type="text" name="inzet" id="{{Auth::user()->id}}" placeholder="Jou inzet: {{Auth::user()->currentBet}}"><br><br>
                            <x-button class="ml-4 float-left">
                                {{ __('Verzenden') }}
                            </x-button>
                        </form>
                        <form action="/call" method="POST">
                            @csrf
                            Ik wil meegaan met de inzet:
                            <x-button class="ml-4 float-left">
                                {{ __('call') }}
                            </x-button>
                        </form>
                    </td>

                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Spelers</h1><br>
                    <table style="width: 60%; margin-left: auto; margin-right: auto;">

                        <thead>
                            <tr>
                                <th scope="col">naam</th>
                                <th scope="col">credits</th>
                                <th scope="col">inzet</th>
                                @role('admin')
                                <th scope="col">select as winner</th>
                                @endrole
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->name}}</th>
                                <th >{{$user->credits}}</th>
                                <th >{{$user->currentBet}}</th>
                                @role('admin')
                                <th>
                                    <form action="/transferToWinner" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                    <x-button class="ml-4">
                                        {{ __('submit') }}
                                    </x-button>
                                    </form>
                                </th>
                                @endrole
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    import Input from "../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Input";
    export default {
        components: {Input}
    }
</script>
