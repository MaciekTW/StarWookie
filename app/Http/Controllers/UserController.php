<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Rules\CorrectItem;
use App\Rules\IsUsernameFree;

class UserController extends Controller
{


    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', new IsUsernameFree()],
            'favCharacter' => ['required', 'string', 'max:255', new CorrectItem()],
        ]);


        $user->username = $request->username;
        $user->favCharacter = $request->favCharacter;
        if( ! $user->customAvatar )
            $user->image = Item::getItemPhotoByName($user->favCharacter);
        $user->save();

        return $this->showLoggedUser();
    }

    public function showLoggedUser()
    {
        return redirect('/dashboard');
    }

    public function destroy(User $user)
    {
        $userPhoto="public/Graphics/ProfilePhotos/".Auth()->user()->id."_".Auth()->user()->username.'.jpeg';
        if(file_exists($userPhoto))
            unlink($userPhoto);

        $user->delete();

        return redirect("/wiki");
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'image' => ['required', 'mimes:jpeg'],
        ]);

        if($request->hasFile('image')){
            $filename = Auth()->user()->id."_".Auth()->user()->username.'.jpeg';
            $request->image->move(public_path('Graphics/ProfilePhotos'),$filename);
            Auth()->user()->update(['image'=>asset("Graphics/ProfilePhotos/".$filename)]);
        }
        Auth()->user()->customAvatar = true;
        Auth()->user()->save();

        return redirect()->back();
    }

    public function deleteItemFromCollection(Request $request)
    {
        Auth()->user()->collection()->removeFromCollection(Item::getItemName($request->item));
        return redirect()->back();
    }

    public function addItemToCollection(Request $request)
    {
        Auth()->user()->collection()->addToCollection(Item::getItemName($request->item));
        return redirect()->back();
    }


}
