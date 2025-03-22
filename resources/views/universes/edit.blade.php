<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Universe</title>
</head>
<body>

    <h1>Edit Universe</h1>

    <form action="{{ route('universes.update', $universe->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Universe Name</label>
        <input type="text" name="name" value="{{ old('name', $universe->name) }}" required>
        <br><br>
        <input type="submit" value="Update">
    </form>

    <br>
    <a href="{{ route('universes.index') }}">Back to list</a>

</body>
</html>
