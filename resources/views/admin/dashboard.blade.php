<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-center text-teal-500 text-3xl font-bold mb-5"> Users Table </h1>


                    @if (session('msg'))
                        <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                            {{ session('msg') }}
                        </div>
                    @endif

                    @if (session('msg_delete'))
                        <div class="bg-red-400 text-green-800 px-4 py-2 mb-4 rounded">
                            {{ session('msg_delete') }}
                        </div>
                    @endif

                    <table class="table-auto w-full">
                        <thead class="bg-gray-200 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-2">SL</th>
                                <th class="px-4 py-2">User Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 1 @endphp
                            @foreach ($users as $item)
                                <tr>
                                    <td class="px-4 py-2">{{ $sl++ }}</td>
                                    <td class="px-4 py-2">{{ $item['name'] }}</td>
                                    <td class="px-4 py-2">{{ $item['email'] }}</td>
                                    <td class="px-4 py-2">
                                        <span
                                            class="px-2 py-1 rounded-full {{ $item['status'] == 1 ? 'bg-green-500 text-white' : 'bg-yellow-500 text-black' }}">
                                            {{ $item['status'] == 1 ? 'Confirm' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="flex justify-center gap-5">

                                            {{-- update --}}
                                            <form action="{{ route('user.status', $item['id']) }}" method="POST"
                                                class="flex items-center space-x-2">
                                                @csrf
                                                <div>
                                                    <div>
                                                        <select name="status" class="bg-black block p-1 px-3">
                                                            <option selected disabled value="">Select One</option>
                                                            <option value="0">Pending</option>
                                                            <option value="1">Confirm</option>
                                                        </select>
                                                    </div>
                                                    <div><button type="submit"
                                                            class="bg-teal-900 rounded rounded-2 p-1 mt-3"> change
                                                            status</button></div>
                                                </div>
                                            </form>

                                            {{-- delete --}}
                                            <a href=" /user/delete/{{ $item['id'] }} "> <button
                                                    class="bg-red-400 py-3 px-2 h-3/6 rounded"> Delete </button> </a>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
