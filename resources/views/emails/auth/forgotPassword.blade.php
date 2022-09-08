<!DOCTYPE html>
<html lang="en" style="width: 100%; padding: 0; margin: 0;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- fab -->
    <link rel="icon" type="image/ico" sizes="32x32" href="{{url('image/favicon.ico')}}">
    <!-- fab -->
    <title>American Model</title>
    <!-- Google font  Poppins-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="padding: 0; margin: 0; font-family: 'Poppins', sans-serif;">
    <table style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 50px auto 0; border-spacing: 0px; border-collapse: collapse;">
        <thead>
            <tr style="margin: 30px auto;">
                <th>
                    <a href="#" style="display: inline-block; text-decoration: none; padding: 0; margin: 0;">
                        <img style="width: 120px;" src="{{url('image/email-template/template-logo.png')}}" alt="">
                    </a>
                </th>
            </tr>
            <tr>
                <td><h4 style="padding: 0; margin: 40px 0 20px 0; font-size: 25px; color: #000; text-align: center;">Forget Password Email</h4></td>
            </tr>
            <tr>
                <td>
                    <p style="padding: 0; margin: 0px 0 20px 0; font-size: 16px; color: #000; text-align: center;">Thank you for showing interest in American Model!</p>
                    <p style="padding: 0; margin: 0px 0 30px 0; font-size: 16px; color: #000; text-align: center;">You can reset password from bellow button.</p>
                </td>
            </tr>
        </thead>
    </table>

    <table style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto 50px; border-spacing: 0px; border-collapse: collapse;">
        <tfoot>
            <tr>
                <td style="text-align: center;">
                    <a href="{{ route('reset.password.get', $token) }}" style="display: inline-block; border-radius: 5px; background: #1DCDFE; color: #000; padding: 0 25px; margin: 0 0 60px 0; line-height: 2; text-decoration: none; font-weight: 600;">Reset Password</a>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">{{date("D j M Y G:i:s ")}} GMT</p>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">This is one-time code.</p>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">If this email is not intended for you, please ignore it.</p>
                    <p style="padding: 0; margin: 30px 0 10px 0; font-size: 14px; color: #000; text-align: center;">Sincerely,</p>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">The American Model team</p>
                </td>
            </tr>
        </tfoot>
    </table>
    
</body>
</html>