@php
    $email = $email ?? 'email-999@email-impossible-xxx.com';
@endphp

<!DOCTYPE html>
<html>

<head>
    <title>Decathlon Email</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="Margin: 0; padding: 0; min-width: 100%; background-color: #f7f7f7;">
    <center>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f7f7f7;">
            <tr>
                <td align="center">
                    <!-- Main Table -->
                    <table width="600" cellpadding="0" cellspacing="0" border="0"
                        style="background-color: #ffffff; font-family: Arial, sans-serif; border-collapse: collapse; margin: 20px auto;">
                        <!-- Header with Logo -->
                        <tr>
                            <td align="center" style="padding: 20px 0;">
                                <img src="{{ asset('img/2beach-club-blue-logo-2x.webp') }}" alt="Decathlon Logo"
                                    style="display: block; border: 0; text-decoration: none; width: auto; height: 50px;" />
                            </td>
                        </tr>
                        <!-- Welcome Message -->
                        <tr>
                            <td align="center" style="padding: 0 20px;">
                                <h1 style="Margin: 0; font-size: 24px; color: #333333; line-height: 1.5; padding-top: 16px;">
                                    Thank you for joining <br>the 2Beach Club community!
                                </h1>
                            </td>
                        </tr>
                        <!-- Bold Subtitle -->
                        <tr>
                            <td align="center" style="padding: 10px 20px;">
                                <p style="Margin: 0; font-size: 16px; color: #333333; font-weight: bold; padding-top: 16px; padding-bottom: 16px;">
                                    You will be among the first to receive news on our happenings.
                                </p>
                            </td>
                        </tr>
                        <!-- Confirm Your Subscription -->
                        <tr>
                            <td align="center" style="padding: 10px 20px;">
                                <h2 style="Margin: 0; font-size: 16px; color: #333333;padding-bottom: 32px; text-wrap: balance;">
                                    Please get in touch with us if you have any questions or requests for 2Beach Club
                                </h2>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px 20px;">
                                <p style="Margin: 0; font-size: 14px; color: #333333;">
                                    WhatsApp / Mobile: <a href="tel:+23058004713">+230 5800 4713</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px 20px;">
                                <p style="Margin: 0; font-size: 14px; color: #333333;">
                                    Get directions: <a href="https://maps.app.goo.gl/GdMAjL7FF87xPdVb8">https://maps.app.goo.gl/GdMAjL7FF87xPdVb8</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 10px 20px;">
                                <p style="Margin: 0; font-size: 14px; color: #333333;">Follow us on social media</p>
                                <p>
                                    <a href="{{ config('2beachclub.facebook') }}" target="_blank"><img src="{{ asset('v2/svg/facebook.svg') }}" alt="facebook" height="32" width="32" style="width: 32px; height: 32px;"></a>
                                    &nbsp;
                                    <a href="{{ config('2beachclub.instagram') }}" target="_blank"><img src="{{ asset('v2/svg/instagram.svg') }}" alt="instagram" height="32" width="32" style="width: 32px; height: 32px;"></a>

                                </p>
                            </td>
                        </tr>
                        <!-- Footer Note -->
                        <tr>
                            <td align="center"
                                style="padding: 20px; font-size: 12px; color: #999999; text-align: center; line-height: 1.5;">
                                <p style="margin: 0; text-wrap: balance;">
                                    If you didn't subscribe to this list, please click to <a href="{{ route('newsletter_unsubscribe', ['email' => $email]) }}">unsubscribe</a>.
                                </p>
                            </td>
                        </tr>
                    </table>
                    <!-- End of Main Table -->
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
