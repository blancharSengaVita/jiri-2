<div>
    <ul>
        @foreach($contacts as $contact)
            <li>
                <p>
                    {{ $contact->name }}
                </p>
            </li>
        @endforeach
    </ul>
</div>
