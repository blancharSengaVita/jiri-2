<div class="create-contact">
    <div class="create-contact__container">
        <h1 class="sro"> {{ __('Création d’un contact')  }} </h1>
        <p class="title--1"> {{ __('Création d’un contact')  }} </p>
        <form class="create-contact__form" method="post"
              action="/contacts"
              enctype="multipart/form-data"
              wire:submit.prevent="save"
        >
            <fieldset class="create-contact__fieldset">
                <label for="surname"
                >{{ __('Nom') }}</label>
                <input
                    wire:model="surname"
                    type="text"
                    name="surname"
                    id="surname">
                @error('surname')
                {{ $message }}
                @enderror
            </fieldset>

            <fieldset class="create-contact__fieldset">
                <label
                    for="firstname"
                >{{ __('Prénom') }}</label>
                <input
                    wire:model="firstname"
                    type="text"
                    name="firstname"
                    id="firstname">
            </fieldset>
            <fieldset class="create-contact__fieldset">
                <label
                    for="email"
                >{{ __('Email') }}</label>
                <input
                    wire:model="email"
                    type="text"
                    name="email"
                    id="email">
            </fieldset>
            <fieldset class="create-contact__fieldset">
                <label for="phoneNumber"
                >{{ __('Numéro de téléphone') }}</label>
                <input
                    wire:model="phoneNumber"
                    type="text"
                    name="phoneNumber"
                    id="phoneNumber"
                >
            </fieldset>

            <filedset class="create-contact__fieldset">
                <label
                    class="create-contact__upload"
                    for="picture">
                    Ajouter une image
                    <input
                        class="inputTypeFile"
                        type="file"
                        name="picture" id="picture"
                        value="Ajouter une image">
                </label>
            </filedset>

            <button
                type="submit">
                Enregistrer un contact
            </button>
        </form>
    </div>
</div>
