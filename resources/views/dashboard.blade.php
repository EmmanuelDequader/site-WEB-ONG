<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Section pour les utilisateurs -->
            @if(Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">Utilisateurs</h3>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    @if(Auth::user()->role == 'super-admin')
                                        <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        @if(Auth::user()->role == 'super-admin')
                                            <td>
                                                <form action="{{ route('users.update-role', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="role">
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                    <button type="submit">Mettre à jour</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Section pour les projets -->
            @if(Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">Projets</h3>
                        <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un projet</a>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            <a href="{{ route('projects.edit', $project->id) }}">Modifier</a>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Section pour les contenus -->
            @if(Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">Contenus</h3>
                        <a href="{{ route('contents.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un contenu</a>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contents as $content)
                                    <tr>
                                        <td>{{ $content->title }}</td>
                                        <td>{{ $content->description }}</td>
                                        <td>
                                            <a href="{{ route('contents.edit', $content->id) }}">Modifier</a>
                                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Section pour les messages d'alerte -->
            @if(Auth::user()->role == 'super-admin' || Auth::user()->role == 'admin')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg">Messages d'alerte</h3>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alerts as $alert)
                                    <tr>
                                        <td>{{ $alert->message }}</td>
                                        <td>{{ $alert->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>