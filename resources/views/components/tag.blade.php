@props(['tag', 'size' => 'base'])

@php
    $classes = 'bg-white/10 rounded-xl  font-bold hover:bg-white/25 transition';

    if($size == 'small'){
        $classes .= ' px-3 py-1 text-2xs';
    }

    if($size == 'base'){
        $classes .= ' px-5 py-1 text-sm';
    }
@endphp

<a class="{{$classes}}" href="/tags/{{ strtolower($tag->name) }}">{{ $tag->name }}</a>