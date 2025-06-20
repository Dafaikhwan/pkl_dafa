<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    barang : <b>{{$a}}</b><br>
    jumlah : <b>{{$b}}</b><br>
    @if($b > 100)
    anda mendapatkan cashback sebesar 10%
    @elseif($b > 50)
    anda tidak mendapatkan cashback sebesar 5% 
    @else($b > 100)
    anda tidak mendapatkan cashback
    @endif
</body>
</html>