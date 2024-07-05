
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h1 class="text-center mb-4">CRUD FORM</h1>
                <form action="store_data" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label"><h4>Name</h4></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"><h4>Profile Picture</h4></label>
                        <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"> 
                        <img id="imagePreview" src="#" alt="Preview" style="max-width: 100px; display:none;">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <legend><h4>Skills</h4></legend>
                    <div class="form-check">
                        <input class="form-check-input" name="skill[]" type="checkbox" value="Php" >
                        <label class="form-check-label" for="phpCheck">Php</label>
                      
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="skill[]" type="checkbox" value="Python" >
                        <label class="form-check-label" for="pythonCheck">Python</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="skill[]" type="checkbox" value="C++" >
                        <label class="form-check-label" for="cplusplusCheck">C++</label>
                    </div>
                    @error('skill')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                    <legend><h4>Gender</h4></legend>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="maleRadio" value="Male">
                        <label class="form-check-label" for="maleRadio">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="femaleRadio" value="Female">
                        <label class="form-check-label" for="femaleRadio">Female</label>
                    </div>
                    @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                    <select class="form-select mb-3" name="country" aria-label="Select your country">
                        <option selected><h4>Country</h4></option>
                        <option value="USA">USA</option>
                        <option value="India">India</option>
                        <option value="UK">UK</option>
                    </select>
                    @error('country')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('/show') }}" class="btn btn-success">Show Data</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function previewImage(event) {
            var imagePreview = document.getElementById('imagePreview');
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.style.display = 'block';
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.style.display = 'none';
                imagePreview.src = "#";
            }
        }
    </script>
</body>
</html>
