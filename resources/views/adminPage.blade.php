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
                        <th scope="col">User Name</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Add admin</th>
                        <th scope="col">remove admin</th>
                    </tr>
                <div class="p-6 bg-white border-b border-gray-200">



                        @foreach($Users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->id}}</td>
                                <td><a href="/addAdmin/{{$user->id}}">Add admin</a></td>
                                <td><a href="/removeAdmin/{{$user->id}}">remove admin</a></td>

                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
