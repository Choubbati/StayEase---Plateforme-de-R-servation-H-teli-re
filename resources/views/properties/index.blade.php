<h2>Liste des Properties</h2>
<ul>
@foreach ($properties as $property)
<li>{{ $property->nom }}</li>
@endforeach
</ul>