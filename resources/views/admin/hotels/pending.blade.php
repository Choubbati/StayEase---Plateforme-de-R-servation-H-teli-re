@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Hôtels en attente</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($hotels->count() === 0)
        <div class="alert alert-info">Aucun hôtel en attente.</div>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Ville</th>
                        <th>Gérant</th>
                        <th>Créé le</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->city }}</td>
                        <td>{{ $hotel->manager?->name ?? '—' }}</td>
                        <td>{{ $hotel->created_at->format('d/m/Y') }}</td>
                        <td class="text-end d-flex justify-content-end gap-2">
                            <form method="POST" action="{{ route('admin.hotels.approve', $hotel) }}">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm">Approuver</button>
                            </form>

                            <form method="POST" action="{{ route('admin.hotels.reject', $hotel) }}">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-danger btn-sm">Rejeter</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $hotels->links() }}
    @endif
</div>
@endsection
