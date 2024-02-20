<title>login </title>

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
                login here
            </div>

            <form action="{{ route('login-user') }}" method="POST" enctype="multipart/form-data">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                @csrf
                <div class="form_wrap">
                    <div class="input_wrap">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input_wrap" id="pass" style="display:none">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value=""
                            style="border-radius: 4px; width: 350px; height: 45px;">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input_wrap" id="c_pass" style="display:none">
                        <div class="input_wrap">
                            <label for="newpassword">New Password</label>
                            <input type="password" id="newpassword" name="newpassword" value=""
                                style="border-radius: 4px; width: 350px; height: 45px;">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="input_wrap">
                            <label for="cpassword">Confrim Password</label>
                            <input type="password" id="cpassword" name="cpassword" value=""
                                style="border-radius: 4px; width: 350px; height: 45px;">
                            <span class="text-danger">
                                @error('cpassword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="input_wrap">
                        <input type="button" value="Next" class="submit_btn" id="next_button">
                    </div>

                    <div class="input_wrap" id="login" style="display: none">
                        <input type="submit" value="login" class="submit_btn">
                    </div>
                </div>
                <br>
                <a href="registration" style="color: white">Already register !!! Login Here</a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#next_button').click(function() {
                var email = $('#email').val();

                $.ajax({
                    url: '/getData/' + email,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response.result);
                        if (response.result == "true") {
                            console.log('ok');
                            $('#pass').css('display', 'block');
                            $('#login').css('display', 'block');
                            $('#next_button').css('display', 'none');
                        } else {
                            console.log('not ok');
                            $('#c_pass').css('display', 'block');
                            $('#login').css('display', 'block');
                            $('#next_button').css('display', 'none');
                        }
                    },
                    error: function(error) {

                        console.error('Error:', error);
                    }
                });

            })
        })
    </script>
</body>
