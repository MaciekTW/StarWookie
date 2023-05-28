<x-app-layout>
    <x-slot name="title">
        {{Auth::user()->username}}
    </x-slot>

    <div class="flex w-4/5 h-4/6 text-center drop-shadow-2xl m-1  text-xl">
        <div class="w-1/3 rounded-3xl text-2xl font-bold text-center bg-gray-600 drop-shadow-lg rounded-bl-lg rounded-br-lg text-blue-400 justify-between items-center">
            <div class="w-full text-2xl font-bold text-center bg-gray-800 drop-shadow-lg rounded-bl-lg rounded-br-lg rounded-3xl text-blue-400  flex justify-between items-center">
                <div class="w-full items-start">
                    <div>

                        <div class="w-full text-2xl text-center bg-gray-800 drop-shadow-lg rounded-bl-lg rounded-br-lg rounded-3xl text-blue-400  flex justify-between items-center">
                            <p class="w-full font-light text-center "> Profile </p>
                        </div>

                    </div>
                </div>
            </div>
            <x-user-update :user="Auth::user()"/>
        </div>


        <div class="flex-col w-2/3 bg-gray-600 rounded-3xl text-2xl font-bold text-center drop-shadow-lg rounded-bl-lg rounded-br-lg text-blue-400 align-center justify-center items-center ml-5">
            <div class="w-full text-2xl font-bold text-center bg-gray-800 drop-shadow-lg rounded-bl-lg rounded-br-lg rounded-3xl text-blue-400">
                <p class="w-full font-light"> My favorites </p>
            </div>
            <x-validator-msg />

            <x-user-stat />
            <div class="flex flex-col justify-center items-center">
                <div class="w-5/6 h-fit text-blue-400" style="display:grid; grid-template-columns: repeat(3, minmax(0, 1fr));">
                    @forelse($items as $key => $item)
                        <div class="grow relative">
                            @if( Auth::user()->collection()->getCollectionSize() > 1)
                                <label class="absolute w-5 items-center z-10 top-0 left-0 p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:stroke-red-500 stroke-red-300" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <form action="/delete-pokemon" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input name="pokemon" type="text" value="{{$item->name}}" class="hidden" onclick="this.form.submit()"/>
                                    </form>
                                </label>
                            @endif

                            <x-item-card-mini :item="$item" class=""/>
                        </div>
                    @empty
                        <h2 class="text-gray-800 text-4xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 italic">No items in your collection. </h2>
                    @endforelse
                </div>
                {{$items->links('pagination.default')}}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
</x-app-layout>
