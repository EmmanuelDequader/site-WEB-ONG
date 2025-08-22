// resources/views/projects/show.blade.php

<h1>{{ $project->title }}</h1>

<p>{{ $project->description }}</p>

@if(auth()->check() && !auth()->user()->hasRole('admin'))
    <form action="{{ route('dons.store') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <label for="amount">Montant du don</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Faire un don</button>
    </form>
@endif