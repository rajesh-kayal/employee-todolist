<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Todo</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="{{ asset('js/script.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>
<body style="background-color: rgba(137, 43, 226, 0.667)">
<div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                <u>Edit Todo</u>
            </div>
        </div>
    </div>
    <!-- Edit todo section -->
    <div class="row m-1 p-3">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('todos.update', $employees->emp_id) }}" method="POST">
                @csrf
                @method('PUT')
                @foreach($employees->tasks as $task)
                <div class="form-group">
                    <label for="employee_name">Employee Name</label>
                    <input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ $employees->name }}">
                </div>
                <div class="form-group">
                    <label for="employee_email">Employee Email</label>
                    <input type="email" class="form-control" id="employee_email" name="employee_email" value="{{ $employees->email }}">
                </div>
                <div class="form-group">
                    <label for="employee_phone">Employee Phone</label>
                    <input type="number" class="form-control" id="employee_phone" name="employee_phone" value="{{ $employees->phone }}">
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" name="department" value="{{ $employees->department }}">
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="task_title">Task Title</label>
                    <input type="text" class="form-control" id="task_title" name="task_title" value="{{ $task->TaskType->task_title }}">
                </div>
                <div class="form-group">
                    <label for="task_description">Task Description</label>
                    <textarea class="form-control" id="task_description" name="task_description" rows="3">{{ $task->TaskType->task_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="deadline_days">Deadline Days</label>
                    <input type="date" class="form-control" id="deadline_days" name="deadline_days" value="{{ $task->deadline_days }}">
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update Todo</button>
            </form>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
