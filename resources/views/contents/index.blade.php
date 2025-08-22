<h1>Contenus</h1>

<ul>
    @foreach($contents as $content)
        <li>
            @if($content->media->count() > 0)
                @foreach($content->media as $media)
                    @if($media->type === 'image')
                        <img src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" alt="Image" width="50">
                    @elseif($media->type === 'video')
                        <video width="50" controls>
                            <source src="{{ asset('storage/' . str_replace('public/', '', $media->file_path)) }}" type="video/mp4">
                        </video>
                    @endif
                @endforeach
            @endif
            {{ $content->title }}
            <a href="{{ route('contents.show', $content) }}">Voir</a>
            <a href="{{ route('contents.edit', $content) }}">Modifier</a>
            <form action="{{ route('contents.destroy', $content) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('contents.create') }}">Créer un nouveau contenu</a>