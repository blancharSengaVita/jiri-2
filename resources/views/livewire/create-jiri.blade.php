<div>
    <form method="post"
          action="/jiri"
          enctype="multipart/form-data"
          x-data="{'isModalOpen': false}"
          x-on:keydown.escape="isModalOpen=false"
          wire:click.prevent="save"
    >
        <div>
            <div  class="field">
                <label for="jiriName"> le nom du jiri </label>
                <input  wire:model.live="jiriName" id="jiriName" name="jiriName">
            </div>

            <div class="field">
                <label for="jiriDate"> la date du jiri </label>
                <input wire:model.live="jiriDate" id="jiriDate" name="jiriDate">
            </div>

            <button wire:click="save" type="submit">
                Enregistrer les infos
            </button>
        </div>


        {{-- Partie qui permet d'ajouter un contact au jury --}}
        {{--        <button type="button" x-on:click="isModalOpen = true"> Ajouter des étudiants</button>--}}
        {{--        <div class="modal"--}}
        {{--             role="dialog"--}}
        {{--             tabindex="-1"--}}
        {{--             x-show="isModalOpen"--}}
        {{--          mettre le    x-on:click.away="isModalOpen = false"--}}
        {{--             x-cloak--}}
        {{--             x-transition >--}}
        {{--            <livewire:add-contact/>--}}
        {{--            azerazerazer--}}
        {{--        </div>--}}

        <button type="submit">
            Enregistrer le jury
        </button>
    </form>
</div>
