<div class="create-contact create-project">
    <div class="create-contact__container create-project__container">
        <h1 class="sro"> {{ __('Création d’un projet')  }} </h1>
        <p class="title--1"> {{ __('Création d’un projet')  }} </p>
        <form class="create-project__form" method="post"
              action="/projets"
              enctype="multipart/form-data"
              wire:submit.prevent="save"
        >
            <fieldset class="create-project__fieldset">
                <label class="create-project__label" for="name"
                >{{ __('Nom du projet') }}</label>
                <input
                    class="create-project__input"
                    wire:model="name"
                    type="text"
                    name="name"
                    id="name">
            </fieldset>
            <fieldset class="create-project__fieldset">
                <label
                    class="create-project__label"
                    for="description"
                >{{ __('Description') }}</label>
                <textarea
                    class="create-project__textarea"
                    wire:model="description"
                    type="description"
                    name="description"
                    id="description"></textarea>
            </fieldset>

            <fieldset class="create-projet__fieldset">
                <label class="create-project__label " for="addLinks">
                    Le nom des liens qui seront attribués aux projets
                    <svg class="create-project__svg addLink button__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M14 7v1H8v6H7V8H1V7h6V1h1v6z"/>
                    </svg>

                    <input class="display-none create-project__input" id="addLinks" type="button" value="le nom des liens qui seront attribués aux projets" wire:click="addLinkInput">
                </label>


                {{--                nommer les les--}}
                @foreach($linkInputs as $key => $input)
{{--                    @json($input)--}}
                    <fieldset class="create-project__fieldset--sub" wire:key="{{ $key }}">
                        <div class="create-project__field--sub">
                            <input class="create-project__input--sub" type="text" id="input_{{$key}}_link" wire:model.live="linkInputs.{{$key}}.link">

                            @if($key > 0)
                                <svg class="create-project__input--sub button__icon"
                                     wire:click="removeLinkInput({{$key}})" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path fill="currentColor" fill-rule="evenodd" d="m8 8.707l3.646 3.647l.708-.707L8.707 8l3.647-3.646l-.707-.708L8 7.293L4.354 3.646l-.707.708L7.293 8l-3.646 3.646l.707.708z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </div>
                        <div class="create-project__error">
                            @error('linkInputs.' .$key. '.link') <p>{{ $message }}</p> @enderror
                        </div>
                    </fieldset>

                @endforeach
            </fieldset>
            <button class="button" for="saveProject">
                <input class="display-none" id="saveProject" type="submit" value="Enregistrer un projet">
                Enregistrer le project
            </button>
        </form>
    </div>
</div>
