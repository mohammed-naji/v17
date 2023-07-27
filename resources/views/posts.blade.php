<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 50px auto 0;
            text-align: center;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table th, table td {
            padding: 8px;
        }
    </style>
</head>
<body>

    {{-- dddd --}}
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
        </tr>
        @foreach($posts as $post)
        {{-- @dump($loop) --}}
        <tr {{ ($loop->last) ? "style=background-color:#eee" : '' }} >
            <td><?php echo $post['id'] ?></td>
            <td><?php echo $post['title'] ?></td>
            <td><?php echo $post['body'] ?></td>
        </tr>
        @endforeach

    </table>

</body>
</html>
