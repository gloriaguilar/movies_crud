<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5 w-25">
        <h3>Register</h3>
        <form class="row needs-validation" novalidate method="post" action="{{ url('register-user') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputUser" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputUser" required
                    aria-describedby="emailHelp">
                <div id="inputPassword" class="invalid-feedback">
                    This field is required
                </div>

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" required
                    aria-describedby="emailHelp">
                <div id="inputPassword" class="invalid-feedback">
                    This field is required
                </div>
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                <div id="inputPassword" class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <button type="submit" class="btn btn-success text-center mb-3 p-1 mx-2">Register</button>
            <a href="{{ url('login') }}" class="btn btn-info text-center p-1 mx-2">Login</a>
        </form>
        @if (Session::has('success'))
            <div class="alert alert-success my-3" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
</body>
<script>
    (() => {

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

</html>
