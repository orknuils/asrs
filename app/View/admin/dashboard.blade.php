@extends('layouts.app')

@section('content')
<form action="{{ route('admin.cards.store') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRF token for security -->

    <label for="title">Card Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>

    <!-- File upload field -->
    <label for="image">Image (optional):</label>
    <input type="file" id="image" name="image">

    <button type="submit">Create Card</button>
</form>

<!-- Display success message -->
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Display validation errors -->
@if($errors->any())
    <ul style="color: red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection
