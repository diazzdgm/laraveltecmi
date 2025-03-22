<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Superhero</title>
</head>

<body>
    <h1>Edit Superhero</h1>

    <form action="{{ route('superheroes.update', $superhero->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="gender_id">Gender</label>
        <select name="gender_id" required>
            @foreach ($genders as $gender)
                <option value="{{ $gender->id }}" {{ $superhero->gender_id == $gender->id ? 'selected' : '' }}>
                    {{ $gender->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label for="universe_id">Universe</label>
        <select name="universe_id" required>
            @foreach ($universes as $universe)
                <option value="{{ $universe->id }}" {{ $superhero->universe_id == $universe->id ? 'selected' : '' }}>
                    {{ $universe->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label for="name">Superhero Name</label>
        <input type="text" name="name" value="{{ old('name', $superhero->name) }}" required>

        <br><br>

        <label for="real_name">Real Name</label>
        <input type="text" name="real_name" value="{{ old('real_name', $superhero->real_name) }}" required>

        <br><br>

        <label for="picture">Current Picture</label><br>
        @if ($superhero->picture)
            <img src="{{ asset('storage/' . $superhero->picture) }}" width="150" alt="Current Picture"><br><br>
        @else
            <p>No picture uploaded.</p>
        @endif

        <label for="picture">Change Picture</label>
        <input type="file" name="picture">

        <br><br>

        <input type="submit" value="Update">
    </form>

    <br>
    <a href="{{ route('superheroes.index') }}">Back to list</a>
</body>

</html>
