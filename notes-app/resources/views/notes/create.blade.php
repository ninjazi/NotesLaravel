@extends('layouts.app')

@section('title', 'Create Note')

@section('content')
    <div class="container">
        <h1>Create Note</h1>
        <form id="create-note-form">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#create-note-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('notes.store') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Note created successfully!');
                        window.location.href = '{{ route('notes.index') }}';
                    },
                    error: function(response) {
                        alert('An error occurred while creating the note.');
                    }
                });
            });
        });
    </script>
@endsection
