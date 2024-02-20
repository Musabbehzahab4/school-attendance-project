<title>TimeTable</title>

<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
    <?php if (Session::get('role')==1) { ?>
    <form action="{{ route('time-from') }}">
        <input type="hidden" name="classid" value="{{ $classid }}">
        <button type="submit" class="btn btn-primary" style="margin-left: 75rem;">Assign Class</button>
    </form>
    <?php } ?>
    <table border="2"
        style= "width:50%; height:50%; margin: 0 auto;background: -webkit-linear-gradient(#545871, #545871); background: linear-gradient(#545871, #545871); opacity: 0.75; color: white;"
        cellpadding="0" cellspacing="0">
        <form action="{{ route('timetable') }}">
            <input type="hidden" name="classid" value="{{ $classid }}">

        </form>
        <tr>
            <th scope="col">&nbsp;</th>
            <th scope="col"style="text-align: center">Monday</th>
            <th scope="col"style="text-align: center">Tuesday</th>
            <th scope="col"style="text-align: center">Wednesday</th>
            <th scope="col"style="text-align: center">Thursday</th>
            <th scope="col"style="text-align: center">Friday</th>
            {{-- <th scope="col"style="text-align: center">Saturday</th> --}}
        </tr>
        <?php
            $times = ['08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM'];
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        ?>

        @foreach ($times as $time)
            <tr>
                <td>{{ $time }}</td>
                @foreach ($days as $day)
                    <td>
                        @foreach ($timetable as $value)
                            @if ($day == $value->days)
                                @if ($time == $value->time)
                                    {{ $value->teacher_name }} ( {{ $value->subject_name }} )
                                @endif
                            @endif
                        @endforeach
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
    </table>
</body>
