@foreach ($items as $item)
    <p>{{ $item->name }}</p>
    @if (Auth::user()->email === 'Nourallam303@gmail.com')
        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    @endif
@endforeach
