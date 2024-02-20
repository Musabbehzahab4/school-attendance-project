<title>Subject</title>
<link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="wrapper">
        <div class="registration_form">
            <div class="title">

            </div>
            <form action="{{ route('assgin-subj') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form_wrap">
                    
                    <div class="input_wrap">
                        <label for="classes">Subject</label>
                        <select id="class" name="subject" class="w-100">
                            <option value="">Select Subject</option>
                            @foreach ($subject as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input_wrap">
                        <label for="classes">Teacher</label>
                        <select id="class" name="teacher" class="w-100">
                            <option value="">Select teacher</option>
                            @foreach ($teacher as $value)
                                <option value="{{ $value->T_id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn">
                    </div>
                </div>
            </form>
        </div>"
    </div>
</body>
