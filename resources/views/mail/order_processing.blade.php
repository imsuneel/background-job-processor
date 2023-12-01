<DOCTYPE html>
    <html lang=”en-US”>
    <head>
        <meta charset=”utf-8">
    </head>
    <body>
    <h2>Test Email</h2>
    <p>Your Order in Processing!</p>
    <ul>
        <li>Order ID: {{$data->id}} </li>
        <li>Email:{{$data->email}}</li>
        <li>Order Amount:{{$data->order_amount}} </li>
    </ul>
    </body>
    </html>
