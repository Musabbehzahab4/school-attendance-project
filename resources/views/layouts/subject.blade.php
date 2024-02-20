<title>Subject</title>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <a href="{{ route('assgin') }}"><button class="btn btn-primary" style="float: right; margin-right: 21rem;">Assgin Subject</button></a>
    <div class="container">
        <table class="table"
        style="margin-top: 85px; margin-left:170px; width: 810px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Subject</th>
                    <th scope="col">CLass</th>
                    <th scope="col" class="p-2">Action</th>
            </thead>
            <tbody>
                @foreach ($subject as $value)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->Class_name }}</td>

                        <td>
                            <a href="{{ route('editsubj', ['id' => $value->id]) }}"class="btn btn-dark btn-sm">Edit</a>
                            <a href="{{ route('subj', ['id' => $value->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-dark"
            style="margin-left: 800px; width: 177px; height: 50px; font-size: 25px; font-family: monospace;">
            <a href="{{ route('createsubject') }}" style="text-decoration: none; color:#ffff">Add Subject</a>
        </button>

    </div>
</body>
