
<h1>Dons</h1>

<table>
    <thead>
        <tr>
            <th>Utilisateur</th>
            <th>Projet</th>
            <th>Montant</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dons as $don)
            <tr>
                <td>{{ $don->user->name }}</td>
                <td>{{ $don->project->title }}</td>
                <td>{{ $don->amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>