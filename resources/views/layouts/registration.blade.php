<title>Registration</title>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
</head>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="wrapper">
        <div class="registration_form">
            <div class="title">
                {{ $title }}
            </div>

            <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form_wrap">
                    <div class="input_grp">
                        <div class="input_wrap">
                            <label for="name"> Name</label>
                            <input type="text" id="name" name="name" value="{{ @$student->name }}">
                        </div>
                    </div>
                    <div class="input_wrap">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" value="{{ @$student->email }}">
                    </div>
                    <div class="input_wrap">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="w-100" name="address">{{ @$student->address }}</textarea>
                    </div>
                    <div class="input_wrap">
                        <label>Gender</label>
                        <ul>
                            <li>
                                <label class="radio_wrap">
                                    <input type="radio" name="gender" value="male" class="input_radio"
                                        <?php echo @$student->gender == 'male' ? 'checked' : ''; ?>>
                                    <span>Male</span>
                                </label>
                            </li>
                            <li>
                                <label class="radio_wrap">
                                    <input type="radio" name="gender" value="female" class="input_radio"
                                        <?php echo @$student->gender == 'female' ? 'checked' : ''; ?>>
                                    <span>Female</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="input_wrap">
                        <label for="classes">Classes</label>

                        <select id="class" name="class" class="w-100">
                            <option value="">Select Class</option>
                            @foreach ($classes as $value)
                                <option value="{{ $value->c_id }}" <?php echo @$student->classes == $value->c_id ? 'selected' : ''; ?>>{{ $value->Class_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_wrap">
                        <label for="phone no">Phone No</label>
                        <input type="text" id="Phone" name="phone_no" value="{{ @$student->phone_no }}">
                    </div>
                    <div class="input_wrap">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" style="color: white;"
                            value="{{ @$student->image }}">
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
