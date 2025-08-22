<h1>Créer un nouveau contenu</h1>

<form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Titre</label>
    <input type="text" id="title" name="title">
    <label for="body">Corps</label>
    <textarea id="body" name="body"></textarea>
    <label for="type">Type</label>
    <select id="type" name="type">
        <option value="article">Article</option>
        <option value="video">Vidéo</option>
    </select>
    <label for="media">Médias</label>
    <input type="file" id="media" name="media[]" multiple>
    <button type="submit">Créer</button>
</form>