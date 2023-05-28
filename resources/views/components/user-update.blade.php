<div class="flex flex-col w-full h-fit pb-10 pr-10 pl-10">

    <div class="flex w-full my-4 items-center justify-center bg-grey-lighter">
        <x-submit-button :text="__('Photo')" />
        <x-change-password-button />
        <x-delete-account-button />
    </div>

    <img class="object-contain mt-3 bg-white shadow-xl rounded-full" src="{{ asset(Auth::user()->getPathToProfilePhoto()) }}"/>
    <p class="text-4xl p-5">{{Auth::user()->username}}</p>

    <div class="bg-white p-10 drop-shadow-lg rounded-3xl">
        <p class="pb-2 mt-0 text-3xl text-black">Profile details</p>

        <form method="POST" action="/users/{{$user->id}}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="text" value="{{Auth::user()->username}}">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="favPokemon2">
                    Favorite Character:
                </label>
                <input class="shadow text-left appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="favCharacter" id="favCharacter" type="text" value="{{Auth::user()->favCharacter}}">
            </div>
            <div class="flex items-center justify-center">
                <button type="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-5">
                    Change
                </button>


            </div>
        </form>


    </div>
</div>
