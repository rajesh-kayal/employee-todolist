<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: Employee To-Do List ::</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: rgba(137, 43, 226, 0.667)">
<div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                <u>Employee To-Do List</u>
            </div>
        </div>
    </div>
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-11 mx-auto">
            <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper justify-content-end">
                <div class="col-auto">
                    <a href="{{url('admin/addtodo')}}" class="btn btn-primary btn-sm">Add Todo</a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 mx-4 border-black-25 border-bottom"></div>
    <!-- Todo list section -->
    <div class="row mx-1 px-5 pb-3 w-80">
        <div class="col mx-auto">
            <table id="todo-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>SL/No.</th>
                        <th>Employee Name</th>
                        <th>Task Title</th>
                        <th>Task Description</th>
                        <th>Department</th>
                        <th>Deadline Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach($employees as $employee)
                        @foreach($employee->tasks as $task)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ optional($task->TaskType)->task_title }}</td>
                                <td>{{ optional($task->TaskType)->task_description }}</td>
                                <td>{{ $employee->department }}</td>
                                <td><div class="border rounded p-2 border-success text-light bg-secondary">
        {{ date('d.m.y', strtotime($task->deadline_days)) }}
    </div></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <div class="row">
                                            <div class="col">
                                                <form method="POST" action="{{ route('tasks.update-status', $task->task_id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm{{ $task->task_status === 'pending' ? ' btn-primary' : ' btn-secondary' }}" style="margin-bottom: 5px;" name="status" value="pending">Pending</button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <form method="POST" action="{{ route('tasks.update-status', $task->task_id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm{{ $task->task_status === 'progress' ? ' btn-warning' : ' btn-secondary' }}" style="margin-bottom: 5px;" name="status" value="progress">Progress</button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <form method="POST" action="{{ route('tasks.update-status', $task->task_id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm{{ $task->task_status === 'complete' ? ' btn-success' : ' btn-secondary' }}" style="margin-bottom: 5px;" name="status" value="complete">Complete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('todos.edit', $employee->emp_id) }}" class="btn btn-info btn-sm" ><i class="bi bi-pencil"></i></a>
                                    <a href="{{ route('todos.destroy', $employee->emp_id) }}" class="btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#todo-table').DataTable({
            "paging": true,
            "searching": true,
        });
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Script to display SweetAlert messages -->
<script>
    // Function to display SweetAlert with given message and type
    function showMessage(message, messageType) {
        swal({
            title: messageType,
            text: message,
            icon: messageType,
        });
    }
</script>

<!-- Check for success, error, update, and delete messages and display SweetAlert accordingly -->
@if (session()->has('success'))
    <script>
        showMessage('{{ session()->get('success') }}', 'success');
    </script>
@endif

@if (session()->has('error'))
    <script>
        showMessage('{{ session()->get('error') }}', 'error');
    </script>
@endif

@if (session()->has('update'))
    <script>
        swal({
            title: 'Update',
            text: '{{ session()->get('update') }}',
            icon: 'success',
            button: 'Close'
        });
    </script>
@endif

@if (session()->has('update'))
    <script>
        showMessage('{{ session()->get('update') }}', 'success');
    </script>
@endif

@if (session()->has('delete'))
    <script>
        showMessage('{{ session()->get('delete') }}', 'success');
    </script>
@endif
</body>
</html>
