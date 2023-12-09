<div>
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

        <fieldset>

        </fieldset>

        <fieldset>

        </fieldset>


        <input type="submit" value="Enregistrer un projet">
    </form>
</div>
