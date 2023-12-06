<x-app-layout>
    <x-slot:title>
        {{ __('Liste des contact') }}
    </x-slot:title>





    <table>
        <thead>
        <th>

        </th>
        </thead>
        <tbody>
        @foreach($user->contacts as $contact)
        <tr>
            <td> image à mettre </td>
            <td> {{ $contact->name }} </td>
            <td> {{ $contact->phone }} </td>
            <td> {{ $contact->email }} </td>
            <td>
                <a href="/contacts/{{ $contact->id }}"> modifier </a>
                <form action="/contacts/{{ $contact->id }}" method="post">
                    <button  type="submit">
                        @csrf
                        @method('delete')
                        delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</x-app-layout>
