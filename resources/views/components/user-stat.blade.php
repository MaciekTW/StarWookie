<div class="w-11/12 bg-white shadow stats m-5">
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Most intrested</div>
        <div class="stat-value"> <div class="p-2"> <x-item-type :type="Auth::user()->collection()->getMostCommonItemType()" /> </div></div>
    </div>
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">In collection</div>
        <div class="stat-value text-success">{{Auth::user()->collection()->getCollectionSize()}}</div>
    </div>
    <div class="stat place-items-center place-content-center">
        <div class="stat-title">Newest</div>
        <div class="stat-value text-error"><a href={{"/wiki/".Auth::user()->collection()->getNewestItemInCollection()->id}}>{{Auth::user()->collection()->getNewestItemInCollection()->name}}</a></div>
    </div>
</div>
