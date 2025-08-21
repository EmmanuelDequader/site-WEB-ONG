<h1>Créer un nouveau projet</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <label for="title">Titre</label>
    <input type="text" name="title" id="title">
    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>
    <button type="submit">Créer</button>
</form>