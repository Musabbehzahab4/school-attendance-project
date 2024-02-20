<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<title>Classes</title>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="container">
        <table class="table"
            style="margin-top: 85px; margin-left:170px; width: 810px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
            <thead>
                <tr>
                    <th scope="col">C_id</th>
                    <th scope="col">Class_name</th>
                    <th scope="col" class="p-2">Action</th>
            </thead>
            <tbody>
                @foreach ($class as $value)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a href="{{ route('studentdetail', ['id' => $value->c_id]) }}"
                                class="text-white">{{ $value->Class_name }}</a></td>
                        <td>
                            <?php if (Session::get('role')==1) { ?>
                            <a href="{{ route('classedit', ['id' => $value->c_id]) }}"
                                class="btn btn-dark btn-sm">Edit</a>
                            <a href="{{ route('classdelete', ['id' => $value->c_id]) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                            <?php } ?>
                            <?php if (Session::get('role')==2) { ?>
                            <a href="{{ route('attendance', ['id' => $value->c_id]) }}"
                                class="btn btn-primary btn-sm">Attendance</a>
                            <?php } ?>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <?php if (Session::get('role')==1) { ?>
        <button class="btn btn-dark"
            style="margin-left: 800px; width: 177px; height: 50px; font-size: 25px; font-family: monospace;">
            <a href="{{ route('createclass') }}" style="text-decoration: none; color:#ffff">Add Classes</a>
        </button>
        <?php } ?>
    </div>
    @if (session('fail'))
        <script>
            swal('success!', '{{ Session::get('fail') }}', 'success');
        </script>
    @endif
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>
