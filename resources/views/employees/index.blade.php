
@extends('employees.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="float-start">
                <h2>Employee List</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Salary</th>
                <th width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>${{ number_format($employee->salary, 2) }}</td>
                <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('employees.show',$employee->id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
