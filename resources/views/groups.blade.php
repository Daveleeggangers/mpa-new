<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table style="width: 50%;">
                    <tr>
                        <th scope="col" class="w-50 float-left">groepnaam</th>
                        <th scope="col" class="w-50 float-right">uitnodiging versturen</th>


                    </tr>
                    <div class="p-6 bg-white border-b border-gray-200">


                        @foreach($roles as $role)
                            <tr>
                                <td class="w-50 float-left">{{$role}}</td>
                                <td class="w-50 float-right"><a href="mailto:?subject=Watchapp invite&amp;body=Zou jij deel willen nemen aan mijn buurtgroep op watchapp? via deze link kan je simpel een account aanmaken! http://watchapp.itenmedia.nl/newUser/{{$role}}" title="Share by Email"> via mail</a></td>
                            </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
