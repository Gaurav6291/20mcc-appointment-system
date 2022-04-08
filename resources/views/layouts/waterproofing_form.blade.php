<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* body {
            background-color: cadetblue;
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
            width: 50vw;
            margin: 50px auto;
        }

        td {
            padding: 15px;
        }

        button {
            height: 40px;
            width: 100%;
            font-size: x-large;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: violet;
            border-radius: 10px;
            transition: 0.3s ease-in-out;
        }

        table,
        td {
            /* border: 2px solid red; */
        }

        h3 {
            color: #3800a7;
            ;
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <marquee>
            <h1>Waterproofing</h1>
        </marquee>
        <h3>Select Area for Waterproofing</h3>
    </div>
    <table>
        <tr>
            <td><a href="/fifth_screen/1"><button>Below 200 sqft</button></a></td>
        </tr>
        <tr>
            <td><a href="/fifth_screen/2"><button>200 sqft to 500 sqft</button></a></td>
        </tr>
        <tr>
            <td><a href="/fifth_screen/3"><button>500 to 1000 sqft</button></a></td>
        </tr>
        <tr>
            <td><a href="/fifth_screen/4"><button>1000sqft to 2000 sqft</button></a></td>
        </tr>
        <tr>
            <td><a href="/fifth_screen/5"><button>Above 2000 sqft</button></a></td>
        </tr>
    </table>
</body>

</html>