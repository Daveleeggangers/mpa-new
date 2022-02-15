<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="/updatingIftttToken">
                        @csrf

                        <x-label for="name" :value="__('vul hier u IFTTT token in')" />
                        <br>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="iftttToken" value="{{auth()->user()->iftttToken}}" required autofocus />
                        <br>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="iftttTrigger" value="{{auth()->user()->iftttTrigger}}" required autofocus />




                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

                    <form method="POST" action="/notificationPage">
                        @csrf
                        <x-button class="ml-4">
                            {{ __('Send notification') }}
                        </x-button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
