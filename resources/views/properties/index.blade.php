<h2>Liste des Properties</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Formulaire création -->
<h3>Ajouter une propriété</h3>
<form action="{{ route('properties.store') }}" method="POST">
    @csrf
    <input type="text" name="nom" placeholder="Nom de la propriété" value="{{ old('nom') }}">
    @error('nom')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <button type="submit">Ajouter</button>
</form>

<hr>

<!-- Liste + edit inline -->
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $propertie)
           <tr>
    <td>            
        <p>{{ $propertie->nom }}</p>
    </td>
    <td>
        <form action="{{ route('properties.destroy', $propertie->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette propriété ?')">
                Supprimer
            </button>
        </form>
    </td>
</tr>

        @endforeach
    </tbody>
</table>