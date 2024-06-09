@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 id="form-title">Create Note</h1>
        <form id="note-form">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('note-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const title = document.getElementById('title').value;
            const content = document.getElementById('content').value;

            fetch('/api/notes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                },
                body: JSON.stringify({ title, content })
            })
                .then(response => response.json())
                .then(data => {
                    // Redirect to notes page
                    window.location.href = '/notes';
                });
        });
    </script>
@endpush
