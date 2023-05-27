<div class="progress" >
    <div style="{{'--width: ' . $progress}} " {{ $attributes->merge(['class' => 'drop-shadow-lg progress-value']) }}></div>

    <div class="absolute text-sm text-left p-2 text-white drop-shadow-lg">
        {{$stat}} {{$progress}}
    </div>
</div>
