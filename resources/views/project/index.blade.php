<x-app-layout>
    <x-slot:title>
        {{ __('Liste des projets') }}
    </x-slot:title>

    <table>
        <thead>
        <th>

        </th>
        </thead>
        <tbody>
            @foreach($user->projects as $project)
                <tr>
                    <td>{{ $project->name  }}</td>
                    <td> <a href="/projets/{{ $project->id }}"> modifier </a>
                        <form action="/projets/{{ $project->id }}" method="post">
                            <button  type="submit">
                                @csrf
                                @method('delete')
                                delete
                            </button>
                        </form> </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>
