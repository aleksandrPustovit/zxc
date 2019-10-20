<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="/cards?action=restart">RESTART</a>

<h3>Desired: {{$desired}}</h3>
<h3>Selected: {{$selected}}</h3>
<h3>Chance: {{$chance}} %</h3>
<h3>Card left: {{$cardLeft}}</h3>
@if($win)
    <h2>Win!</h2>
    <h3>Chance was: {{$chance}} %</h3>
    <a href="/cards/">PLAY AGAIN</a>
    <script>
        alert("Got it, the chance was {{$chance}} %");
    </script>
@else
    <a href="/cards/play">DRAFT</a>
@endif
</body>
</html>