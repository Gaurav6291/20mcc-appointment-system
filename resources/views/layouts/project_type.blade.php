<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Project Type</title>
    <style>
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

        #outer {
            display: flex;
            flex-direction: column;
            height: 80vh;
            padding: 1% 15%;
            /* border: 1px solid rebeccapurple; */
            margin: auto;
            text-align: center;
        }

        #fixed {
            margin: 2.5vh auto;
            height: 32%;
            margin-bottom: 1%;
            border: 2px solid black;
        }

        img {
            filter: blur(3px);
        }

        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            font-size: x-large;
            text-align: center;
            left: 50%;

        }

        #txt-1 {
            top: 19%;
        }

        #txt-2 {
            top: 50%;
        }

        #txt-3 {
            top: 79%;
        }
    </style>
</head>

<body>
    <div id="outer">
        <div id="fixed" style="width:100%;">

            <a href="third_screen/1"><img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7GQeuWT1N9JIjVZAVHVmKFsss7nfxg2opYA&usqp=CAU"
                    height="100%" width="100%" />
                <div id="txt-1" class="bg-text">Residential Projects</div>
            </a>
        </div>
        <div id="fixed" style="width:100%;">

            <a href="/third_screen/2"><img src="https://www.commercialnoida.com/images/propertybanner.jpg" height="100%"
                    width="100%" />
                <div id="txt-2" class="bg-text">Commercial Projects</div>
            </a>
        </div>
        <div id="fixed" style=" width:100%;">

            <a href="/third_screen/3"><img
                    src="https://absgroup.in/wp-content/uploads/2020/11/13-Industries-Sugar-L2-Banner.jpg" height="100%"
                    width="100%" />
                <div id="txt-3" class="bg-text">Industrial Projects</div>
            </a>
        </div>
    </div>
</body>

</html>