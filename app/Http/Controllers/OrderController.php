<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PackagePricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderPendingNotification;
use App\Mail\OrderReceipt;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use App\Models\Destination;


use Auth;

class OrderController extends Controller
{
    // Membuat pesanan baru
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $packagePricingId = $request->input('package_pricing_id');
            $paymentMethod = $request->input('payment_method');
            // date
            $bookingDate = $request->input('booking_date');

            // Validasi input
            $request->validate([
                'package_pricing_id' => 'required|exists:package_pricings,id',
                'payment_method' => 'required|in:credit_card,bank_transfer',
                'booking_date' => 'required|date|after_or_equal:today',
            ]);

            // Mendapatkan harga dari PackagePricing
            $pricing = PackagePricing::findOrFail($packagePricingId);

            // Membuat order baru
            $order = Order::create([
                'user_id' => $user->id,
                'package_pricing_id' => $packagePricingId,
                'total_price' => $pricing->price,
                'booking_date' => $bookingDate,
                'payment_method' => $paymentMethod,
                'status' => 'pending',
            ]);

            return response()->json(['message' => 'Order created successfully!', 'order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Order creation failed', 'error' => $e->getMessage()], 500);
        }
    }

    // Admin approve pesanan
    // Admin approve pesanan
    public function approve($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'pending') {
            $order->update([
                'status' => 'approved',
                'approved_at' => now(),
            ]);

            // Kirim receipt ke buyer (email dengan PDF)
            Mail::to($order->user->email)->send(new OrderReceipt($order));

            // Ambil destinasi dari relasi



            return response()->json(['message' => 'Order approved and receipt sent to the user!']);
        }

        return response()->json(['message' => 'Order cannot be approved'], 400);
    }


    // Admin reject pesanan
    public function reject($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'pending') {
            $order->update(['status' => 'rejected']);
            return response()->json(['message' => 'Order rejected!']);
        }

        return response()->json(['message' => 'Order cannot be rejected'], 400);
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['destination', 'package', 'user']) // Memuat relasi yang diperlukan
            ->get();

        return response()->json(['message' => 'Order history', 'orders' => $orders]);
    }

}
?>