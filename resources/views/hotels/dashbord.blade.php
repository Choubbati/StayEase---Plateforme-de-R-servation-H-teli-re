@extends('layouts.app')
@section('content')
    @auth
        @if(session()->has('success'))
            <div class="flex justify-center">
                <div class="bg-green-100 border border-green-400 text-black-700 px-4 py-3 rounded relative w-11/12" role="alert">
                    <strong class="font-bold">Bravo !! </strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
    <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">Tous les hotels:</span>
                            <span class="dark:text-white">{{ $count }}</span>
                        </h5>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <a href="{{ route('hotels.create') }}" type="button" class="flex items-center justify-center flex-shrink-0 px-5 py-3 text-sm font-medium text-white focus:outline-none bg-blue-600 rounded-lg border border-blue-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Ajouter nouveau Hotel
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto " id="dashHotel">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Image</th>
                            <th scope="col" class="px-4 py-3">Hotel</th>
                            <th scope="col" class="px-4 py-3">Ville</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="p-4">Last Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hotels as $hotel)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ $hotel->image }}" alt="Image Hotel" class="w-auto h-8 mr-3">

                                </th>
                                <td class="px-4 py-2">
                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $hotel->nom }}</span>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{ $hotel->ville }}</td>
                                <td class="px-4 py-2 font-medium text-gray-700 whitespace-nowrap  ">
                                    <div class="h-4 w-4 rounded-full inline-block mr-2 bg-red-700"></div>
                                    {{ $hotel->status }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('hotels.edit', $hotel)}}" type="button"  class="py-3 px-3 flex items-center text-sm font-medium text-center text-black bg-green-400 text-white rounded-lg hover:bg-gray-100 hover:text-gray-900  rounded-lg border border-green-200  ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                            Edit
                                        </a>
                                        <a href="{{ route('hotels.detail', $hotel)}}" type="button" class="py-3 px-3 flex items-center text-sm font-medium text-center text-white focus:outline-none bg-blue-400 rounded-lg border border-blue-200 hover:bg-gray-100 hover:text-gray-900  focus:z-10 focus:ring-4 focus:ring-gray-200 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                            Voir details
                                        </a>
                                        <form action="{{ route('hotels.destroy', $hotel) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"  class="flex items-center mt-3 py-2 px-3 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                    {{ $hotels->links() }}
                </div>

            </div>
        </div>
    </section>

    @endauth
@endsection


    <script>
    const recordVerticalOffset = () => {

        localStorage.setItem('pageVerticalPosition', window.scrollY);
    }

    // Only save window position after scrolling stops
    const throttleScroll = (delay) => {

        let time = Date.now();

        const checkScroll = setInterval(() => {

            if (Date.now() > (time + delay)) {

                clearInterval(checkScroll);
                return recordVerticalOffset();
            }
        }, 300);
    }

    // Scroll Event Listener
    window.addEventListener('scroll', throttleScroll(500));


    // DESTINATION PAGE
    // ================

    const repositionPage = () => {

        let pageVerticalPosition = localStorage.getItem('pageVerticalPosition') || 0;

        window.scrollTo(0, pageVerticalPosition);
    }

    window.addEventListener('load', repositionPage);
</script>
