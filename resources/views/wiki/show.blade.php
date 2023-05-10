<x-app-layout>
    <x-slot name="title">
            {{ $pokemon->Pokemon_Name }}
    </x-slot>
    <div class="flex flex-col justify-center overflow-x-hidden  min-w-full min-h-screen bg-gray-900 sm:items-center py-4 sm:pt-0">
        <x-pokemon-card-detail :pokemon="$pokemon" :prev="$previous" :next="$next" :base="$base" :evolution="$evolution" :nextEvolution="$nextEvolution" :isInCollection="$isInCollection" class=""/>
    </div>
</x-app-layout>
