<!DOCTYPE html>
<html>
<head>
    <title>Target Kampanye Tercapai</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px;">
        <h2 style="color: #28a745; text-align: center;">Selamat! 🎉</h2>
        
        <p>Halo {{ $campaign->user->name }},</p>
        
        <p>Kabar luar biasa! Kampanye penggalangan dana Anda yang berjudul <strong>"{{ $campaign->title }}"</strong> telah berhasil mencapai target dana yang diharapkan.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Target Dana</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Dana Terkumpul</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd; color: #28a745;"><strong>Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</strong></td>
            </tr>
        </table>

        <p style="margin-top: 20px;">
            Silakan login ke *dashboard* Anda untuk melihat rincian donatur dan mengurus proses pencairan dana.
        </p>
        
        <p style="margin-top: 30px; font-size: 12px; color: #888; text-align: center;">
            &copy; {{ date('Y') }} PeduliKita. All rights reserved.
        </p>
    </div>
</body>
</html>
