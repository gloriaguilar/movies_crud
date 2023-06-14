<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5 justify-content-center w-25 h-100">
        <h3>Welcome!</h3>
        <form class="row needs-validation" method="post" novalidate action="{{ url('login-user') }}">
            @csrf
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                    required>
                <div id="inputEmail" class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" required>
                <div id="inputPassword" class="invalid-feedback">
                    This field is required
                </div>
            </div>
            <button type="submit" class="btn btn-success text-center mb-3 p-1 mx-2">Login</button>
            <a href="{{ url('register') }}" class="btn btn-info text-center p-1 mx-2">Register</a>
        </form>
        @if (Session::has('fail'))
            <div class="alert alert-danger my-2" role="alert">
                {{ Session::get('fail') }}
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
