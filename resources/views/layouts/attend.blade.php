<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
</head>
<body style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <div class="container-fluid ">
        <div class="container" style="margin-right: 275px;">
            <div class="row">
                <form method="post" action="{{route('studid') }}">
                    @csrf <!-- Add this CSRF token for security -->
                    <table class="table" style="width: 1315px; height: 115px; background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;">
                        <thead>
                            <tr>
                                <th scope="col">s_id</th>
                                <th>Name</th>
                                <th>gender</th>
                                <th>Classes</th>
                                <th>Mark Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attend as $key=> $value)
                                <tr >
                                    <input type="hidden" name="student[]" value="{{ $value->s_id }}">
                                    <input type="hidden" name="class" value="{{ $value->classes }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->gender }}</td>
                                    <td>{{ $value->student_class['Class_name'] }}</td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="attendance{{ $value->s_id }}" value="absent" id="absent_{{ $value->s_id }}">
                                        <label class="form-check-label" for="absent_{{ $value->s_id }}">Absent</label>
                                        <input class="form-check-input" type="radio" name="attendance{{ $value->s_id }}" value="present" id="present_{{ $value->s_id }}" style="margin-left:10px;">
                                        <label class="form-check-label" for="present_{{ $value->s_id }}" style="margin-left:26px;">Present</label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12" style="padding-left: 65pc;">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
