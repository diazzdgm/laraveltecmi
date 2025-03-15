<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $universe->name }} Universe Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>{{ $universe->name }} Universe</h2>
                <a href="{{ route('universes.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">ID:</th>
                            <td>{{ $universe->id }}</td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $universe->name }}</td>
                        </tr>
                        <tr>
                            <th>Total Superheroes:</th>
                            <td>{{ $universe->superheroes->count() }}</td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $universe->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated At:</th>
                            <td>{{ $universe->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="mt-3">
                    <a href="{{ route('universes.edit', $universe->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('universes.destroy', $universe->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
                
                <h3 class="mt-4">Superheroes in this Universe</h3>
                
                @if($universe->superheroes->count() > 0)
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Real Name</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($universe->superheroes as $hero)
                            <tr>
                                <td>{{ $hero->id }}</td>
                                <td>{{ $hero->name }}</td>
                                <td>{{ $hero->real_name }}</td>
                                <td>{{ $hero->gender->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('superheroes.show', $hero->id) }}" class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info mt-3">
                        No superheroes have been added to this universe yet.
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>