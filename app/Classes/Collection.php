<?php

namespace App\Classes;

Use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\CollectionElement;

class Collection
{
    private $user;

    public function __construct($user)
    {
        $this->user=$user;
    }

    public function addToCollection($item)
    {
        $this->user->items()->attach($item->id);
    }

    public function removeFromCollection($item)
    {
        $this->user->items()->detach($item->id);
    }

    public function getCollectionSize() : int
    {
        return count($this->user->items()->get());
    }

    public function getAllItemsFromCollection()
    {
        return $this->user->items()->get();
    }

    public function getAllItemsFromCollectionAsDB()
    {
        return DB::table('items')
            ->select('items.id AS id', 'component', 'src', 'name')
            ->leftJoin('item_user', 'items.id', '=', 'item_user.item_id')
            ->where('user_id', '=', $this->user->id)
            ->orderBy("items.id");
    }


    public function removeCollection()
    {
        $collectionItem = DB::table('item_user')
            ->where('user_id', '=', $this->user->id)->get();

        foreach ($collectionItem as $item) {
            CollectionElement::destroy($item->id);
        }
    }
    public function getMostCommonItemType()
    {
        $type = DB::table('items')
            ->select('component', DB::raw('COUNT(*)'))
            ->leftJoin('item_user', 'items.id', '=', 'item_user.item_id')
            ->where('user_id', '=', $this->user->id)
            ->groupBy('component')
            ->orderByDesc("COUNT(*)")
            ->first();

        return $type->component;
    }


    public function getNewestItemInCollection()
    {
        $last = DB::table('items')
            ->select('*')
            ->leftJoin('item_user', 'items.id', '=', 'item_user.item_id')
            ->where('user_id', '=', $this->user->id)
            ->orderByDesc('item_user.id')
            ->first();

        return $last;
    }


}
