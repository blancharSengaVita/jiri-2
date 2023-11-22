@props(['messages'])

@if ($messages)
    <ul class="field__container" >
        @foreach ((array) $messages as $message)
            <li class="field__error auth__error error">{{ $message }}</li>
        @endforeach
    </ul>
@endif
