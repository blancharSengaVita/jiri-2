x<div class="create-jiri">
    <h1 class="sro"> {{ __('Création d’un jury')  }} </h1>
    <p class="title--1"> {{ __('Création d’un jury')  }} </p>
    <form class="create-jiri__form" method="post"
          action="/jiries"
          enctype="multipart/form-data"
          x-data="{
          'isStudentModalOpen': false,
          'isEvaluatorModalOpen': false,
          'isProjectModalOpen': false,
          }"
          x-on:keydown.escape="
          isStudentModalOpen = false;
          isEvaluatorModalOpen = false;
          isProjectModalOpen = false;
          "
          wire:submit.prevent="save"
    >

        <h2 class="sro">  {{ __('information du jury')  }} </h2>
        <p class="title--2">
            {{ __('Information du jury')  }}
        </p>

        <fieldset class="create-jiri__fieldset">
            <div class="create-jiri__field">
                <label for="jiriName"> {{ __('Le nom du jiri') }} </label>
                <input type="text" wire:model="jiriName" id="jiriName" name="jiriName">
                <div>@error('jiriName') {{ $message }} @enderror</div>
            </div>

            <div class="create-jiri__field">
                <label for="jiriDate"> {{ __('La date du Jiri') }} </label>
                <input type="date" wire:model="jiriDate" id="jiriDate" name="jiriDate">
            </div>

            <button type="submit">
                Enregistrer le jury
            </button>
        </fieldset>

        <h2 class="sro">  {{ __('Étudiants ajoutés au jiri')  }} </h2>
        <p class="title--2">
            {{ __('Étudiants ajoutés au jiri')  }}
        </p>
        <fieldset class="create-jiri__fieldset" x-on:click.outside="isStudentModalOpen=false">

            <div>@error('jiriName') {{ $message }} @enderror</div>

            @if(!$errors->any())
                <div
                    class="modal"
                    role="dialog"
                    tabindex="-1"
                    x-cloak x-show="isStudentModalOpen"
                    x-transition
                >
                    <livewire:add-contact
                        :role="'student'"
                        :jiriId="$jiriId"
                        :modal="'isStudentModalOpen'"
                    />
                </div>
            @endif
            <livewire:show-contact
                :role="'student'"
                :jiriId="$jiriId"
            />
            <button class="add-contact__button" x-on:click="isStudentModalOpen = true">Ajouter/retirer un Étudiant
            </button>
        </fieldset>

        <h2 class="sro">  {{ __('Évaluateurs ajoutés au jiri')  }} </h2>
        <p class="title--2">
            {{ __('Évaluateurs ajoutés au jiri')  }}
        </p>
        <fieldset class="create-jiri__fieldset">
            <div>@error('jiriName') {{ $message }} @enderror</div>
            @if(!$errors->any())
                <div
                    class="modal"
                    role="dialog"
                    tabindex="-1"
                   x-cloak x-show="isEvaluatorModalOpen"
                    x-transition
                >
                    <livewire:add-contact
                        :role="'evaluator'"
                        :jiriId="$jiriId"
                        :modal="'isEvaluatorModalOpen'"
                    />
                </div>
            @endif
            <livewire:show-contact
                :jiriId="$jiriId"
                :role="'evaluator'"
            />
            <button class="add-contact__button" x-on:click="isEvaluatorModalOpen = true">Ajouter/retirer un Évaluateur
            </button>
        </fieldset>

        <h2 class="sro">  {{ __('Projets ajoutés au jiri')  }} </h2>
        <p class="title--2">
            {{ __('Projets ajoutés au jiri')  }}
        </p>
        <fieldset class="create-jiri__fieldset">
            <div>@error('jiriName') {{ $message }} @enderror</div>
            @if(!$errors->any())
                <div
                    class="modal"
                    role="dialog"
                    tabindex="-1"
                    x-cloak x-show="isProjectModalOpen"
                    x-transition
                >
                    <livewire:add-project :modal="'isProjectModalOpen'" :jiriId="$jiriId" />
                </div>
            @endif

            <livewire:show-project
                :jiriId="$jiriId"
                :weightings="$weightings"
            />
            <button class="add-contact__button" x-on:click="isProjectModalOpen = true">Ajouter/retirer un Projet
            </button>
        </fieldset>
    </form>
</div>
