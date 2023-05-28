<x-app-layout>
    <x-slot name="title">
        {{  __('Wiki') }}
    </x-slot>

    <div class="flex flex-wrap space-x-4 space-y-3 lg:space-y-0 lg:flex-nowrap w-3/4 sm:w-3/5 my-2 py-3 lg:py-0 px-5 justify-between sm:bg-black rounded-xl">

        <form id="filterForm" action="/wiki"  method="GET" class="filterForm flex grow justify-center align-center text-center items-center bg-black rounded-xl py-3 sm:py-0 sm:bg-transparent ">
            <x-input id="searchForm" placeholder="Filter by item name..." name="search" value="{{request('search')}}"/>
            <button >
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" class="mx-1 p-1 w-6 h-6 text-white svg-inline--fa fa-magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path></svg>
            </button>
        </form>

        <script type="text/javascript">
        $('.filterForm').on('submit',function(e){
            e.preventDefault();
            var urlParams = new URLSearchParams(location.search);
            var searchValue = document.getElementById("searchForm").value;
            if(searchValue)
            urlParams.set('search', searchValue);
            else if(urlParams.has('search'))
            urlParams.delete('search');
            var newParams = urlParams.toString();
            var finalUrl=location.pathname + "?" + newParams;
            window.location.href = finalUrl;
        })
        </script>

        <div class="hidden sm:flex space-evenly items-center justify-between grow space-x-2 bg-black rounded-xl lg:py-3">
            <div class=" lg:ml-6 sm:items-center align-center justify-center items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center justify-center text-xl font-medium text-yellow-300 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ __(request('component') ?? "Component") }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach($components as $key => $type)
                        <x-dropdown-link class="bg-gray-800 text-cyan-200"  :href="route('wiki.index',  ['search'=>request('search'), 'sort' => request('sort')]+ ($type != 'component' ?array('component' => $type) : array()))">
                            {{__($type)}}
                        </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-dropdown>
            </div>

            <a href="/wiki" class="hidden sm:flex btn btn-circle btn-sm bg-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>
        </div>

    </div>

    <div class="h-1/2 text-yellow-300 m-5 sm:m-0" style="display:grid; grid-template-columns: repeat(6, minmax(0, 1fr));">
        @forelse($items as $key => $item)
            <div class="col-span-6 md:col-span-3 lg:col-span-2">
        <x-item-card :item="$item" class=""/>
            </div>
        @empty
        <h2 class="text-gray-800 text-4xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 italic">No items with such filters...</h2>
        @endforelse
    </div>

    {{$items->links('pagination.default')}}

    </div>

</x-app-layout>
