<p>Dear {{ $mail_data['first_name'] }} {{ $mail_data['last_name'] }},</p>

<p style="margin-bottom: 35px;">Please click on the below button to reset your password.</p>

@if($role == 'admin')
    <a href="{{ route('backend.password.reset', [$mail_data['email'], $mail_data['token']]) }}" style="background-color: #136fc9; color: white; padding: 20px; font-size: 16px; text-decoration: none; border-radius: 20px;">Reset Password</a>
@else
    <a href="{{ route('frontend.password.reset', [$mail_data['email'], $mail_data['token']]) }}" style="background-color: #136fc9; color: white; padding: 20px; font-size: 16px; text-decoration: none; border-radius: 20px;">Reset Password</a>
@endif

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">GPNi</p>