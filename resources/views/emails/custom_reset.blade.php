<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Reset Password</title>
</head>
<body style="margin:0; font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 0;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4;">
        <tr>
            <td align="center">

               
                <table width="600" cellpadding="0" cellspacing="0" style="background: linear-gradient(to right, #007bff, #6610f2); color: white; font-family: Arial, sans-serif;">
                    <tr>
                        <td style="padding: 15px; vertical-align: middle;">
                            <img src="{{ url('images/logo.jfif') }}" alt="logo" width="32" style="vertical-align: middle; display: inline-block;" />
                            <span style="font-size: 20px; font-weight: bold; margin-left: 10px; vertical-align: middle; display: inline-block;">Finance Tracker</span>
                        </td>
                        <td align="right" style="padding: 15px; vertical-align: middle;">
                            <a href="{{ url('/') }}" style="color: white; margin-right: 15px; text-decoration: none; font-size: 14px;">Home</a>
                            <a href="{{ url('/about') }}" style="color: white; margin-right: 15px; text-decoration: none; font-size: 14px;">About</a>
                            <a href="{{ url('/contact') }}" style="color: white; margin-right: 15px; text-decoration: none; font-size: 14px;">Contact</a>
                            <a href="{{ url('/login') }}" style="color: white; text-decoration: none; font-size: 14px;">Login</a>
                        </td>
                    </tr>
                </table>

                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; margin: 30px auto; padding: 30px; border-radius: 8px;">
                    <tr>
                        <td>
                            <h2 style="font-family: Arial, sans-serif; margin-top: 0;">Hello, {{ $firstname }} {{ $lastname }}!</h2>
                            <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
                                You are receiving this email because we received a password reset request for your account.
                            </p>

                            <p style="text-align: center; margin: 30px 0;">
                                <a href="{{ $url }}" style="background-color: #007bff; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; display: inline-block; font-weight: bold;">
                                    Reset Password
                                </a>
                            </p>

                            <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
                                If you did not request a password reset, no further action is required.
                            </p>

                            <p style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
                                Regards,<br />
                                The {{ config('app.name') }} Team
                            </p>
                        </td>
                    </tr>
                </table>

                
                <div style="text-align: center; color: #999; font-size: 12px; padding: 20px 0;">
                    © {{ now()->year }} {{ config('app.name') }}. All rights reserved.
                </div>

            </td>
        </tr>
    </table>

</body>
</html>
