@extends('layouts.app')

@section    ('content')

        <section class="max-w-7xl mx-auto px-10 py-20">
            <h2 class="text-3xl font-bold mb-10">Nos offres à la une</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @forelse($hotelsApprouved as $hotelapproved)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition border border-gray-100">
                        <img src="{{ $hotelapproved->image }}" class="h-56 w-full object-cover" alt="image Hotel">
                        <div class="p-6">
                            <div class="mt-6 flex justify-between items-center">
                            <span
                                class="text-indigo-600 font-bold text-sm uppercase">{{ $hotelapproved->ville }}</span>
                            </div>
                            <h3 class="text-xl font-bold mt-2"> {{$hotelapproved->nom}} </h3>
                            <p class="text-gray-500 mt-2 text-sm italic">{{ $hotelapproved->description }}</p>
                            <div class="mt-6 flex justify-between items-center">
                                <a href="{{ route('hotels.detail', $hotelapproved) }}" class="text-indigo-600 font-bold hover:underline">Voir l'offre</a>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="flex justify-center">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition border border-gray-100">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/052/947/382/small/modern-and-clean-design-of-a-hotel-building-icon-for-graphic-representation-vector.jpg" class="h-56 w-full object-cover" alt="image Hotel">

                            <div class="p-6">
                                <h3 class="text-xl font-bold mt-2">Aucun Hotels existes</h3>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
            <h1> {{ $hotelsApprouved->links() }}</h1>
        </section>


@endsection

