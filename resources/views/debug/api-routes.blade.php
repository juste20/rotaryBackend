<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Routes API</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #003366; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #d9edf7; }
    </style>
</head>
<body>
    <h1>Liste des routes API</h1>
    <table>
        <thead>
            <tr>
                <th>Méthode</th>
                <th>URI</th>
                <th>Nom de la route</th>
                <th>Controller/Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($routes as $route)
                <tr>
                    <td>{{ $route['method'] }}</td>
                    <td>{{ $route['uri'] }}</td>
                    <td>{{ $route['name'] ?? '-' }}</td>
                    <td>{{ $route['action'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
