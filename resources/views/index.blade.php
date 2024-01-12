<!-- resources/views/index.blade.php -->

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Index</title>

</head>

<body>

@if($data)
    @foreach($data as $d)

        <div>

            <p>{{ $d['name'] }}</p>

            <p> {{$d['image']}}</p>

            <img src="{{ $d['image'] }}" alt="{{ $d['name'] }}">

        </div>

    @endforeach
@else
    <p>No data available</p>
@endif

</body>

</html>
