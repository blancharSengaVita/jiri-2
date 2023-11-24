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

            <button x-on:click="isModalOpen = true">ajouter un contact</button>

            <div
                class="modal"
                role="dialog"
                tabindex="-1"
                x-show="isModalOpen"
{{--                x-on:click="isModalOpen = false"--}}
                x-transition
            >
                <livewire:add-contact/>
            </div>

            <button wire:click="save" type="submit">
                Enregistrer le jury
            </button>
        </div>


    </form>
</div>
