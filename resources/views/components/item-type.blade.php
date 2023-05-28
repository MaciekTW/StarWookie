
<a href={{ route('wiki.index',  ['search'=>request('search'), 'sort' => request('sort')]+ ($type != 'Component' ?array('component' => $type) : array()))}} @class([
    'p-1',
    'm-1',
    'rounded-lg',
    'w-34',
    'text-black',
    'border-solid',
    'border-2',
    'border-slate-600',
    'bg-lime-800 hover:bg-gradient-to-t hover:from-slate-500 hover:to-lime-800'                                       => $type == "characters",
    'bg-fuchsia-900 hover:bg-gradient-to-t hover:from-purple-200 hover:to-fuchsia-900'                                       => $type == "starships",
    'bg-slate-700 hover:bg-gradient-to-t hover:from-slate-500 hover:to-slate-700'                                        => $type == "species",
    'bg-gradient-to-t from-orange-600 to-blue-600 hover:from-slate-500 hover:to-blue-600'                             => $type == "vehicles",
    'bg-pink-400 hover:bg-gradient-to-t hover:from-slate-500 hover:to-pink-400'                                       => $type == "planets",
    ])>
    {{$type}}
</a>
