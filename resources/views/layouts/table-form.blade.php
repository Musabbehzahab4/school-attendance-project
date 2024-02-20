<title>TimeTable</title>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
</head>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="wrapper">
        <div class="registration_form">
            <div class="title">

            </div>
            <form action="{{ route('savetable') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form_wrap">
                    <input type="hidden" name="classid" value="{{ $classid }}">
                    <div class="input_wrap">
                        <label for="classes">Days</label>
                        <select id="class" name="day" class="w-100">
                            <option value="">Select Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>
                    </div>
                    <div class="input_wrap">
                        <label for="classes">Time</label>
                        <select id="class" name="time" class="w-100">
                            <option value="">Select Time</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                        </select>

                    </div>
                    <div class="input_wrap">
                        <label for="classes">Subject</label>
                        <select id="subject_id" name="subject" class="w-100">
                            <option value="">Select Subject</option>
                            @foreach ($subject as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input_wrap">
                        <label for="classes">Teacher</label>
                        <select id="teacher_id" name="teacher" class="w-100">
                            <option value="">Select teacher</option>
                            {{-- @foreach ($teacher as $value)
                                <option value="{{ $value->T_id }}">{{ $value->name }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {


            $('#subject_id').on('change', function () {
                var idsubject = this.value;

                $("#teacher_id").html('');
                $.ajax({
                    url: "{{url('/ajaxcall')}}",
                    type: "get",
                    data: {
                        subject_id: idsubject,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#teacher_id').html('<option value="">Select teacher</option>');
                        console.log(result);
                        $.each(result, function (key, value) {
                            $("#teacher_id").append('<option value="' + value
                                .teacher_id + '">' + value.teacher_name + '</option>');
                        });

                    }
                });
            });
        })
     </script>
</body>
