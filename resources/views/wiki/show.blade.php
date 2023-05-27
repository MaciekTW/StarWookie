<x-app-layout>
    <x-slot name="title">
        {{ $item->name }}
    </x-slot>
    <div class="flex flex-col justify-center overflow-x-hidden  min-w-full min-h-screen bg-gray-900 sm:items-center py-4 sm:pt-0">
        <x-item-card-detail :item="$item" :prev="$previous" :next="$next" :isInCollection="$isInCollection" :id="$id" class=""/>
    </div>
</x-app-layout>

