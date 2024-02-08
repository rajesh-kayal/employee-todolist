<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: Employee Todo list ::</title>
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
                <u>Employee Todo-s</u>
            </div>
        </div>
    </div>
    <!-- Add todo section -->
    <div class="row m-1 p-3">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="employee_name">Employee Name</label>
                    <input type="text" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name" placeholder="Enter employee name">
                    @error('employee_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="employee_email">Employee Email</label>
                    <input type="email" class="form-control @error('employee_email') is-invalid @enderror" id="employee_email" name="employee_email" placeholder="Enter employee email">
                    @error('employee_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="employee_phone">Employee Phone</label>
                    <input type="number" class="form-control @error('employee_phone') is-invalid @enderror" id="employee_phone" name="employee_phone" placeholder="Enter employee phone number">
                    @error('employee_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" placeholder="Enter department">
                    @error('department')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="task_title">Task Title</label>
                    <input type="text" class="form-control @error('task_title') is-invalid @enderror" id="task_title" name="task_title" placeholder="Enter task title">
                    @error('task_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="task_description">Task Description</label>
                    <textarea class="form-control @error('task_description') is-invalid @enderror" id="task_description" name="task_description" rows="3" placeholder="Enter task description"></textarea>
                    @error('task_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="deadline_days">Deadline Days</label>
                <input type="date" class="form-control @error('deadline_days') is-invalid @enderror" id="deadline_days" name="deadline_days">
                @error('deadline_days')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
                <button type="submit" class="btn btn-primary">Add Todo</button>
            </form>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
