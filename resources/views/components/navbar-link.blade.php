<a href="{{ url('/' . $dest ) }}" {{ $attributes->merge(['class' => 'px-3 text-xl text-white btn']) }}>
    {{ $slot }}
</a>
