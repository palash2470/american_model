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
    <table style="width: 800px; background: #fff; padding: 0; margin: 0 auto 0; border-spacing: 0px; border-collapse: collapse;">
        <tr>
            <td>
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
                            <td>
                                <p style="padding: 0; margin: 40px 0 0 0; font-size: 16px; color: #000; text-align: left;">Hi, {{$bookings_details->bookingUser->name}}</p>
                                <p style="padding: 0; margin: 0; font-size: 16px; color: #000; text-align: left;">{{$bookings_details->name}} booking you</p>
                            </td>
                        </tr>
                        <tr>
                            <td><h4 style="padding: 0; margin: 0px 0 20px 0; font-size: 25px; color: #000; text-align: left;">Your Booking Details</h4></td>
                        </tr>
                    </thead>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="0" cellpadding="0" style="max-width: 800px; width: 100%; background: #fff; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td>
                                <table cellspacing="0" cellpadding="0" style="max-width: 740px; width: 100%; background: #f3f3f3; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse; border-radius: 10px;">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 20px 15px 0 15px;">
                                                <table cellspacing="0" cellpadding="0" style="width: 370px; background: #f3f3f3; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Name : </td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{$bookings_details->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Email :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{$bookings_details->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Phone Number :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{$bookings_details->phone_no}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Preferred Date :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{$bookings_details->preferred_date}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Preferred Time :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{@$bookings_details->preferred_time}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="padding: 20px 15px 0 15px;">
                                                <table cellspacing="0" cellpadding="0" style="width: 370px; background: #f3f3f3; padding: 0; margin: 0 auto; border-spacing: 0px; border-collapse: collapse;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Street Address : </td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{@$bookings_details->street_address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">City :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{@$bookings_details->city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">State :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{@$bookings_details->state->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Country :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{@$bookings_details->country->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #000;">Zip Code :</td>
                                                            <td style="font-size: 14px; text-align: left; padding: 4px 0; color: #686868; font-size: 15px;">{{@$bookings_details->zip_code}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0 15px;">Description :</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding: 0 15px 20px 15px; color: #686868; font-size: 15px;">{{@$bookings_details->description}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
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
            </td>
        </tr>
    </table>
    
</body>
</html>