<x-app-layout>
    <x-slot:title>
        {{ __('Création de Jiri') }}
    </x-slot:title>

    <form method="post" action="/notes" enctype="multipart/form-data">
        <div class="field">
            <label for="jiriName"> le nom du jiri </label>
            <input id="jiriName" name="jiriName" >
        </div>

        <div class="field">
            <label for="jiriDate"> la date du jiri </label>
            <input id="jiriDate" name="jiriDate" >
        </div>

        <button> Ajouter des étudiants</button>

        <button type="submit">
            Enregistrer le jury
        </button>
    </form>
</x-app-layout>
