@props(['active'])

@php
//$classes = ($active ?? false)  ? : ;
@endphp

<a>
    {{ $slot }}
</a>
