<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Schedule Expert Visit</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://fellow.app/wp-content/uploads/2020/06/How-to-Improve-Time-Management.png');
            background-repeat: no-repeat;
            width: 100vw;
            background-size: cover;

            /* background-position: center;
        margin-top: 20px; */
        }

        h2 {
            text-align: center;
            margin: 20px 45px auto;
        }

        .inner {
            display: grid;
            grid-template-columns: auto auto;
            width: 100%;
            margin: 5px auto;
        }

        .block {
            margin-bottom: 5px;
            padding: 5px;
        }

        form {
            text-align: center;
        }

        input {
            border-radius: 5px;
            padding: 10px 15px;
        }

        label {
            font-size: larger;
        }

        input[type=submit] {
            width: 20vw;
            padding: 5px 10px !important;
            font-size: large !important;
            cursor: pointer;
            margin-top: 5rem;

            /* font-weight: 700px !important; */
        }

        input[type=submit]:hover {
            border-radius: 20px !important;
            background-color: rgb(180, 214, 67) !important;
            transition: 0.3s ease-in-out !important;

        }

        form {
            margin-top: 10rem;
        }
    </style>
</head>

<body class="antialiased">
    <h2>Schedule Expert Visit</h2>

    {{-- <a href="todo_show">
        <div class="btn btn-danger">Back</div>
    </a> <br /><br /> --}}
    <form action="/final_submit/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="inner">
            <div class="block">
                <label for="start_date"><strong> Start Date</strong></label>
                <input type="date" name="start_date" />
            </div>
            <div class="block">
                <label for="start_time"><strong> Start Time</strong></label>
                <input type="time" name="start_time" />
            </div>
            <div class="block">
                <label for="end_date"><strong>End Date </strong></label>
                <input type="date" name="end_date" />
            </div>
            <div class="block">
                <label for="end_time"><strong>End Time</strong></label>
                <input type="time" name="end_time" />
            </div>
        </div>
        <input style="border-radius:15px; background-color:teal " type="Submit" name="submit" />
    </form>
</body>

</html>