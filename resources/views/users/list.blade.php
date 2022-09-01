<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 py-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr data-id={{ $user->id }}>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->surname ?? '-' }}</td>
                                <td>{{ $user->phone_number ?? '-' }}</td>
                                <td>
                                    <button class="bt btn-danger btn-sm remove" data="{{ $user->id }}">
                                        X
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    @section('javascript')
        const deleteUrl = "{{ url('users') }}/"
    @endsection
    @section('js-files')
        <script src="{{ asset('js/deleteUser.js') }}"></script>
    @endsection
</x-app-layout>
