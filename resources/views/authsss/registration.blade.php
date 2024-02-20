<title>Registration</title>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
</head>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    {{-- <x-header_navbar /> --}}
    <h1 style="text-align: center; color: white;">School Mangement System</h1>
    <div class="wrapper" style="margin-top: -112px;">
        <div class="registration_form">
            <div class="title">
                Registration Here
            </div>

            <form action="{{ route('register-user') }}" method="POST" enctype="multipart/form-data">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                @csrf
                <div class="form_wrap">
                    <div class="input_grp">
                        <div class="input_wrap">
                            <label for="name"> Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="input_wrap">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input_wrap">
                        <label for="phone no">Password</label>
                        <input type="password" id="password" name="password" value=""
                            style="border-radius: 4px; width: 350px; height: 45px;">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn">
                    </div>
                </div>
                <br>
                <a href="{{ url('/') }}" style="color: white">Already register !!! Login Here</a>
            </form>
        </div>
    </div>
</body>
