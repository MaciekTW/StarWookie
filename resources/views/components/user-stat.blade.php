<div class="w-11/12 bg-white shadow stats m-5">
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Favourite type</div>
        <div class="stat-value"> <div class="p-2"> <x-item-type :type="Auth::user()->collection()->getMostCommonItemType()" /> </div></div>
    </div>
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Caught Pokemons</div>
        <div class="stat-value text-success">{{Auth::user()->collection()->getCollectionSize()}}</div>
    </div>
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Newest catch</div>
        <div class="stat-value text-error"><a href={{"/wiki/".Auth::user()->collection()->getNewestItemInCollection()->id}}>{{Auth::user()->collection()->getNewestItemInCollection()->name}}</a></div>
    </div>
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Pokeballs count</div>
        <div class="stat-value text-success">100</div>
    </div>
</div>
