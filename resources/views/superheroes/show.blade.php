<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhero Details</title>
</head>

<body>
    <h1>{{ $superhero->name ?? 'Unknown Superhero' }}</h1>

    <p><strong>Hero Name:</strong> {{ $superhero->name ?? 'N/A' }}</p>
    <p><strong>Real Name:</strong> {{ $superhero->real_name ?? 'N/A' }}</p>
    <p><strong>Universe:</strong> {{ $superhero->universe->name ?? 'N/A' }}</p>
    <p><strong>Gender:</strong> {{ $superhero->gender->name ?? 'N/A' }}</p>

    <a href="{{ route('superheroes.index') }}">Back to List</a>
</body>

</html>
