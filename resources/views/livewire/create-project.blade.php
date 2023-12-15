<div>
    <h1 class="sro"> {{ __('Création d’un projet')  }} </h1>
    <p class="title--1"> {{ __('Création d’un projet')  }} </p>
    <form class="create-projet__form" method="post"
          action="/projets"
          enctype="multipart/form-data"
          wire:submit.prevent="save"
          x-data="{  numberOfInput: 0  }"
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

        <button type="button" wire:click="addLinkInput">
            le nom des liens qui seront attribués aux projets
        </button>

        @foreach($linkInputs as $key => $input)
            <div wire:key="{{ $key }}">
                <label for="input_{{$key}}_link"> Link </label>
                <input type="text" id="input_{{$key}}_link" wire:model.live="linkInputs.{{$key}}.link">
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $errors }}</li>--}}
{{--                @endforeach--}}
                @error('linkInputs.' .$key. '.link') <span>{{ $message }}</span> @enderror
                @if($key > 0)
                    <div wire:click="removeLinkInput({{$key}})">
                        <p>Remove Input</p>
                    </div>
                @endif
            </div>
        @endforeach

        <input type="submit" value="Enregistrer un projet">
    </form>
</div>
