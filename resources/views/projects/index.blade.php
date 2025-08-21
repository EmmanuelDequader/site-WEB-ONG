<h1>Projets</h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>
                <a href="{{ route('projects.show', $project->id) }}">Voir</a>
                <a href="{{ route('projects.edit', $project->id) }}">Éditer</a>
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

<a href="{{ route('projects.create') }}">Créer un nouveau projet</a>