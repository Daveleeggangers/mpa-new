<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Current players') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/currentPlayers" method="POST">
                        @csrf


                        <label>current players</label><br/>
                        @foreach($users as $user)
                            <input type="checkbox" name="id" value="{{$user->id}}"
                                   @if ($user->currentlyPlaying == 1)
                                   checked
                                @endif
                            > {{$user->name}} <br/>
                        @endforeach

                        <br>
                        <x-button class="ml-4">
                            {{ __('submit') }}
                        </x-button>

                    </form>




                </div>
            </div>
        </div>
    </div>

</x-app-layout>
