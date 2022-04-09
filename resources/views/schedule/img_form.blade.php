<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Images</title>
    <style>
        /* body {
            background-color: cadetblue
        } */
        body {

            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 5s ease infinite;
            height: 100vh;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        table {
            width: 35vw;
            margin: 50px auto;
            border: 2px solid;
        }

        td {
            padding: 15px;
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
        }

        input {
            border-radius: 5px;
            padding: 10px 15px;
        }

        td>strong {
            font-size: large;
        }

        input[type=submit] {
            padding: 5px 10px !important;
            font-size: large !important;
            cursor: pointer;
            /* font-weight: 700px !important; */
        }

        input[type=submit]:hover {
            border-radius: 20px !important;
            background-color: rgb(180, 214, 67) !important;
            transition: 0.3s ease-in-out !important;

        }
    </style>
</head>

<body>
    <h1>Upload Images for {{$type}}</h1>
    <form action="/img_submit" method="post" enctype="multipart/form-data">
        @csrf

        <table class="table table-borderless">
            <tr>
                <td>
                    <strong> Image-1 </strong>
                </td>
                <td>
                    <input type="file" name="image_1" />
                </td>
            </tr>
            <tr>
                <td>
                    <strong> Image-2 </strong>
                </td>
                <td>
                    <input type="file" name="image_2" />
                </td>
            </tr>
            <tr>
                <td>
                    <strong> Image-3 <strong>
                </td>
                <td>
                    <input type="file" name="image_3" />
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" />
    </form>
</body>

</html>