<div
    x-data="{
          'isCreateContactModalOpen': false,
          'isModifyContactModalOpen': false,
          'eventId' : '',
          }"
     x-on:keydown.escape="
          isCreateContactModalOpen = false;
          isModifyContactModalOpen = false;
          "
>
    <table>
        <thead>
        <th>

        </th>
        </thead>
        <tbody   >
        @foreach($user->contacts as $contact)
            <livewire:contact-row key="$contact->id" :$contact/>
        @endforeach
        </tbody>
    </table>

    <button x-on:click="isCreateContactModalOpen = true"> Créer un contact</button>
    <div x-show="isCreateContactModalOpen">
        <livewire:create-contact/>
    </div>

{{--    <div--}}
{{--        x-on:giveThisId="isModifyContactModalOpen = true"--}}
{{--        x-show="isModifyContactModalOpen">--}}
{{--        <livewire:create-contact/>--}}
{{--    </div>--}}
</div>
