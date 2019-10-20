<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="cards?action=restart">RESTART</a>

<h2>Choose desire card</h2>
<ul>
    @foreach ($deck as $card)

            <li><a href="cards?desired={{$card}}">{{$card}}</a></li>

    @endforeach
</ul>
</body>
</html>