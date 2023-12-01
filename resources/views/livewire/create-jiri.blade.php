<div>
    <form method="post"
          action="/jiri"
          enctype="multipart/form-data"
          x-data="{
          'isStudentModalOpen': false,
          'isEvaluatorModalOpen': false,
          }"
          x-on:keydown.escape="isModalOpen=false"
          wire:click.prevent="save"
    >
        <div class="field">
            <label for="jiriName"> le nom du jiri </label>
            <input wire:model.live="jiriName" id="jiriName" name="jiriName">
        </div>

        <div class="field">
            <label for="jiriDate"> la date du jiri </label>
            <input wire:model.live="jiriDate" id="jiriDate" name="jiriDate">
        </div>


        <button x-on:click="isStudentModalOpen = true">ajouter un contact</button>
        <div
            class="modal"
            role="dialog"
            tabindex="-1"
            x-show="isStudentModalOpen"
            x-transition
        >
            <livewire:add-contact
                :role="'student'"
                :jiriId="$jiriId"
                :modal="'isStudentModalOpen'"
            />
        </div>
        <livewire:show-contact
            :role="'student'"
            :jiriId="$jiriId"
        />


        <button x-on:click="isEvaluatorModalOpen = true">ajouter un contact</button>
        <div
            class="modal"
            role="dialog"
            tabindex="-1"
            x-show="isEvaluatorModalOpen"

            x-transition
        >
            <livewire:add-contact
                :role="'evaluator'"
                :jiriId="$jiriId"
                :modal="'isEvaluatorModalOpen'"
            />
        </div>
        <livewire:show-contact
            :jiriId="$jiriId"
            :role="'evaluator'"
        />

        <button type="submit">
            Enregistrer le jury
        </button>

    </form>
</div>
