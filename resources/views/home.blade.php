@extends('layouts.app')

@section('content')

    <section class="max-w-7xl mx-auto px-10 py-20">
        <h2 class="text-3xl font-bold mb-10">Nos offres à la une</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($hotelsApprouved as $hotel)
                <div
                    class="group bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden flex flex-col hover:shadow-2xl transition-shadow duration-300">
                    <!-- Image -->
                    <div class="h-56 bg-slate-200 relative overflow-hidden">
                        @if($hotel->image)
                            <img src="{{ $hotel->image }}" alt="Image de l'hotel"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-100">
                                <svg class="w-12 h-12 text-slate-400 shrink-0"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4-4 4 4 4-4 4 4M4 8h16"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h5 class="text-xl font-bold text-slate-900 leading-snug">
                                Hotel : {{ $hotel->nom }}
                            </h5>
                        </div>

                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <p class="text-2xl font-extrabold text-indigo-600">
                                    {{ $hotel->ville }}
                                </p>
                            </div>

                        </div>
                        <a href="{{ route('hotels.detail', $hotel) }}"
                           class="text-indigo-600 font-semibold text-sm mb-6 hover:text-indigo-800 transition-colors inline-flex items-center">
                            Voir les détails
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>


                    </div>
                </div>
            @empty
                <div
                    class="group bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden flex flex-col hover:shadow-2xl transition-shadow duration-300">
                    <!-- Image -->
                    <div class="h-56 bg-slate-200 relative overflow-hidden">
                        <div class="w-full h-full flex items-center justify-center bg-slate-100">
                            <svg class="w-12 h-12 text-slate-400 shrink-0"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16l4-4 4 4 4-4 4 4M4 8h16"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-3">
                            <h5 class="text-xl font-bold text-slate-900 leading-snug">
                                Aucun hotel existe
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">

                </div>
            @endforelse
        </div>
        <p class="mt-5"> {{ $hotelsApprouved->links() }}</p>
    </section>

    <script>
        const recordVerticalOffset = () => {

            localStorage.setItem('pageVerticalPosition', window.scrollY);
        }

        const throttleScroll = (delay) => {

            let time = Date.now();

            const checkScroll = setInterval(() => {

                if (Date.now() > (time + delay)) {

                    clearInterval(checkScroll);
                    return recordVerticalOffset();
                }
            }, 300);
        }
        window.addEventListener('scroll', throttleScroll(500));
        const repositionPage = () => {

            let pageVerticalPosition = localStorage.getItem('pageVerticalPosition') || 0;

            window.scrollTo(0, pageVerticalPosition);
        }

        window.addEventListener('load', repositionPage);
    </script>
@endsection

