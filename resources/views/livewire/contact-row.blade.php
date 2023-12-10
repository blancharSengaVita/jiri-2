 <tr>
    <td> Image à mettre</td>
    <td> {{ $contact->name }} </td>
    <td> {{ $contact->phone }} </td>
    <td> {{ $contact->email }} </td>
    <td>
        <button x-on:click="isCreateContactModalOpen = true" wire:click="giveThisId({{ $contact->id}})"> Modifier et ouvrir la modale d'ouverture </button>
        <a href="/contacts/{{ $contact->id }}"> modifier </a>
        <form action="/contacts/{{ $contact->id }}" method="post">
            <button type="submit">
                @csrf
                @method('delete')
                delete
            </button>
        </form>
    </td>
 </tr>

