@props(['employer','width' => 100])

<img {{ $attributes->merge(['class' => 'rounded-xl']) }} src="{{ Storage::url($employer->logo) }}"  alt="img">