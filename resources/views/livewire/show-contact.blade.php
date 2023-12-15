<div class="show-contact">
    <ul class="show-contact__list">
{{--        @if(!$contacts)--}}
{{--            <p> Aucun {{ __($role) }} n'a été ajouté</p>--}}
{{--        @endif--}}
        @foreach($contacts as $contact)
            <li class="show-contact__item contact">
                    <p class="contact__name">
                        {{ $contact->name }}
                    </p>
            </li>
        @endforeach
    </ul>
</div>
