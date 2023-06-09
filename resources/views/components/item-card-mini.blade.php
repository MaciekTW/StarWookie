<div class="flex flex-col w-56 text-center drop-shadow-xl bg-gray-700 m-1 items-center border-solid border-2 border-blue-600">
    <a class="hover:text-blue-100 w-full text-xl font-bold text-center bg-black drop-shadow-lg rounded-bl-lg rounded-br-lg p-1 text-yellow-300" style="font-family: 'octo'" href={{ URL::to( 'wiki/' . $item->id ) }}>
        {{ $item->name }}
    </a>
    <img class="h-24 w-24 p-2 pb-1" src="{{ asset('Graphics/' . $item->component . '/' . $item->src) }}"/>
    <div class="text-sm text-gray-200 p-2">
    #{{$item->id}}
    </div>
    <div class="flex p-2">
        <x-item-type :type="$item->component" class="w-30" />
    </div>
</div>
