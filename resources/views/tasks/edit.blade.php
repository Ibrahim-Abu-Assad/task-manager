<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
    
        <!-- title input -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>
    
        <!-- description input -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>
    
        <!-- is_completed checkbox -->
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed" value="1"
                   {{ $task->is_completed ? 'checked' : '' }}>
            <label class="form-check-label" for="is_completed">
                Completed
            </label>
        </div>
    
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>

</body>
</html>
