<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="flex align-center justify-center items-center ">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />



        <form method="POST" action="{{ route('change-password.store') }}">
            @csrf

            <div>
                <x-label for="password" :value="__('Current Password')" class="text-lg font-bold"/>

                <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('New Password') " class="text-lg font-bold" />

                <x-input id="new_password" class="block mt-1 w-full"
                         type="password"
                         name="new_password"
                         autocomplete="current-password" />
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('Confirm New Password')" class="text-lg font-bold" />

                <x-input id="new_confirm_password" class="block mt-1 w-full"
                         type="password"
                         name="new_confirm_password"
                         autocomplete="current-password" />
            </div>
            <div class="p-3"></div>
            <x-button class="">
                {{ __('Update Password') }}
            </x-button>
        </form>


    </x-auth-card>
</x-guest-layout>


