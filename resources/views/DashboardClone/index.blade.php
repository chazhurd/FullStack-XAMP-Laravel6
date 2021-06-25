<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript" src="/js/IPR_Charts.js" ></script>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: rgb(184, 0, 0);
        }

        .Party{
            animation-name: lit;
            animation-duration: 4s;
        }
        @keyframes lit {
            0%   {background-color:red;}
            25%  {background-color:yellow;}
            50%  {background-color:blue;}
            75%  {background-color:green;}
            100% {background-color:red;}
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            padding-top: 200px;
            padding-bottom: 200px;
        }
      </style>
</head>
<body>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/charts">CAC</a></li>
        <li><a href="#moreCharts">More Charts</a></li>
        <li style="float:right"><a class="active" onclick="PartyMode()">Party Mode</a></li>
    </ul>
    
    <div id='app' style="background-color: black; padding: 40px">
    <div id='ActiveUserData' style="display: none;">@foreach($activeUsers as $loggedinfo){{$loggedinfo->active_users}},@endforeach</div>
    <div id='ActiveClientData'  style="display: none;">@foreach($activeUsers as $loggedinfo){{$loggedinfo->active_clients}},@endforeach</div>
    <div id='DatabaseSize' style="display: none;">@foreach($DatabaseSize as $dbsize){{$dbsize->medcurity}},@endforeach</div>
    <div id='Dates' style="display: none;">@foreach($activeUsers as $loggedinfo){{$loggedinfo->date}},@endforeach</div>
    <div id='debugger'></div>
    <div id="chart-line" style="width: 80vw; margin: auto"></div>
    <div id="chart-line2" style="width: 80vw; margin: auto"></div>
    <div id="chart-area" style="width: 80vw; margin: auto"></div>
    </div>
    <div id='moreCharts' style="background-color: darkred;">
        <img src="img/medmed.png" class='center'>
    </div>
</body>
</html>