<div>
    <h1 class="sro"> {{ __('Création d’un contact')  }} </h1>
    <p class="title--1"> {{ __('Création d’un contact')  }} </p>
    <form class="create-contact__form" method="post"
          action="/contacts"
          enctype="multipart/form-data"
          wire:submit.prevent="save"
    >
        <fieldset>
            <label for="surname"
            >{{ __('Nom') }}</label>
            <input
                wire:model="surname"
                type="text"
                name="surname"
                id="surname">
        </fieldset>
        <fieldset>
            <label
                for="firstname"
            >{{ __('Prénom') }}</label>
            <input
                wire:model="firstname"
                type="text"
                name="firstname"
                id="firstname">
        </fieldset>
        <fieldset>
            <label
                for="email"
            >{{ __('Email') }}</label>
            <input
                wire:model="email"
                type="text"
                name="email"
                id="email">
        </fieldset>
        <fieldset>
            <label for="phoneNumber"
            >{{ __('Numéro de téléphone') }}</label>
            <input
                wire:model="phoneNumber"
                type="text"
                name="phoneNumber"
                id="phoneNumber"
            >
        </fieldset>
        <filedset>
            <input
                type="file"
                name="picutre" id="picture"
                value="Ajouter une image">
        </filedset>

        <input wire:click="saveContactOnContactIndexPage" x-on:click="" type="submit" value="Enregistrer un contact">
    </form>
</div>
