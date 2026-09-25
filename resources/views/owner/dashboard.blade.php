<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Owner - WOOFLY</title>

    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js'
    ])
</head>

<body class="owner-page">

    <div class="owner-layout">

        {{-- ============================================================
             SIDEBAR OWNER
        ============================================================ --}}
        @include('layouts.sidebar')

        {{-- ============================================================
             MAIN AREA
        ============================================================ --}}
        <div class="owner-main">

            {{-- NAVBAR OWNER --}}
            @include('layouts.owner-navbar')


            {{-- ========================================================
                 DASHBOARD
            ======================================================== --}}
            <section class="owner-dashboard">

                {{-- ====================================================
                     STATISTIC CARDS
                ==================================================== --}}
                <div class="owner-stat-grid">

                    {{-- ANABUL --}}
                    <div class="owner-stat-card">

                        <div class="owner-stat-icon">
                            <i class="fa-solid fa-paw"></i>
                        </div>

                        <div class="owner-stat-content">

                            <span>Total Anabul</span>

                            <strong>
                                {{ $totalAnabul ?? 8 }}
                            </strong>

                            <small>
                                <i class="fa-solid fa-paw"></i>
                                Anabul tersedia
                            </small>

                        </div>

                    </div>


                    {{-- PESANAN --}}
                    <div class="owner-stat-card">

                        <div class="owner-stat-icon">
                            <i class="fa-solid fa-receipt"></i>
                        </div>

                        <div class="owner-stat-content">

                            <span>Total Pesanan</span>

                            <strong>
                                {{ $totalPesanan ?? 17 }}
                            </strong>

                            <small>
                                <i class="fa-solid fa-chart-simple"></i>
                                Pesanan keseluruhan
                            </small>

                        </div>

                    </div>


                    {{-- CUSTOMER --}}
                    <div class="owner-stat-card">

                        <div class="owner-stat-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div class="owner-stat-content">

                            <span>Total Customer</span>

                            <strong>
                                {{ $totalCustomer ?? 45 }}
                            </strong>

                            <small>
                                <i class="fa-solid fa-user-check"></i>
                                Customer terdaftar
                            </small>

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     LOWER CONTENT
                ==================================================== --}}
                <div class="owner-dashboard-grid">

                    {{-- =================================================
                         CHART
                    ================================================== --}}
                    <div class="owner-panel owner-chart-panel">

                        <div class="owner-panel-header">

                            <div>

                                <p class="owner-panel-label">
                                    Overview
                                </p>

                                <h3>
                                    Statistik Pesanan
                                </h3>

                            </div>

                            <span class="owner-panel-badge">
                                Tahun {{ now()->year }}
                            </span>

                        </div>


                        <div class="owner-chart">

                            {{-- Y AXIS --}}
                            <div class="owner-chart-y">

                                <span>20</span>
                                <span>15</span>
                                <span>10</span>
                                <span>5</span>
                                <span>0</span>

                            </div>


                            {{-- CHART AREA --}}
                            <div class="owner-chart-area">

                                <div class="owner-chart-lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>


                                <div class="owner-chart-bars">

                                    @php
                                        $chartData = $monthlyOrders ?? [
                                            'Jan' => 8,
                                            'Feb' => 11,
                                            'Mar' => 7,
                                            'Apr' => 13,
                                            'May' => 10,
                                            'Jun' => 15,
                                        ];
                                    @endphp

                                    @foreach ($chartData as $month => $total)

                                        <div class="owner-chart-column">

                                            <div
                                                class="owner-chart-bar"
                                                style="height: {{ min(($total / 20) * 100, 100) }}%;"
                                            >
                                                <span>
                                                    {{ $total }}
                                                </span>
                                            </div>

                                            <small>
                                                {{ $month }}
                                            </small>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         AKUN TERBARU
                    ================================================== --}}
                    <div class="owner-panel owner-action-panel">

                        <div class="owner-panel-header">

                            <div>
                                <p class="owner-panel-label">Terbaru</p>
                                <h3>Akun Baru</h3>
                            </div>

                            <i class="fa-solid fa-user-plus owner-panel-header-icon"></i>

                        </div>


                        <div class="owner-recent-users">

                            @forelse ($recentUsers ?? [] as $user)

                                <div class="owner-recent-user-item">

                                    <span class="owner-recent-user-avatar">
                                        {{ strtoupper(substr($user->nama, 0, 1)) }}
                                    </span>

                                    <div class="owner-recent-user-info">
                                        <strong>{{ $user->nama }}</strong>
                                        <small>{{ $user->email }}</small>
                                    </div>

                                    <span class="owner-status {{ $user->role === 'owner' ? 'status-owner' : 'status-customer' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>

                                </div>

                            @empty

                                <p class="owner-empty-text">Belum ada akun terdaftar.</p>

                            @endforelse

                        </div>

                    </div>

                </div>


                {{-- ====================================================
                     RECENT ORDER
                ==================================================== --}}
                <div class="owner-panel owner-orders-panel">

                    <div class="owner-panel-header">

                        <div>

                            <p class="owner-panel-label">
                                Recent Activity
                            </p>

                            <h3>
                                Pesanan Terbaru
                            </h3>

                        </div>

                        <a href="#" class="owner-view-all">

                            Lihat Semua

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>


                    <div class="owner-table-wrapper">

                        <table class="owner-table">

                            <thead>

                                <tr>

                                    <th>No. Pesanan</th>
                                    <th>Customer</th>
                                    <th>Anabul</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($recentOrders ?? [] as $order)

                                    <tr>

                                        <td>
                                            <strong>
                                                #{{ $order->id }}
                                            </strong>
                                        </td>

                                        <td>
                                            {{ $order->customer->nama ?? '-' }}
                                        </td>

                                        <td>
                                            {{ $order->anabul->nama ?? '-' }}
                                        </td>

                                        <td>
                                            {{ optional($order->created_at)->format('d M Y') }}
                                        </td>

                                        <td>

                                            <span
                                                class="owner-status status-{{ strtolower($order->status_pesanan ?? 'menunggu') }}"
                                            >
                                                {{ $order->status_pesanan ?? 'Menunggu' }}
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="5"
                                            class="owner-empty"
                                        >
                                            Belum ada pesanan terbaru.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>

        </div>

    </div>

</body>

</html>