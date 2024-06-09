@extends('layouts.app')

@section('title', 'Edit Note')

@section('content')
    <div class="container">
        <h1>Edit Note</h1>
        <form id="edit-note-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $note->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="5" required>{{ $note->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#edit-note-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('notes.update', $note->id) }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Note updated successfully!');
                        window.location.href = '{{ route('notes.index') }}';
                    },
                    error: function(response) {
                        alert('An error occurred while updating the note.');
                    }
                });
            });
        });
    </script>
@endsection
