<!DOCTYPE html>
<html lang="en" style="width: 100%; padding: 0; margin: 0;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- fab -->
    <link rel="icon" type="image/ico" sizes="32x32" href="images/favicon.ico">
    <!-- fab -->
    <title>Model</title>
    <!-- Google font  Poppins-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="padding: 0; margin: 0; font-family: 'Poppins', sans-serif;">
    <table style="width: 800px; background: #fff; padding: 0; margin: 50px auto 0; border-spacing: 0px; border-collapse: collapse;">
        <tr>
            <td>
                <table style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 50px auto 0; border-spacing: 0px; border-collapse: collapse;">
                    <thead>
                        <tr style="margin: 30px auto;">
                            <th>
                                <a href="#" style="display: inline-block; text-decoration: none; padding: 0; margin: 0;">
                                    <img style="width: 120px;" src="images/logo.png" alt="">
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <p style="padding: 0; margin: 40px 0 0 0; font-size: 16px; color: #000; text-align: center;">Hi, {{$modelName}}</p>
                                <p style="padding: 0; margin: 0; font-size: 16px; color: #000; text-align: center;">{{$userName}} message you</p>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <table cellspacing="0" cellpadding="0" style="max-width: 600px; width: 100%; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse; border-radius: 10px;">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 20px 15px 0 15px;">
                                                <table cellspacing="0" cellpadding="0" style="width: 250px; padding: 0; margin: 0 auto; background-color: #f3f3f3; border-radius: 5px; border-spacing: 0px; border-collapse: collapse;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 40px; font-size: 14px; text-align: left; padding: 10px; color: #000;">
                                                                <img style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;" src="https://www.lifewire.com/thmb/4DwXgCqvz_AMANges8tW2tqRzqo=/2121x1414/filters:fill(auto,1)/GettyImages-1075570286-852a1ca9563e45f19749f9e8979f6b94.jpg" alt="">
                                                            </td>
                                                            <td style="font-size: 14px; text-align: left; padding: 10px; color: #686868; font-size: 15px;">{{$userName}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="padding: 0; margin: 10px 0 0 0; font-size: 14px; color: #000; text-align: center;">{{$msg}}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </thead>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto 50px; border-spacing: 0px; border-collapse: collapse;">
                    <tfoot>
                        <tr>
                            <td style="padding-top: 30px;">
                                <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">Thu, 28 Apr 2022 15:56:19 GMT</p>
                                <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">If this email is not intended for you, please ignore it.</p>
                                <p style="padding: 0; margin: 30px 0 10px 0; font-size: 14px; color: #000; text-align: center;">Sincerely,</p>
                                <p style="padding: 0; margin: 0px; font-size: 14px; color: #000; text-align: center;">The American Model team</p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
