<title>Subject</title>

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
                            <input type="text" id="name" name="subject" value="{{ @$subject->name }}">
                        </div>
                    </div>
                    <div class="input_wrap">
                        <label for="classes">Classes</label>
                        {{-- <input type="text" id="name" name="class" value="{{ @$subject->class }}"> --}}

                        <select id="class" name="class" class="w-100">
                            <option value="">Select Class</option>
                            @foreach ($class as $value)
                                <option value="{{ $value->c_id }}" <?php echo @$subject->class == $value->c_id ? 'selected' : ''; ?>>{{ $value->Class_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn">
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
