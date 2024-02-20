<title>teacher</title>

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/button.css') }}">
</head>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="container">
        <table class="table"
            style="margin-top: 85px; margin-left:170px; width: 810px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
            <thead>
                <tr>
                    <th scope="col">T_id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="p-2">Action</th>
            </thead>
            <tbody>
                @foreach ($teachers as $value)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a
                                href="{{ route('teacherdetail', ['id' => $value->T_id]) }}"class="text-white">{{ $value->name }}</a>
                        </td>
                        <td>{{ $value->gender }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <a href="{{ route('teacheredit', ['id' => $value->T_id]) }}"
                                class="btn btn-dark btn-sm">Edit</a>
                            <a
                                href="{{ route('teacherdelete', ['id' => $value->T_id]) }}"class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-dark"
            style="margin-left: 800px; width: 177px; height: 50px; font-size: 25px; font-family: monospace;">
            <a href="{{ route('createteacher') }}" style="text-decoration: none; color:#ffff">Add teacher</a>
        </button>
</body>
