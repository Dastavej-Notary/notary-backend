<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mail</title>
    </head>
    <body>
        <div style="text-align: justify;">
            <p>
                Dear <b>{{ $mail_data['name'] }}</b>,
            </p>
            <p>
                Thanks for booking an appointment at our website. We would be expecting you at our office at <b>{{ $mail_data['time'] }}</b> on <b>{{ $mail_data['date'] }}</b>.
            </p>
            <p>
                Thank You,
                <a href="dastavej-notary.github.io">Dastavej & Notary</a>.
            </p>
        </div>
    </body>
</html>
