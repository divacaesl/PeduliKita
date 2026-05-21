<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran Donasi</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px;">
        <h2 style="text-align: center; color: #28a745;">Terima Kasih atas Donasi Anda!</h2>
        
        <p>Halo {{ $donation->guest_name ?? ($donation->user ? $donation->user->name : 'Orang Baik') }},</p>
        
        <p>Donasi Anda untuk kampanye <strong>"{{ $donation->campaign->title }}"</strong> telah kami terima.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>ID Transaksi</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $donation->transaction_id }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Nominal</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Metode Pembayaran</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $donation->payment_method }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Status</strong></td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd; color: #28a745;">Berhasil</td>
            </tr>
        </table>

        <p style="margin-top: 20px;">
            Dukungan Anda sangat berarti. Teruslah menyebarkan kebaikan!
        </p>
        
        <p style="margin-top: 30px; font-size: 12px; color: #888; text-align: center;">
            &copy; {{ date('Y') }} PeduliKita. All rights reserved.<br>
            *Note: Fitur lampiran PDF Invoice sedang dalam perbaikan sistem.
        </p>
    </div>
</body>
</html>
