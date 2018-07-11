<!--<a href="{{ urlFor('introduction') }}"> <img src ="Mid/app/views/greenbg.jpg"></a>-->
<!---->
<!--I am here-->
<!---->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Snap</title>
    <link rel="stylesheet" href="/Mid/htmlRes/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Mid/htmlRes/css/bootstrap-theme.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Mid/htmlRescss/main.css">


</head>
<body>
<a href="{{ urlFor('introduction') }}">
    <style>#container {
            height: 100%;
            width: 100%;
            text-decoration:none;
            /*position: relative;*/
        }
        #overlay{
            height: 100%;
            width:100%;
            font-weight: bold;
            position: absolute;
            padding-top: 20%;
            padding-left: 5%;
            overflow: hidden;
            left:0;
            top:0;
            z-index: 100;
            color: white;
            font-size: 45px;
        }

        .blinker {
            animation: blink 1s infinite;
            -moz-animation: blink 1s infinite;
            font-size: 2em;
        }
        @keyframes blink {
            from, to {
                color: transparent;
            }
            50% {
                color: white;
            }
        }

        @-moz-keyframes blink {
            from, to {
                color: transparent;
            }
            50% {
                color: white;
            }
        }
        #image {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        #text {
            z-index: 100;
            position: relative;
            color: black;
            font-size: 48px;
            font-weight: bold;
            left:20%;
            top: 40%;
            text-decoration: none;
        }
        body,html{
            background: #f9f9f9;
            /*padding-top: 10px;*/
            width : 100%;
            height: 100%;
            overflow: hidden;
            text-decoration: none;

        }

        p{
            color: lime;
            font-family: "Freestyle Script";
            font-size: 500px;
            /*margin: 0px 0 0 10px;*/
            white-space: nowrap;
            overflow: hidden;
            width: 30em;
            animation-iteration-count: 3;
            animation: type 14s steps(100, end);
        }

        p:nth-child(2){
            animation: type2 14s steps(100, end);
        }

        p a{
            color: blue;
            text-decoration: none;
        }

        span{
            animation: blink 1s infinite;
        }

        @keyframes type{
            from { width: 0; }
        }

        @keyframes type2{
            0%{width: 0;}
            50%{width: 0;}
            100%{ width: 100; }
        }

        @keyframes blink{
            to{opacity: .0;}
        }
        @media (max-width: 600px){
            #text{
                font-size: 28px ;
                text-decoration:none;
            }
        }

    </style>
    <div  id="container" style="text-decoration:none;">


        <p id="text">Welcome to Video Snap</p>

    </div>


    <footer class="text-center" style="bottom:0; height:35px;position:fixed;width:100%;border: 2px solid rgba(241, 241, 241,241);background-color:#F9F9F9;">
        <h4>Project VideoSnap @ CMPS 285, 2016</h4>
    </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/Mid/htmlRes/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="jq.js" type="text/javascript" charset="utf-8"></script>
</a>
</body>
</html>





