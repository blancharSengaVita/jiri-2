@props(['active'])

@php
$classes = ($active ?? false) ? 'nav__link--active' : '';
@endphp

<a class="nav__link {{$classes}}" >
    {{ $slot }}
</a>
