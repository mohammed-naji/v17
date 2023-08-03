<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MSG</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background: #f7f7f7; padding: 30px">

    <div style="max-width: 600px; margin: 0 auto; border: 2px solid #eee; padding: 20px;background:#fff">
        <h4>Welcome Admin</h4>
        <p>There is new contact us data with this information</p>
        <br>
        <p><b>Full Name: </b> {{ $data['full_name'] }}</p>
        <p><b>Email: </b> {{ $data['email'] }}</p>
        <p><b>Phone: </b> {{ $data['phone'] }}</p>
        <p><b>Message: </b> {{ $data['message'] }}</p>
        <br>
        <p>Best Regards</p>
    </div>

</body>
</html>
