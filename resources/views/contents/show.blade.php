<h1>{{ $content->title }}</h1>

<p>{{ $content->body }}</p>

<p>Type : {{ $content->type }}</p>

<p>Créé par : {{ $content->admin->name }}</p>

<p>Créé le : {{ $content->created_at->format('d/m/Y H:i') }}</p>

<p>Dernière mise à jour : {{ $content->updated_at->format('d/m/Y H:i') }}</p>

@if($content->media->count() > 0)
    <h2>Médias</h2>
    @foreach($content->media as $media)
        @if($media->type === 'image')
            <img src="{{ asset('storage/' . $media->file_path) }}" alt="Image">
        @elseif($media->type === 'video')
            <video width="320" height="240" controls>
                <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                Votre navigateur ne prend pas en charge la lecture de vidéos.
            </video>
        @endif
    @endforeach
@endif

<a href="{{ route('contents.edit', $content) }}">Modifier</a>
<a href="{{ route('contents.index') }}">Retour à la liste</a>