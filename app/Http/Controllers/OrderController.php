<?php 
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PackagePricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderPendingNotification;

use Auth;

class OrderController extends Controller
{
    // Membuat pesanan baru
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $destinationId = $request->input('destination_id');
            $packageId = $request->input('package_id');
            $paymentMethod = $request->input('payment_method');

            // Validate input
            $request->validate([
                'destination_id' => 'required|exists:destinations,id',
                'package_id' => 'required|exists:packages,id',
                'payment_method' => 'required|in:credit_card,bank_transfer',
            ]);

            // Mendapatkan harga dari PackagePricing
            $pricing = PackagePricing::where('destination_id', $destinationId)
                        ->where('package_id', $packageId)
                        ->firstOrFail();

            // Membuat order baru
            $order = Order::create([
                'user_id' => $user->id,
                'destination_id' => $destinationId,
                'package_id' => $packageId,
                'total_price' => $pricing->price,
                'payment_method' => $paymentMethod,
                'status' => 'pending',
            ]);

            // Notifikasi ke admin (implementasi tergantung sistem notifikasi)
            // Notification::send(Admin::all(), new OrderPendingNotification($order));

            return response()->json(['message' => 'Order created successfully!', 'order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Order creation failed', 'error' => $e->getMessage()], 500);
        }
    }
    // Admin approve pesanan
    public function approve($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'pending') {
            $order->update([
                'status' => 'approved',
                'approved_at' => now(),
            ]);

            // Kirim receipt ke buyer (email atau PDF)
            Mail::to($order->user->email)->send(new OrderReceipt($order));

            return response()->json(['message' => 'Order approved!']);
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
}
 ?>