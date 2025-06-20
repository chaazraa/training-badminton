<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function receive(Request $request)
    {
        $notification = $request->all();
        $transactionStatus = $notification['transaction_status'] ?? null;
        $orderId = $notification['order_id'] ?? null;
        $paymentType = $notification['payment_type'] ?? null;
        $fraudStatus = $notification['fraud_status'] ?? null;

        Log::info('Midtrans Notification Received', [
            'transaction_status' => $transactionStatus,
            'order_id' => $orderId,
            'payment_type' => $paymentType,
            'fraud_status' => $fraudStatus,
        ]);

        // Ambil booking_id dari order_id (format: BOOKING-{id}-{timestamp})
        $bookingId = null;
        if ($orderId && preg_match('/BOOKING-(\d+)-/', $orderId, $matches)) {
            $bookingId = $matches[1];
        }

        if ($bookingId) {
            $booking = Booking::find($bookingId);
            if ($booking) {
                switch ($transactionStatus) {
                    case 'capture':
                        if ($paymentType == 'credit_card' && $fraudStatus == 'challenge') {
                            $booking->status = 'pending';
                        } else {
                            $booking->status = 'paid';
                        }
                        break;
                    case 'settlement':
                        $booking->status = 'paid';
                        break;
                    case 'pending':
                        $booking->status = 'pending';
                        break;
                    case 'deny':
                        $booking->status = 'denied';
                        break;
                    case 'expire':
                        $booking->status = 'expired';
                        break;
                    case 'cancel':
                        $booking->status = 'canceled';
                        break;
                }
                $booking->save();

                Log::info('Booking status updated', [
                    'booking_id' => $bookingId,
                    'status' => $booking->status
                ]);
            }
        }

        return response()->json(['status' => 'OK']);
    }
}