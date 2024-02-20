<title>Student detail</title>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/show.css') }}">
</head>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt4">
                <div class="card p-4" id="card-1">
                    @foreach ($student as $value)
                        <p>Name : <b>{{ $value->name }}</b></p>
                        <p>Email : <b>{{ $value->email }}</b></p>
                        <p>Address : <b>{{ $value->address }}</b></p>
                        <p>Gender : <b>{{ $value->gender }}</b></p>
                        <p>Class : <b>{{ $value->student_class['Class_name'] }}</b></p>
                        <p>Phone NO : <b>{{ $value->phone_no }}</b></p>
                        <img src="/students/{{ $value->image }}" class="rounded" width="100%">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
