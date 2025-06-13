<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Karbantartási naptár</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 6px;
            border: 1px solid #ccc;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Karbantartási naptár export</h2>
    <table>
        <thead>
            <tr>
                <th>Eszköz</th>
                <th>Leírás</th>
                <th>Ütemezett idő</th>
                <th>Létrehozva</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event['Eszköz'] }}</td>
                    <td>{{ $event['Leírás'] }}</td>
                    <td>{{ $event['Ütemezett idő'] }}</td>
                    <td>{{ $event['Létrehozva'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
