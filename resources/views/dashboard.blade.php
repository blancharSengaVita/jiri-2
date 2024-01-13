<x-app-layout>
    <x-slot:title>
        {{ __('Dashboard') }}
    </x-slot:title>

    @if(session()->get('jiriId'))
        <p class="title--1" > {{ __('Aucun Jury pour l\'instant')  }} </p>
        <div class="dashboard">
            JIRI EN COURS
            <div>
                @if(!empty($contacts))
                    @foreach($contacts as $contact)
                        <div>
                            <a href=""> {{ $contact->contact->name  }} </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @else
        <p class="title--1" > {{ __('Aucun Jury pour l\'instant')  }} </p>
        <div class="dashboard">
            <div class="box dashboard__">
                <p class="dashboard__text--no-jury" > {{ __('Aucun Jiri n’a été créer, voulez-vous un créer un ?')  }} </p>
                <a class="dashboard__button" href="jiries/create"> {{ __('En créer')  }}  </a>
            </div>
        </div>
    @endif


</x-app-layout>
