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
                        <th scope="col">groepnaam</th>
                        <th scope="col">uitnodiging versturen</th>
{{--                        <th scope="col">deelnemers</th>--}}

                    </tr>
                    <div class="p-6 bg-white border-b border-gray-200">


                        @foreach($groups as $group)
                            <tr>
                                <td>{{$group->name}}</td>
                                <td><a href="mailto:?subject=Watchapp invite&amp;body=Zou jij deel willen nemen aan mijn buurtgroep op watchapp? via deze link kan je simpel een account aanmaken! http://watchapp.itenmedia.nl/newUser/{{$group->name}}" title="Share by Email"> via mail</a></td>
{{--                                <td>deelnemers weergeven</td>--}}
                            </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
