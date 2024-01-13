<div class="show-contact">
    <ul class="show-contact__list">
        @foreach($this->dutiesAddedToJiri as $key => $duties)

            <li class="show-contact__item contact">
                <p class="contact__name contact__name--projects">
                    {{ $duties->project->name }}
                </p>
                <div class="contact__container">
                    <label class="contact__label" for="">
                        Pondération
                    </label>
                    <input class="contact__input" wire:model.live="$parent.weightings.{{$duties->id}}">
                </div>
            </li>
        @endforeach
    </ul>
</div>
