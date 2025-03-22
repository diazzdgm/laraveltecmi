<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender Test</title>
</head>

<body>
    <h1>Gender</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gender as $item)

                <tr>
                    <td>{{ $item -> id}}</td>
                    <td>{{ $item ->name }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
</body>

</html>