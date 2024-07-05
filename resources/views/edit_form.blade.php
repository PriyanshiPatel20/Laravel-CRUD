<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Data</h1>
        <form action="{{ url('update_data', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image">
                <img src="{{ asset('storage/images/'.$data->image) }}" height="50px" width="50px" alt="Image Preview">
            </div>
            <div class="mb-3">
                <label for="skill" class="form-label">Skill</label><br>
                <input type="checkbox" name="skill[]" value="Php" {{ in_array('Php', explode(',', $data->skill)) ? 'checked' : '' }}> Php
                <input type="checkbox" name="skill[]" value="Python" {{ in_array('Python', explode(',', $data->skill)) ? 'checked' : '' }}> Python
                <input type="checkbox" name="skill[]" value="C++" {{ in_array('C++', explode(',', $data->skill)) ? 'checked' : '' }}> C++
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="Male" {{ $data->gender == 'Male' ? 'checked' : '' }}> Male
                <input type="radio" name="gender" value="Female" {{ $data->gender == 'Female' ? 'checked' : '' }}> Female
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select name="country" class="form-select" aria-label="Select Country">
                    <option value="USA" {{ $data->country == 'USA' ? 'selected' : '' }}>USA</option>
                    <option value="India" {{ $data->country == 'India' ? 'selected' : '' }}>India</option>
                    <option value="UK" {{ $data->country == 'UK' ? 'selected' : '' }}>UK</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
