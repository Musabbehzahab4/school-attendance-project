<title>Classes</title>
<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/class.css') }}">
</head>
<body
    style="background-repeat:no-repeat;background-size:cover; background-image:url({{ asset('image/anime-school-background-0akglzygbxchtz5t.jpg') }})">
    <x-header_navbar />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
        <div class="card mt-3 p-3" id="card">
            <div class="title" id="asaas">
                {{ $title }}
            </div>
            <form action="{{ $url }}" method="post">
                @csrf
                <div class="from-control" id="cls">
                    <label for=""> Classes</label>
                    <input type="text" name="class" class="from-control" value="{{ @$class->Class_name }}">
                </div>
                <button type="submit" class="btn btn-dark" id="btn">
                    Submit
                </button>
            </form>
        </div>
    </div>
    </div>
</div>

</body>
