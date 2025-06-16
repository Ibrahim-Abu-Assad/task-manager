<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    <link rel="icon"
        href="https://www.google.com/imgres?q=icon%20task%20manager&imgurl=https%3A%2F%2Fwww.kindpng.com%2Fpicc%2Fm%2F391-3916045_task-management-task-management-icon-hd-png-download.png&imgrefurl=https%3A%2F%2Fwww.kindpng.com%2Fimgv%2FhTRxobo_task-management-task-management-icon-hd-png-download%2F&docid=orAKe7Vw1NbIbM&tbnid=wpj3eKpulW4L4M&vet=12ahUKEwjZg8m9-JiNAxWs8LsIHSI8Mos4FBAzegQIVRAA..i&w=860&h=1060&hcb=2&ved=2ahUKEwjZg8m9-JiNAxWs8LsIHSI8Mos4FBAzegQIVRAA">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h1 class="mb-4">Task Manager</h1>

    {{-- روابط التنقل --}}
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">All</a>
        <a href="{{ route('tasks.index', ['completed' => 1]) }}" class="btn btn-outline-success">Completed</a>
        <a href="{{ route('tasks.index', ['completed' => 0]) }}" class="btn btn-outline-warning">Not Completed</a>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary float-end">+ New Task</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div id="app">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if ($task->is_completed)
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-warning text-dark">Not Completed</span>
                            @endif
                        </td>
                        <td>@include('tasks.partials.buttons', ['task' => $task])</td>
                        <td>
                            <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onchange="this.form.submit()"
                                        {{ $task->is_completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</body>

</html>
