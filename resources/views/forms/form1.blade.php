<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>

    <div class="container mt-5">
        {{-- solid
        regular
        brand --}}
        {{-- <i class="fas fa-heart"></i>
        <i class="far fa-heart"></i> --}}
        {{-- <i class="fas fa-heart-crack"></i> --}}
        <h2>Login Form</h2>
        <form action="{{ route('form1_data') }}" method="POST">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }} --}}
            @csrf
            <div class="mb-3">
                <label>Student Number</label>
                <input type="text" class="form-control" placeholder="Student Number" name="std_name">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="std_pass">
            </div>

            <button class="btn btn-success">Login</button>
        </form>

        <hr>

        {{-- <table class="table table-bordered text-center table-hover">
            <tr class="table-success">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Ali</td>
                <td>Ali@gmail.com</td>
                <td>20</td>
                <td>
                    <a class="btn btn-primary btn-sm" href=""><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href=""><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </table> --}}
    </div>

</body>
</html>
