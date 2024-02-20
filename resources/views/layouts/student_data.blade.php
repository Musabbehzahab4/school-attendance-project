<title>Student Data</title>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />

    <div class="container-fluid ">
        <div class="container pr-5">
             <div class="row">
                <table class="table"
                    style=" margin-top: 70px; width: 1315px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
                    <thead>
                        <tr>
                            <th scope="col">s_id</th>

                            <th>Name</th>
                            <th>gender</th>
                            <th>Classes</th>
                            <th>Image</th>
                            <?php if (Session::get('role')==1) { ?>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $value)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>

                                <td>{{ $value->name }}</td>
                                <td>{{ $value->gender }}</td>
                                <td>{{ $value->student_class['Class_name'] }}</td>
                                <td>{{ $value->image }}</td>
                                <td>
                                    <?php if (Session::get('role')==1) { ?>
                                    <a href="{{ route('studentedit', ['id' => $value->s_id]) }}"
                                        class="btn btn-dark btn-sm">Edit</a>
                                    <a href="{{ route('studentdelete', ['id' => $value->s_id]) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <?php if (Session::get('role')==1) { ?>
                <button class="btn btn-dark"
                    style="margin-left: 786px; width: 191px; height: 50px; font-size: 25px; font-family: monospace;">
                    <a href="{{ route('register') }}" style="text-decoration: none; color:#ffff">Add Students</a>
                </button>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
