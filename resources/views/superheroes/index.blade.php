<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superheroes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Superheroes List</h1>
            <a href="{{ route('superheroes.create') }}" class="btn btn-primary">Add New Superhero</a>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Real Name</th>
                    <th>Universe</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($superheroes as $superhero)
                <tr>
                    <td>{{ $superhero->id }}</td>
                    <td>{{ $superhero->name }}</td>
                    <td>{{ $superhero->real_name }}</td>
                    <td>{{ $superhero->universe->name ?? 'N/A' }}</td>
                    <td>{{ $superhero->gender->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('superheroes.show', $superhero->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('superheroes.edit', $superhero->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('superheroes.destroy', $superhero->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>