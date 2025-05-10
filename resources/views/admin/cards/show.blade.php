


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}

        </h2>
    </x-slot>

    <div class="py-12">
        @auth
        @if (Auth::user()->email === 'nourallam303@gmail.com')
            <a href="{{ route('admin.cards.create') }}" class="btn btn-primary">
                Admin Panel
            </a>
        @endif
    @endauth

    <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
        <center>


        <div class="card" style="width: 18rem;">
            @if ($card->image)
            <img src="{{ asset('storage/' . $card->image) }}" class="card-img-top"  width="150">
        @endif
            <div class="card-body">
                <h1 class="card-title">{{ $card->title }}</h1>
            </br>

            <p class="card-text">{{ $card->description }}</p>

            @if (Auth::user()->email === 'nourallam303@gmail.com')
            <div style="margin-bottom: 10px;">
                <strong>{{ $card->name }}</strong>

                <br />
                <!-- Delete Form -->
                <form action="{{ route('items.destroy', $card->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this card?');">
                        Delete {{ $card->name }}
                    </button>
                </form>
            </div>
        @endif
            </div>
          </div>
    </div>
    <center/>




    </div>
</x-app-layout>


