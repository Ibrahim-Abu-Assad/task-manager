<a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
</form>
