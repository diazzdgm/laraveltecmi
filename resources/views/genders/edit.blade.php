<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gender</title>
</head>
<body>

    <h1>Edit Gender</h1>

    <form action="{{ route('genders.update', $gender->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Gender Name</label>
        <input type="text" name="name" value="{{ old('name', $gender->name) }}" required>
        <br><br>
        <input type="submit" value="Update">
    </form>

    <br>
    <a href="{{ route('genders.index') }}">Back to list</a>

</body>
</html>
