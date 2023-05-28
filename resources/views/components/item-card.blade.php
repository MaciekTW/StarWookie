<div class="flex flex-col w-100 text-center drop-shadow-2xl bg-gray-800 m-1 items-center">
    <a href="{{ URL::to( 'wiki/' . $item->id ) }}" class="cursor-pointer w-96 text-2xl font-bold text-center bg-black drop-shadow-lg rounded-bl-lg rounded-br-lg p-1 text-yellow-300 hover:text-blue-100" style="font-family: 'octo'">
        {{ $item->name }}
    </a>
    <img class="h-36 w-36 p-3 pb-1" src="{{ asset('Graphics/' . $item->component . '/'.$item->src) }}"/>
    <div class="text-sm text-gray-200 p-2">
        #{{$item->id}}
    </div>
    <div class="flex pb-4">
        <x-item-type :type="$item->component" />
    </div>
</div>
