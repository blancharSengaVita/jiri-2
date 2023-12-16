<div class="create-contact">
    <div class="create-contact__container">
        <h1 class="sro"> {{ __('Création d’un projet')  }} </h1>
        <p class="title--1"> {{ __('Création d’un projet')  }} </p>
        <form class="create-projet__form" method="post"
              action="/projets"
              enctype="multipart/form-data"
              wire:submit.prevent="save"
        >
            <fieldset>
                <label for="name"
                >{{ __('Nom du projet') }}</label>
                <input
                    wire:model="name"
                    type="text"
                    name="name"
                    id="name">
            </fieldset>
            <fieldset>
                <label
                    for="description"
                >{{ __('description') }}</label>
                <textarea wire:model="description"
                          type="description"
                          name="description"
                          id="description"></textarea>
            </fieldset>

            <label class="create-contact__label" for="addLinks">
                le nom des liens qui seront attribués aux projets
                <svg class="button__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M14 7v1H8v6H7V8H1V7h6V1h1v6z"/></svg>
                <input class="display-none" id="addLinks" type="button" value="le nom des liens qui seront attribués aux projets"wire:click="addLinkInput">
            </label>


{{--            <button class="button" id="addLinks" type="button" wire:click="addLinkInput">--}}
{{--                le nom des liens qui seront attribués aux projets--}}
{{--            </button>--}}

            @foreach($linkInputs as $key => $input)
                <div wire:key="{{ $key }}">
                    <label for="input_{{$key}}_link"> Link </label>
                    <input type="text" id="input_{{$key}}_link" wire:model.live="linkInputs.{{$key}}.link">
                    @error('linkInputs.' .$key. '.link') <span>{{ $message }}</span> @enderror
                    @if($key > 0)
                        <div wire:click="removeLinkInput({{$key}})">
                            <p>Remove Input</p>
                        </div>
                    @endif
                </div>
            @endforeach

            <label for="saveProject">
                <input class="display-none" id="saveProject" type="submit" value="Enregistrer un projet">
            </label>

        </form>
    </div>
</div>
