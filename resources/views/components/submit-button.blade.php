
<label class="w-36 flex flex-col items-center mx-3 py-3 bg-white text-black rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-sky-300 hover:border-current hover:text-white">
    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
    </svg>
    <span class="mt-2 text-base leading-normal">{{$text}}</span>
    <form action="/photo-change" method="POST" enctype="multipart/form-data">
        @csrf

        <input type='file' name='image' class="hidden" onchange="this.form.submit()"/>
    </form>

</label>
