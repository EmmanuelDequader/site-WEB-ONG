<h1>Modifier un contenu</h1>

<form action="{{ route('contents.update', $content) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Titre</label>
    <input type="text" id="title" name="title" value="{{ $content->title }}">
    <label for="body">Corps</label>
    <textarea id="body" name="body">{{ $content->body }}</textarea>
    <label for="type">Type</label>
    <select id="type" name="type">
        <option value="article" {{ $content->type === 'article' ? 'selected' : '' }}>Article</option>
        <option value="video" {{ $content->type === 'video' ? 'selected' : '' }}>Vidéo</option>
    </select>
    <label for="media">Médias</label>
    <input type="file" id="media" name="media[]" multiple>
    @if($content->media->count() > 0)
        <div>
            @foreach($content->media as $media)
                @if($media->type === 'image')
                    <img src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" alt="Image" width="100">
                @elseif($media->type === 'video')
                    <video width="100" controls>
                        <source src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" type="video/mp4">
                    </video>
                @endif
            @endforeach
        </div>
    @endif
    <button type="submit">Mettre à jour</button>
</form>