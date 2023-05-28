@if (Route::has('login'))
    <div class="flex w-screen h-16 bg-gray-800 px-5 mb-5 drop-shadow-2xl align-center justify-between items-center rounded-b-2xl">
        <a href="/wiki" class="hidden sm:flex align-center justify-start items-center sm:w-1/3">
            <x-application-logo/>
        </a>

        <div class="hidden sm:flex flex-col sm:flex-row align-center justify-center items-center space-x-5 sm:w-1/3">
            <x-navbar-link :dest="'wiki'" class="btn-ghost" style="font-family: 'octo'">
                Wiki
            </x-navbar-link>

            @php
                $item_num = App\Models\Item::randomItem()->id;
                $dst= "wiki/" . $item_num;
            @endphp
            <x-navbar-link :dest="$dst" class="btn-ghost" style="font-family: 'octo'">
                Random
            </x-navbar-link>

            <x-navbar-link :dest="'Translate'" class="btn-ghost" style="font-family: 'octo'">
                Translate
            </x-navbar-link>
        </div>

        <div class="flex sm:hidden justify-left">
            <x-dropdown align="left" width="36">
                <x-slot name="trigger">
                    <button class="btn btn-square btn-ghost">
                        <x-application-logo/>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('wiki.index')">
                        {{ __('Wiki') }}
                    </x-dropdown-link>


                </x-slot>
            </x-dropdown>
        </div>


        <div class="flex items-center align-center justify-end w-1/3">
            @auth
                <div class="flex items-center ml-6">
                    <x-dropdown align="right" width="36">
                        <x-slot name="trigger">
                            <button class="flex items-center text-xl text-white ">
                                <div class="avatar hidden md:block">
                                    <div class="bg-white rounded-full w-10 h-10 m-1">
                                        <img src="{{ asset(Auth::user()->getPathToProfilePhoto()) }}">
                                    </div>
                                </div>
                                <div class="font-bold ml-2" style="font-family: 'octo'">{{ Auth::user()->username }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <p class="align-right text-right">
                                        {{ __('Log Out') }}
                                    </p>
                                </x-dropdown-link>
                            </form>

                        </x-slot>
                    </x-dropdown>
                </div>
            @else

                <div class="hidden flex-none lg:flex">
                    <a href="{{ route('login') }}" class="px-3 text-xl text-white btn btn-ghost">Log in</a>
                    <a href="{{ route('register') }}" class="px-3 text-xl text-white btn btn-ghost">Register</a>
                </div>

                <div class="flex lg:hidden justify-left">
                    <x-dropdown align="right" width="36">
                        <x-slot name="trigger">
                            <button class="btn btn-square btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 stroke-zinc-700 fill-slate-50"  viewBox="0 0 24 24" >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('login')">
                                {{ __('Login') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('register')">
                                {{ __('Register') }}
                            </x-dropdown-link>

                        </x-slot>
                    </x-dropdown>
                </div>

            @endauth
        </div>
    </div>

@endif
