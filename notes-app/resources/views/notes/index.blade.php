@extends('layouts.app')

@section('title', 'Your Notes')

@section('content')
    <div class="container">
        <h1>Your Notes</h1>
        <a href="{{ route('notes.create') }}" class="btn btn-success mb-3">Create Note</a>
        <div id="notes-list">
            @foreach($notes as $note)
                <div class="card mt-3" id="note-{{ $note->id }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $note->title }}</h5>
                        <p class="card-text">{{ $note->content }}</p>
                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger delete-note" data-id="{{ $note->id }}">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-note').on('click', function() {
                var noteId = $(this).data('id');
                var token = '{{ csrf_token() }}';

                $.ajax({
                    url: '/notes/' + noteId,
                    method: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: token,
                    },
                    success: function(response) {
                        alert('Note deleted successfully!');
                        $('#note-' + noteId).remove();
                    },
                    error: function(response) {
                        alert('An error occurred while deleting the note.');
                    }
                });
            });
        });
    </script>
@endsection
