<label class="w-36 flex flex-col items-center mx-3 py-3 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-rose-600 hover:border-current hover:text-white">
    <svg class="w-8 h-8" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>

    <span class="mt-2 text-base leading-normal">Delete</span>
    <form method="POST" action="/users/{{Auth::user()->id}}">
        @method('DELETE')
        @csrf
        <input name="deleteButton" type="submit" onclick="return confirm('Are you sure you want to delete your account?')" class="hidden" />
    </form>

</label>
