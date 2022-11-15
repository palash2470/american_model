<!DOCTYPE html>
<html lang="en" style="width: 100%; padding: 0; margin: 0;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- fab -->
    <link rel="icon" type="image/ico" sizes="32x32" href="images/favicon.ico">
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
                        <img style="width: 120px;" src="{{url('images/logo.png')}}" alt="">
                    </a>
                </th>
            </tr>
            <tr>
                <td><h4 style="padding: 0; margin: 40px 0 20px 0; font-size: 25px; color: #000; text-align: center;">Your Plan</h4></td>
            </tr>
            <tr>
                <td>
                    <p style="padding: 0; margin: 0px 0 20px 0; font-size: 16px; color: #000; text-align: center;">Thank you for showing interest in American Model!</p>
                    <p style="padding: 0; margin: 0px 0 30px 0; font-size: 16px; color: #000; text-align: center;">Thank you for choose your plan</br> your plan details below.</p>
                </td>
            </tr>
        </thead>
    </table>

    <table cellspacing="0" cellpadding="0" style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
        <tbody>
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" style="max-width: 750px; width: 100%; background: #f3f3f3; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse; border-radius: 10px;">
                        <tbody>
                            <tr>
                                <td style="padding: 30px 0;">
                                    <table cellspacing="0" cellpadding="0" style="max-width: 680px; width: 100%; background: #f3f3f3; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: left; padding: 0 0 6px 0; color: #000; border-bottom: 1px solid rgba(145, 158, 171, 0.24);">Members</th>
                                                <th style="text-align: center; padding: 0 0 6px 0; color: #000; border-bottom: 1px solid rgba(145, 158, 171, 0.24);">Plan</th>
                                                <th style="text-align: center; padding: 0 0 6px 0; color: #000; border-bottom: 1px solid rgba(145, 158, 171, 0.24);">Expiry</th>
                                                <th style="text-align: center; padding: 0 0 6px 0; color: #000; border-bottom: 1px solid rgba(145, 158, 171, 0.24);">Price</th>
                                                <th style="text-align: right; padding: 0 0 6px 0; color: #000; border-bottom: 1px solid rgba(145, 158, 171, 0.24);">Recurring</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">{{$user_plan->planGroup->name}}</td>
                                                <td style="font-size: 14px; text-align: center; padding: 4px 0; color: #000;">{{$user_plan->plan->name}}</td>
                                                <td style="font-size: 14px; text-align: center; padding: 4px 0; color: #000;">{{$user_plan->expiry}}</td>
                                                <td style="font-size: 14px; text-align: center; padding: 4px 0; color: #000;">${{$user_plan->price}}</td>
                                                <td style="font-size: 14px; text-align: right; padding: 4px 0; color: #000;">{{Str::ucfirst($user_plan->plan_type) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto 50px; border-spacing: 0px; border-collapse: collapse;">
        <tfoot>
            <tr>
                <td style="padding-top: 30px;">
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">{{date("D j M Y G:i:s ")}} GMT</p>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">If this email is not intended for you, please ignore it.</p>
                    <p style="padding: 0; margin: 30px 0 10px 0; font-size: 14px; color: #000; text-align: center;">Sincerely,</p>
                    <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">The American Model team</p>
                </td>
            </tr>
        </tfoot>
    </table>
    
</body>
</html>