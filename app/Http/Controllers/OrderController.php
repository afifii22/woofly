<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Anabul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('anabul')
        ->where('customer_id', Auth::id())
        ->latest()
        ->get();

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $anabul = Anabul::findOrFail($request->anabul_id);
        return view('order.create', compact('anabul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
    {
        $validated = $request->validate([
            'anabul_id' => 'required|exists:anabuls,id',
            'no_hp' => 'required|string|max:20',
            'metode_pembelian' => 'required|in:Diantar,Diambil',
            'alamat_pengiriman' => 'nullable|required_if:metode_pembelian,Diantar|string',
            'tanggal_pengambilan' => 'nullable|required_if:metode_pembelian,Diambil|date',
            'waktu_pengambilan' => 'nullable|required_if:metode_pembelian,Diambil',
            'metode_pembayaran' => 'required|in:Transfer Bank,COD',
            'bukti_pembayaran' => 'nullable|required_if:metode_pembayaran,Transfer Bank|image|mimes:jpg,jpeg,png|max:2048',
            'catatan' => 'nullable|string',
        ]);

        // Jika Transfer Bank, simpan bukti transfer
        if ($request->hasFile('bukti_pembayaran')) {
            $validated['bukti_pembayaran'] = $request
                ->file('bukti_pembayaran')
                ->store('bukti-pembayaran', 'public');
        }

        $validated['customer_id'] = Auth::id();
        $validated['status_pesanan'] = 'Menunggu Konfirmasi';

        Order::create($validated);

        return redirect()
            ->route('order.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

    if ($order->customer_id !== Auth::id()) {
        abort(403);
    }

        $order->load(['customer', 'anabul']);
        return view('order.show', compact('order'));

    }

  
    public function cancel(Order $order)
    {
        if ($order->customer_id !== Auth::id()) {
            abort(403);
        }
        if ($order->status_pesanan !== 'Menunggu Konfirmasi') {
            return back()->with('error', 'Pesanan tidak dapat dibatalkan.');
        }

        $order->update([
            'status_pesanan' => 'Dibatalkan',
            'alasan_pembatalan' => 'Dibatalkan oleh customer.',
        ]);

        return redirect()
            ->route('order.show', $order->id)
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }

    public function ownerIndex()
    {
        $orders = Order::with(['customer', 'anabul'])
            ->latest()
            ->get();

        return view('owner.order.index', compact('orders'));
    }

    public function ownerShow(Order $order)
    {
        $order->load(['customer', 'anabul']);
        return view('owner.order.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status_pesanan' => 'required|string|max:50',
        ]);

        $order->update([
            'status_pesanan' => $validated['status_pesanan'],
        ]);

        return redirect()
            ->route('owner.order.show', $order)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }

}
