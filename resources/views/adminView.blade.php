<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard2') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

                    <table style="width: 100%;">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        <tr>
                            <td><img src="/cardImages/{{$cardsTable->tableCard1}}.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/{{$cardsTable->tableCard2}}.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/{{$cardsTable->tableCard3}}.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/{{$cardsTable->tableCard4}}.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/{{$cardsTable->tableCard5}}.jpg" class="w-50 float-left"></td>
                        </tr>
                    </table>
                    <br><br><br>

                    @foreach($users as $user)


                    <table style="width: 50%;">
                        speler: {{$user->name}}
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                            <td><img src="/cardImages/{{$user->card1}}.jpg" class="w-50 float-left"></td>
                            <td><img src="/cardImages/{{$user->card2}}.jpg" class="w-50 float-left"></td>
                        </tr>
                    </table>



                    @endforeach





                </div>
            </div>
        </div>
    </div>

</x-app-layout>
