<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        body{
            background: rgb(31, 30, 30);
            color: rgb(255, 255, 255);
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
        }
        .error .code{
            margin-top: 50px;
            position: relative;
            font-size: 80pt;
        }
        .error{
            text-align: center;
        }
        .error .code .title{
            position: absolute;
            top: -5px;
            text-align: center;
            transform: rotate(20deg);
            background: red;
            border-radius: 3px;
            right: 20px;
            padding: 4px 10px;
            box-sizing: border-box;
            font-size: 13px;
            color: white;
        }
        #back_buton{
            display: block;
            width: 100px;
            margin:auto;
            background: white;
            margin-top: 20px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 2px;
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <div class="error">
        <div class="code">
            @yield('code')
            <div class="title">
                @yield('title')
            </div>
        </div>
        <div class="message">
            @yield('message')
        </div>
        <a id="back_buton" href="">Go Back</a>
    </div>
</body>

</html>
