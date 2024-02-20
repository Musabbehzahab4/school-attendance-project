<title>Student data</title>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="container-fluid ">
        <div class="container pr-5">

            <div class="row">
                <table class="table"
                    style="width: 1315px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
                    <thead>
                        <tr>
                            <th scope="col">T_id</th>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Phone no</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($teacherList as $value)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->address }}</td>
                                <td>{{ $value->gender }}</td>
                                <td>{{ $value->phone_no }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
