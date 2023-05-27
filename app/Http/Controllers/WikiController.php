<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class WikiController extends Controller
{
    public function index(Request $request)
    {
        $items = new Item();
        $components = $items->pluck('component', 'component')->unique()->toArray();
        array_unshift($components, "Component");


        $queries = [];

        $filters = [
            'component',
        ];

        $sorters = [
            'name',
        ];

        foreach ($filters as $column) {
            if (request()->has($column)) {
                $items = $items->where($column, request($column));
                $queries[$column] = request($column);
            }
        }
        if (request()->has('sort')) {
            $items = $items->orderBy('component', request('sort'));
        } else {
            $items = $items->orderBy('name', "asc");
        }

        if (request()->has('search')) {
            $items = $items->where('name', 'like', '%' . request('search') . '%');
        }

        $items = $items->paginate(15)->appends($queries);

        return view('wiki.index', compact('items'))->with('components', $components);
    }

    public function show($id)
    {

        // get the current user
        $item = item::find($id);

        // get previous user id
        $previous = item::where('id', '<', $item->id)->max('id');

        // get next user id
        $next = item::where('id', '>', $item->id)->min('id');

        // check if in collection
        $isInCollection = FALSE;

        $componentItem = DB::table($item->component)->where('index', '=', $item->component_index)->first();
//        if(Auth::user())
//        {
//            $items = Auth::user()->collection()->getAllPokemonsFromCollection();
//            foreach ($items as $it) {
//                if ($it->id == $item->id)
//                    $isInCollection = TRUE;
//            }
//        }

        return View::make('wiki.show')->with('item', $componentItem)->with('previous', $previous)->with('next', $next)->with('isInCollection', $isInCollection)->with('id', $item->id);
    }

}
