<div>
    <ul>
        @foreach($contacts as $contact)
            <li>
                <p>
                    {{ $contact->name }}
                </p>
            </li>
        @endforeach
        <p>azerazer</p>
    </ul>
</div>
