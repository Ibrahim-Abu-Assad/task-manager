<!DOCTYPE html>
<html>
<head>
    <title>Show Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1>{{ $task->title }}</h1>

    <p><strong>Description:</strong></p>
    <p>{{ $task->description }}</p>

    <p><strong>Status:</strong>
        @if ($task->is_completed)
            <span class="badge bg-success">Completed</span>
        @else
            <span class="badge bg-warning text-dark">Not Completed</span>
        @endif
    </p>

    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>

</body>
</html>
