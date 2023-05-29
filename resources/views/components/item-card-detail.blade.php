<div class="flex flex-col w-7/12 h-4/6 text-center drop-shadow-2xl bg-gray-800 mt-0 text-xl" style="margin-top: -15%;">
    <div
        class="w-full text-2xl font-bold text-center bg-black drop-shadow-lg rounded-bl-lg rounded-br-lg p-1 text-yellow-300  flex justify-between items-center">

        @if($prev)
            <a href="{{ URL::to( 'wiki/' . $prev ) }}">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angles-left"
                     class=" text-blue-600 w-6 h- 6 svg-inline--fa fa-angles-left" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M77.25 256l137.4-137.4c12.5-12.5 12.5-32.75 0-45.25s-32.75-12.5-45.25 0l-160 160c-12.5 12.5-12.5 32.75 0 45.25l160 160C175.6 444.9 183.8 448 192 448s16.38-3.125 22.62-9.375c12.5-12.5 12.5-32.75 0-45.25L77.25 256zM269.3 256l137.4-137.4c12.5-12.5 12.5-32.75 0-45.25s-32.75-12.5-45.25 0l-160 160c-12.5 12.5-12.5 32.75 0 45.25l160 160C367.6 444.9 375.8 448 384 448s16.38-3.125 22.62-9.375c12.5-12.5 12.5-32.75 0-45.25L269.3 256z"></path>
                </svg>
            </a>
        @endif
        <p class="w-full text-center" style="font-family: 'octo'">#{{$id}} {{ $item->name }}</p>
        @if(Auth::user())
            @if($isInCollection)
                <img class="h-12 w-14 p-3 pb-1 absolute -top-2 right-9" alt='You have that Pokemon in your collection'
                     src="{{ asset('Graphics/pokeball.ico')}}"/>
            @endif
        @endif
        @if($next)
            <a href="{{ URL::to( 'wiki/' . $next ) }}">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angles-right"
                     class="text-blue-600 w-6 h-6 svg-inline--fa fa-angles-right" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                          d="M246.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L178.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C47.63 444.9 55.81 448 64 448s16.38-3.125 22.62-9.375l160-160C259.1 266.1 259.1 245.9 246.6 233.4zM438.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L370.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C239.6 444.9 247.8 448 256 448s16.38-3.125 22.62-9.375l160-160C451.1 266.1 451.1 245.9 438.6 233.4z"></path>
                </svg>
                @endif
            </a>

    </div>

    <div class="justify-between flex p-3 ">

        <div class="flex flex-col w-1/3 h-fit  p-3 pb-1  items-center">
            <h1 class="text-4xl text-white mb-2">
                {{$item->name}}
            </h1>
            <img
                class="object-contain bg-neutral-300 w-64 h-64 rounded-lg shadow-xl border-4 border-solid border-neutral-400 bg-slate-500"
                src="{{ asset('Graphics/' . $item->component . '/' . $item->src) }}"/>
            <div class="flex pt-4 self-center">
                <x-item-type :type="$item->component"/>
            </div>
        </div>

        <div class=" flex flex-col w-2/3 pl-5 pr-5  align-center justify-center items-center">
            @if($item->component == 'characters')
                <div class="flex items-center align-center justify-center text-center color text-white">
                    <h2 class="px-2">
                    Species: {{$item->species}}
                    </h2>
                    <div class="px-2 flex items-center text-red-400">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="asterisk"
                             class="w-3 h-3 svg-inline--fa fa-asterisk" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 448 512">
                            <path fill="currentColor"
                                  d="M417.1 368c-5.937 10.27-16.69 16-27.75 16c-5.422 0-10.92-1.375-15.97-4.281L256 311.4V448c0 17.67-14.33 32-31.1 32S192 465.7 192 448V311.4l-118.3 68.29C68.67 382.6 63.17 384 57.75 384c-11.06 0-21.81-5.734-27.75-16c-8.828-15.31-3.594-34.88 11.72-43.72L159.1 256L41.72 187.7C26.41 178.9 21.17 159.3 29.1 144C36.63 132.5 49.26 126.7 61.65 128.2C65.78 128.7 69.88 130.1 73.72 132.3L192 200.6V64c0-17.67 14.33-32 32-32S256 46.33 256 64v136.6l118.3-68.29c3.838-2.213 7.939-3.539 12.07-4.051C398.7 126.7 411.4 132.5 417.1 144c8.828 15.31 3.594 34.88-11.72 43.72L288 256l118.3 68.28C421.6 333.1 426.8 352.7 417.1 368z"></path>
                        </svg>
                        <h2 class="">
                            Gender:
                        </h2>
                    </div>
                    <h2 class="">
                        @if($item->gender == 'NaN' or $item->gender == 'none')
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                 class="w-10 h-10 p-1 text-white svg-inline--fa fa-mars" role="img">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z"></path>
                            </svg>
                        @endif
                        @if($item->gender == "male")
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="mars"
                                 class="w-10 h-10 p-1 text-white svg-inline--fa fa-mars" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor"
                                      d="M431.1 31.1l-112.6 0c-21.42 0-32.15 25.85-17 40.97l29.61 29.56l-56.65 56.55c-30.03-20.66-65.04-31-100-31c-47.99-.002-95.96 19.44-131.1 58.39c-60.86 67.51-58.65 175 4.748 240.1C83.66 462.2 129.6 480 175.5 480c45.12 0 90.34-17.18 124.8-51.55c61.11-60.99 67.77-155.6 20.42-224.1l56.65-56.55l29.61 29.56C411.9 182.2 417.9 184.4 423.8 184.4C436.1 184.4 448 174.8 448 160.4V47.1C448 39.16 440.8 31.1 431.1 31.1zM243.5 371.9c-18.75 18.71-43.38 28.07-68 28.07c-24.63 0-49.25-9.355-68.01-28.07c-37.5-37.43-37.5-98.33 0-135.8c18.75-18.71 43.38-28.07 68.01-28.07c24.63 0 49.25 9.357 68 28.07C281 273.5 281 334.5 243.5 371.9z"></path>
                            </svg>
                        @endif
                        @if($item->gender == "female")
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="venus"
                                 class="w-10 h-10 p-1 text-white svg-inline--fa fa-venus" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor"
                                      d="M368 176c0-97.2-78.8-176-176-176c-97.2 0-176 78.8-176 176c0 86.26 62.1 157.9 144 172.1v35.05H112c-8.836 0-16 7.162-16 16v32c0 8.836 7.164 16 16 16H160v48c0 8.836 7.164 16 16 16h32c8.838 0 16-7.164 16-16v-48h48c8.838 0 16-7.164 16-16v-32c0-8.838-7.162-16-16-16H224v-35.05C305.9 333.9 368 262.3 368 176zM192 272c-52.93 0-96-43.07-96-96c0-52.94 43.07-96 96-96c52.94 0 96 43.06 96 96C288 228.9 244.9 272 192 272z"></path>
                            </svg>
                        @endif
                    </h2>
            @endif
            @if($item->component == 'planets')
                <div class="flex items-center align-center justify-center text-center text-white">
                    <h2 class="px-2">
                        Gravity: {{$item->gravity}}
                    </h2>
            @endif
            @if($item->component == 'species')
                <div class="flex items-center align-center justify-center text-center text-white">
                    <h2 class="px-2">
                        Classification: {{$item->classification}}
                    </h2>
            @endif
            @if($item->component == 'starships' or $item->component == 'vehicles')
                <div class="flex items-center align-center justify-center text-center text-white">
                    <h2 class="px-2">
                        Full model name: {{$item->model}}
                    </h2>
            @endif
            </div>
                <div class="flex flex-col mt-2">
                    @if($item->component == 'characters')
                    <h1 class="text-4xl text-white">
                        Appearance
                    </h1>
                    <div class="shadow overflow-hidden border-b border-gray-400 bg-gray-400 sm:rounded-lg mt-2">
                        <table class="min-w-full bg-gray-700">
                            <thead class="">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                    Hair Color
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                    Skin Color
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                    Eye Color
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-gray-400 divide-y divide-gray-400">
                            <tr>
                                <td class="px-6 py-4 max-w-xs">
                                    @if($item->hair_color == 'NaN')
                                        Unknown
                                    @else
                                    {{$item->hair_color}}
                                    @endif
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    @if($item->skin_color == 'NaN')
                                        Unknown
                                    @else
                                    {{$item->skin_color}}
                                    @endif
                                </td>
                                <td class="px-6 py-4 max-w-xs">
                                    @if($item->eye_color == 'NaN')
                                        Unknown
                                    @else
                                    {{$item->eye_color}}
                                    @endif
                                </td>
                        </table>
                    </div>
                    @endif
                    @if($item->component == 'planets')
                        <h1 class="text-4xl text-white">
                            Surface
                        </h1>
                        <div class="shadow overflow-hidden border-b border-gray-400 bg-gray-400 sm:rounded-lg mt-2">
                            <table class="min-w-full bg-gray-700">
                                <thead class="">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Climate
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Terrain
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Water Surface Percentage
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-gray-400 divide-y divide-gray-400">
                                <tr>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->climate == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->climate}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->terrain == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->terrain}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->surface_water == 'NaN')
                                            0%
                                        @else
                                            {{$item->surface_water}} %
                                        @endif
                                    </td>
                            </table>
                        </div>
                    @endif
                    @if($item->component == 'species')
                            <h1 class="text-4xl text-white">
                                Appearance
                            </h1>
                            <div class="shadow overflow-hidden border-b border-gray-400 bg-gray-400 sm:rounded-lg mt-2">
                                <table class="min-w-full bg-gray-700">
                                    <thead class="">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                            Hair Colors
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                            Skin Colors
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                            Eye Colors
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-gray-400 divide-y divide-gray-400">
                                    <tr>
                                        <td class="px-6 py-4 max-w-xs">
                                            @if($item->hair_colors == 'NaN')
                                                Unknown
                                            @else
                                                {{$item->hair_colors}}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 max-w-xs">
                                            @if($item->skin_colors == 'NaN')
                                                Unknown
                                            @else
                                                {{$item->skin_colors}}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 max-w-xs">
                                            @if($item->eye_colors == 'NaN')
                                                Unknown
                                            @else
                                                {{$item->eye_colors}}
                                            @endif
                                        </td>
                                </table>
                            </div>
                    @endif
                    @if($item->component == 'starships')
                        <h1 class="text-4xl text-white">
                            Specs
                        </h1>
                        <div class="shadow overflow-hidden border-b border-gray-400 bg-gray-400 sm:rounded-lg mt-2">
                            <table class="min-w-full bg-gray-700">
                                <thead class="">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Manufacturer
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Cost in Credits
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Hyperdrive Rating
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-gray-400 divide-y divide-gray-400">
                                <tr>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->manufacturer == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->manufacturer}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->cost_in_credits == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->cost_in_credits}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->hyperdrive_rating == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->hyperdrive_rating}}
                                        @endif
                                    </td>
                            </table>
                        </div>
                    @endif
                    @if($item->component == 'vehicles')
                        <h1 class="text-4xl text-white">
                            Specs
                        </h1>
                        <div class="shadow overflow-hidden border-b border-gray-400 bg-gray-400 sm:rounded-lg mt-2">
                            <table class="min-w-full bg-gray-700">
                                <thead class="">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Manufacturer
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Cost in Credits
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                                        Vehicle Class
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-gray-400 divide-y divide-gray-400">
                                <tr>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->manufacturer == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->manufacturer}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->cost_in_credits == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->cost_in_credits}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 max-w-xs">
                                        @if($item->vehicle_class == 'NaN')
                                            Unknown
                                        @else
                                            {{$item->vehicle_class}}
                                        @endif
                                    </td>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col mt-10">
                    @if($item->component == 'characters')
                        <x-progressbar :progress="$item->mass" :stat="'Weight'" class="bg-green-500"/>
                        <x-progressbar :progress="$item->height" :stat="'Height'" class="bg-red-500"/>
                    @endif
                    @if($item->component == 'planets')
                        <x-progressbar :progress="$item->rotation_period" :stat="'Rotation Period'" class="bg-green-500"/>
                        <x-progressbar :progress="round(($item->orbital_period/364)*100)" :stat="'Orbital Period'" class="bg-red-500"/>
                    @endif
                    @if($item->component == 'species')
                        <x-progressbar :progress="$item->average_height" :stat="'Average Height'" class="bg-green-500"/>
                        <x-progressbar :progress="$item->average_lifespan" :stat="'Average Lifespan'" class="bg-red-500"/>
                    @endif
                    @if($item->component == 'starships' or $item->component == 'vehicles')
                        <x-progressbar :progress="$item->max_atmosphering_speed/100" :stat="'Max Speed in the Atmosphere'" class="bg-green-500"/>
                        <x-progressbar :progress="$item->cargo_capacity/10" :stat="'Cargo Capacity'" class="bg-red-500"/>
                    @endif
                </div>
            </div>

                </div>

            </div>
            <div>
            </div>

        </div>

    <div class="bg-gray-700 w-7/12 " style="margin-top: -15%">
        <h1 class="text-2xl text-gray-200 p-1 text-center">
            Little known facts
        </h1>

        <div class="flex justify-between align-center justify-center items-start pl-10 pr-10 pt-6">
            @if($item->component == 'characters')
            <?php
            $text = "Character was born or created in:";
            $unknown = "Unknown";
            ?>
            @if($item->birth_year == 'NaN')
            <x-item-fact :field="$text"
                         :fieldDesc="$unknown"/>
            @else
            <x-item-fact :field="$text"
                            :fieldDesc="$item->birth_year"/>
            @endif

            <?php
            $text = "Character's homeworld:"
            ?>
            @if($item->homeworld == 'NaN')
                <x-item-fact :field="$text"
                             :fieldDesc="$unknown"/>
            @else
                <x-item-fact :field="$text"
                             :fieldDesc="$item->homeworld"/>
            @endif
            @endif
            @if($item->component == 'planets')
                <?php
                $text = "On the planet population is estimated to be:";
                $unknown = "Unknown";
                ?>
                @if($item->population == 'NaN')
                    <x-item-fact :field="$text"
                                 :fieldDesc="$unknown"/>
                @else
                    <x-item-fact :field="$text"
                                 :fieldDesc="$item->population"/>
                @endif

                <?php
                $text = "Planet has that many kilometers in diameter:"
                ?>
                @if($item->diameter == 'NaN')
                    <x-item-fact :field="$text"
                                 :fieldDesc="$unknown"/>
                @else
                    <x-item-fact :field="$text"
                                 :fieldDesc="$item->diameter"/>
                @endif
            @endif
            @if($item->component == 'species')
                <?php
                $text = "Native language of this species is:";
                $unknown = "Unknown";
                ?>
                @if($item->language == 'NaN')
                    <x-item-fact :field="$text"
                                 :fieldDesc="$unknown"/>
                @else
                    <x-item-fact :field="$text"
                                 :fieldDesc="$item->language"/>
                @endif

                <?php
                $text = "Species homeworld is:"
                ?>
                @if($item->homeworld == 'NaN')
                    <x-item-fact :field="$text"
                                 :fieldDesc="$unknown"/>
                @else
                    <x-item-fact :field="$text"
                                 :fieldDesc="$item->homeworld"/>
                @endif
            @endif
            @if($item->component == 'starships' or $item->component == 'vehicles')
                <?php
                $text = "Crew size to operate this starship:";
                $unknown = "Unknown";
                ?>
                @if($item->crew == 'NaN')
                    <x-item-fact :field="$text"
                                 :fieldDesc="$unknown"/>
                @else
                    <x-item-fact :field="$text"
                                 :fieldDesc="$item->crew"/>
                @endif

                <?php
                $text = "Maximum time between docking:"
                ?>
                @if($item->consumables == 'NaN')
                    <x-item-fact :field="$text"
                                 :fieldDesc="$unknown"/>
                @else
                    <x-item-fact :field="$text"
                                 :fieldDesc="$item->consumables"/>
                @endif
            @endif
        </div>

    </div>

    </div>




</div>
