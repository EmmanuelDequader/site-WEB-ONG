<h1>Éditer le projet {{ $project->title }}</h1>

<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="{{ $project->title }}">
    <label for="description">Description</label>
    <textarea name="description" id="description">{{ $project->description }}</textarea>
    <button type="submit">Mettre à jour</button>
</form>