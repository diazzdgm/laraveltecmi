<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Superhero</title>
</head>

<body>
    <h1>Create Superhero</h1>

    <form action="{{ route('superheroes.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="gender_id">Gender</label>
        <select name="gender_id" required>
            @foreach ($genders as $gender)
                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="universe_id">Universe</label>
        <select name="universe_id" required>
            @foreach ($universes as $universe)
                <option value="{{ $universe->id }}">{{ $universe->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label for="name">Superhero Name</label>
        <input type="text" name="name" required>

        <br><br>

        <label for="real_name">Real Name</label>
        <input type="text" name="real_name" required>

        <br><br>

        <label for="picture">Picture</label>
        <input type="file" name="picture">

        <br><br>

        <input type="submit" value="Create">
    </form>
</body>

</html>
