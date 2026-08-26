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
        $orders = Order::with(['customer', 'anabul'])->latest()->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anabuls = Anabul::where('status_ketersediaan', 'tersedia')->get();
        return view('order.create', compact('anabuls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'anabul_id' => 'required|exists:anabuls,id',
            'no_hp' => 'required|string|max:16',
            'metode_pembelian' => 'required|in:dijemput,diantar',
            'tanggal_pengambilan' => 'nullable|date',
            'waktu_pengambilan' => 'nullable',
            'alamat_pengiriman' => 'nullable|string',
            'metode_pembayaran' => 'required|in:transfer,cod',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $validated['customer_id'] = Auth::id();
        $validated['status_pesanan'] = 'menunggu';

        Order::create($validated);

        return redirect()
            ->route('order.index')
            ->with('success', 'Pesanan berhasil ditambahkan.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = Order::with(['customer', 'anabul'])->findOrFail($order->id);
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $anabuls = Anabul::all();
        return view('order.edit', compact('order', 'anabuls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'anabul_id' => 'required|exists:anabuls,id',
            'no_hp' => 'required|string|max:16',
            'metode_pembelian' => 'required|in:dijemput,diantar',
            'tanggal_pengambilan' => 'nullable|date',
            'waktu_pengambilan' => 'nullable',
            'alamat_pengiriman' => 'nullable|string',
            'estimasi_pengiriman' => 'nullable|string|max:50',
            'metode_pembayaran' => 'required|in:transfer,cod',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
            'status_pesanan' => 'required|string|max:20',
            'alasan_pembatalan' => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()
            ->route('order.index')
            ->with('success', 'Data pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()
            ->route('order.index')
            ->with('success', 'Data pesanan berhasil dihapus.');
    }
}
