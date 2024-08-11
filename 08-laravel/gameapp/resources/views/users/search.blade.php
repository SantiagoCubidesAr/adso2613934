@forelse ($users as $user)
<article class="record">
    <figure class="avatar">
        <img class="mask" src="{{ asset('images/photo.jpg') }}" alt="Photo" />
        <img class="border" src="{{ asset('images/border-small.svg') }}" alt="Border" />
    </figure>
    <aside>
        <h3>{{ $user->fullname }}</h3>
        <h4>{{ $user->role }}</h4>
    </aside>
    <figure class="actions">
        <a href="{{ url('users/' . $user->id) }}">
            <img src="{{ asset('images/ico-search.svg') }}" alt="Show" />
        </a>
        <a href="{{ url('users/' . $user->id . '/edit') }}">
            <img src="{{ asset('images/ico-edit.svg') }}" alt="Edit" />
        </a>
        <a href="javascript:;" class="delete" data-fullname="{{ $user->fullname }}">
            <img src="{{ asset('images/ico-trash.svg') }}" alt="Delete" />
        </a>
        <form action="{{ url('users/' . $user->id) }}" method="post" style="display: none">
            @csrf
            @method('delete')
        </form>
    </figure>
</article>
@empty
    No found 🥵
@endforelse