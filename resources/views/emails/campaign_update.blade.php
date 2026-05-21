<!DOCTYPE html>
<html>
<head>
    <title>Pembaruan Kampanye</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px;">
        <h2 style="color: #0056b3;">Pembaruan: {{ $update->campaign->title }}</h2>
        
        <p>Halo Orang Baik,</p>
        
        <p>Penggalang dana untuk kampanye yang Anda dukung baru saja membagikan kabar terbaru:</p>
        
        <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #0056b3; margin-top: 20px;">
            <h3 style="margin-top: 0;">{{ $update->title }}</h3>
            <p>{{ $update->content }}</p>
        </div>

        <p style="margin-top: 20px;">
            Terima kasih telah menjadi bagian dari perubahan positif ini!
        </p>
        
        <p style="margin-top: 30px; font-size: 12px; color: #888; text-align: center;">
            &copy; {{ date('Y') }} PeduliKita. All rights reserved.
        </p>
    </div>
</body>
</html>
