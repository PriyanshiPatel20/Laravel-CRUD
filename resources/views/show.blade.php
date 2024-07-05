<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Show Data</h1>
        <a href="{{ url('/form') }}" class="btn btn-primary mb-3">Add New</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Skill</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->name }}</td>
                    <td><img src="{{ asset('storage/images/'.$record->image) }}" height="100px" width="100px"></td>
                    <td>{{ $record->skill }}</td>
                    <td>{{ $record->gender }}</td>
                    <td>{{ $record->country }}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ $record->updated_at }}</td>
                    
                    <td>
                        <a href="{{ url('edit/'.$record->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete/'.$record->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
