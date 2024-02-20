<title>Home</title>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/button.css') }}">
</head>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="container">

        <button class="btn btn-outline-primary"
            style="margin-left: 410px; margin-top: 140px; width: 100px; height: 50px; font-size: 25px;
        font-family: monospace;">
            <a href="{{ route('login') }}" style="text-decoration: none; color:#ffff">login</a>
        </button>

        <button class="btn btn-outline-primary"
            style="margin-left: 15px; margin-top: 140px; width: 190px; height: 50px; font-size: 25px; font-family: monospace;">
            <a href="{{ route('registration') }}"style="text-decoration: none; color:#ffff">Registration</a>

        </button>

    </div>
</body>
