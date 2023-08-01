<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>

    <div class="container mt-5">

        <form action="{{ route('form3_data') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Gender</label> <br>
                <input id="male" type="radio" name="gender" value="Male" @checked(old('gender') == 'Male') /> <label for="male">Male</label> <br>
                <label><input type="radio" name="gender" value="Female" @checked(old('gender') == 'Female') /> Female</label> <br>
                @error('gender')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Education</label>
                <select name="education" class="form-select @error('email') is-invalid @enderror">
                    <option value="">Select Education</option>
                    <option @selected(old('education') == 'School') value="School">School</option>
                    <option @selected(old('education') == 'Diploma') value="Diploma">Diploma</option>
                    <option @selected(old('education') == 'Bachelor') value="Bachelor">Bachelor</option>
                    <option @selected(old('education') == 'Master') value="Master">Master</option>
                    <option @selected(old('education') == 'pHD') value="pHD">pHD</option>
                </select>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Start Education</label>
                <input type="date" name="start_edu" placeholder="start_edu" class="form-control @error('start_edu') is-invalid @enderror" value="{{ old('start_edu') }}" />
                @error('start_edu')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>End Education</label>
                <input type="date" name="end_edu" placeholder="end_edu" class="form-control @error('end_edu') is-invalid @enderror" value="{{ old('end_edu') }}" />
                @error('end_edu')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                {{-- @dump(old('interesting')??[]) --}}
                {{-- @dump(in_array('Coding', old('interesting')??[])) --}}
                <label>Interesting</label> <br>
                <label><input type="checkbox" name="interesting[]" value="Coding" @checked(in_array('Coding', old('interesting')??[])) /> Coding</label> <br>
                <label><input type="checkbox" name="interesting[]" value="Swimming" @checked(in_array('Swimming', old('interesting')??[])) /> Swimming</label> <br>
                <label><input type="checkbox" name="interesting[]" value="Tiktoker" @checked(in_array('Tiktoker', old('interesting')??[])) /> Tiktoker</label> <br>
                @error('gender')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" placeholder="bio" class="form-control @error('bio') is-invalid @enderror" rows="5">{{ old('bio') }}</textarea>
                @error('bio')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-success">Send</button>
        </form>
    </div>

</body>
</html>
