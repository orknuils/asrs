
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}

        </h2>
    </x-slot>


    <center>
        <br/>
        <form action="{{ route('admin.cards.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Field -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" required id="title">
            </div>

            <!-- Description Field -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="3" id="description"></textarea>
            </div>

            <!-- Image Upload Field -->
            <div class="form-group">
                <!-- File input with Bootstrap classes for better styling -->
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image" required>
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <center />
        </div>
</x-app-layout>
