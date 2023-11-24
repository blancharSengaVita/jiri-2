<x-app-layout>
    <x-slot:title>
        {{ __('Création de Jiri') }}
    </x-slot:title>

    <form method="post"
          action="/jiri"
          enctype="multipart/form-data"
          x-data="{'isModalOpen': false}"
          x-on:submit.prevent="{'isModalOpen': true}"
          x-on:keydown.escape="isModalOpen=false"
          @click="console.log('isModalOpen')">

        <div class="field">
            <label for="jiriName"> le nom du jiri </label>
            <input id="jiriName" name="jiriName" >
        </div>

        <div class="field">
            <label for="jiriDate"> la date du jiri </label>
            <input id="jiriDate" name="jiriDate" >
        </div>

        <button x-on:click="isModalOpen = true"> Ajouter des étudiants </button>

        <div class="modal"
             role="dialog"
             tabindex="-1"
             x-show="isModalOpen"
             x-on:click.away="isModalOpen = false"
             x-cloak
             x-transition >
        </div>

        <button type="submit" >
            Enregistrer le jury
        </button>
    </form>
</x-app-layout>
