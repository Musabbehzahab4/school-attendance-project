<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <nav class="navbar navbar-expand-lg mt-0 navbar-dark" style="background-color: #545871">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">School Mangement System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0  w-100 position-relative">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a> --}}
                    </li>
                    <?php if (Session::get('role')==1) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('teacher') }}">Teachers</a>
                    </li>
                    <?php } ?>

                    <?php if (Session::get('loginId')) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('class') }}">Classes</a>
                    </li>
                    <?php } ?>

                    <?php if (Session::get('role')==1) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('subject') }}">Subject</a>
                        </li>
                        <?php } ?>

                    <?php if (Session::get('role')==1) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('student') }}">Students Data</a>
                    </li>
                    <?php } ?>

                    <?php if (Session::get('loginId')) { ?>
                    <li class="nav-item" style="float: right; margin-left: auto;">
                        <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">LOGOUT</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <h1 style="text-align: center; color: white;">School Mangement System</h1>

</body>

</html>
