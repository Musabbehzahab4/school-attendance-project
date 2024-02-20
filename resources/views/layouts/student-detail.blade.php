<title>Student data</title>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <form action="{{ route('timetable') }}">
        <input type="hidden" name="class" value="{{ $classid }}">
        <button type="submit" class="btn btn-primary" style="margin-left: 75rem;">TimeTable</button>
    </form>

    <div class="container-fluid ">
        <div class="container pr-5">

            <div class="row">
        <table class="table"
            style=" width: 1315px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
          <thead>
                <tr>
                    <th scope="col">s_id</th>
                    <th>Name</th>
                    <th>gender</th>
                    <th>Classes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $classesList as $value )
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->gender }}</td>
                    <td>{{ $value->student_class['Class_name'] }}</td>
                    <td>
                        <a href="{{ route('showstudent',['id'=>$value->s_id]) }}" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
