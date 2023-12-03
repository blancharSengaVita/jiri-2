<div class="create-jiri">
    <h1 class="sro"> {{ __('Création d’un jury')  }} </h1>
    <p class="title--1"> {{ __('Création d’un jury')  }} </p>
    <form class="create-jiri__form" method="post"
          action="/jiri"
          enctype="multipart/form-data"
          x-data="{
          'isStudentModalOpen': false,
          'isEvaluatorModalOpen': false,
          'isProjectModalOpen': false,
          }"
          x-on:keydown.escape="
          isStudentModalOpen = false,
          isEvaluatorModalOpen = false,
          'isProjectModalOpen': false,
          "
          wire:click.prevent="save"
    >
        <h2 class="sro">  {{ __('information du jury')  }} </h2>
        <p class="title--2">
            {{ __('information du jury')  }}
        </p>
        <fieldset class="create-jiri__fieldset">
            <div class="create-jiri__field">
                    <label for="jiriName"> {{ __('Le nom du jiri') }} </label>
                    <input type="text" wire:model.blur="jiriName" id="jiriName" name="jiriName">
                <div>@error('jiriName') {{ $message }} @enderror</div>
            </div>

            <div class="create-jiri__field">
                <label for="jiriDate"> {{ __('La date du Jiri') }} </label>
                <input type="text" wire:model="jiriDate" id="jiriDate" name="jiriDate">
            </div>
        </fieldset>

        <h2 class="sro">  {{ __('Étudiants ajoutés au jiri')  }} </h2>
        <p class="title--2">
            {{ __('Étudiants ajoutés au jiri')  }}
        </p>
        <fieldset class="create-jiri__fieldset" x-on:click.outside="isStudentModalOpen=false">
            <button x-on:click="isStudentModalOpen = true">ajouter un Étudiant</button>
            <div>@error('jiriName') {{ $message }} @enderror</div>
            @if(!$errors->any())
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
            @endif
        </fieldset>

        <h2 class="sro">  {{ __('Évaluateurs ajoutés au jiri')  }} </h2>
        <p class="title--2">
            {{ __('Évaluateurs ajoutés au jiri')  }}
        </p>
        <fieldset class="create-jiri__fieldset" x-on:click.outside="isEvaluatorModalOpen=false">
            <button wire:click="assertThatJiriNameIsValidate()" x-on:click="isEvaluatorModalOpen = true">ajouter un Évaluateur </button>

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
        </fieldset>

        <h2 class="sro">  {{ __('Projets ajoutés au jiri')  }} </h2>
        <p class="title--2">
            {{ __('Projets ajoutés au jiri')  }}
        </p>
        <fieldset class="create-jiri__fieldset" x-on:click.outside="isProjectModalOpen=false">
            <button x-on:click="isProjectModalOpen = true">ajouter un contact</button>
            <div
                class="modal"
                role="dialog"
                tabindex="-1"
                x-show="isProjectModalOpen"
                x-transition
            >
                <livewire:add-project/>
            </div>

            <livewire:show-contact
                :jiriId="$jiriId"
                :role="'evaluator'"
            />
        </fieldset>

        <button type="submit">
            Enregistrer le jury
        </button>

    </form>
</div>
