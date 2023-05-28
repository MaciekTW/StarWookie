<label class="w-36 flex flex-col items-center mx-3 py-3 bg-white text-black rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-sky-300 hover:border-current hover:text-white">
    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
    <span class="mt-2 text-base leading-normal">Password</span>
    <form method="GET" action="/change-password">
        @csrf
        <input name="Password" type="submit" class="hidden" />
    </form>
</label>
