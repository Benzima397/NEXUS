@props(['href' => null, 'hover' => true, 'padding' => true])

@php
    $tag = $href ? 'a' : 'div';
    $hrefAttr = $href ? 'href="' . $href . '"' : '';
    $classes = 'rounded-2xl glass transition-all duration-300 ' . ($hover ? 'hover:border-nexus-border-hover hover:bg-white/[0.04]' : '') . ($padding ? ' p-6' : ' p-0') . ' ' . ($attributes->get('class', ''));
@endphp

<{{ $tag }} {{ $hrefAttr }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $tag }}>
