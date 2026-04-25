@extends('layouts.appadmin')

@section('content')
<div class="container">

    <h4 class="mb-2">Dashboard User</h4>
    <div class="row mb-4">
    {{-- Hero Total user, Active, dan Not-active --}}
        <div class="col-md-4 col-12 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Hari Ini</h6>
                    <h3>{{ number_format($totalUsers) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-6 mb-3">
            <div class="card text-center shadow-sm border-success">
                <div class="card-body">
                    <h6 class="text-success">Active</h6>
                    <h3>{{ number_format($activeUsers) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-6 mb-3">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <h6 class="text-danger">Not Active</h6>
                    <h3>{{ number_format($notActiveUsers) }}</h3>
                </div>
            </div>
        </div>

    </div>

    {{-- Grafik Total user, Active, dan Non-active --}}
    {{-- <form method="POST" action="{{ route('admin.dashboard.grafik') }}" class="mb-3 d-flex gap-2">
        @csrf

        <select name="tahun_filter" class="form-control" style="width: 120px;">
            @foreach($listTahun as $th)
                <option value="{{ $th }}" {{ $th == $filterYear ? 'selected' : '' }}>
                    {{ $th }}
                </option>
            @endforeach
        </select>

        <select name="bulan_filter" class="form-control" style="width: 150px;">
            @foreach($listBulan as $key => $bln)
                <option value="{{ $key }}" {{ $key == $filterMonth ? 'selected' : '' }}>
                    {{ $bln }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">
            Tampilkan Grafik
        </button>
    </form> --}}

    <br>
    <hr>

    <h6 class="mb-3">
        Bulan: {{ $months[$month] }} {{ $year }}
    </h6>

    <!-- FILTER -->
    <form method="GET" action="{{ route('admin.laporan') }}" class="row g-2 mb-4">
        <div class="col-md-3 col-6">
            <select name="year" class="form-select" onchange="this.form.submit()">
                @foreach($years as $y)
                    <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 col-6">
            <select name="month" class="form-select" onchange="this.form.submit()">
                @foreach($months as $key => $m)
                    <option value="{{ $key }}" {{ $key == $month ? 'selected' : '' }}>
                        {{ $m }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
    {{-- chart tiga garis --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h6>Grafik User Monitor</h6>
            <canvas id="chartMonitor"></canvas>
        </div>
    </div>

    <!-- CHART SEMUA USER -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h6>Semua User</h6>
            <canvas id="chartAll"></canvas>
        </div>
    </div>

    <!-- CHART ACTIVE -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h6>User Active</h6>
            <canvas id="chartActive"></canvas>
        </div>
    </div>

    <!-- CHART NOT ACTIVE -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h6>User Not Active</h6>
            <canvas id="chartNotActive"></canvas>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- <script>
const ctx = document.getElementById('grafikUser');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chartDays),
        datasets: [
            {
                label: 'Total User',
                data: @json($seriesTotal),
                borderColor: '#6c757d', // abu-abu
                backgroundColor: '#6c757d',
                borderWidth: 2,
                tension: 0.3
            },
            {
                label: 'Active',
                data: @json($seriesActive),
                borderColor: '#0d6efd', // biru
                backgroundColor: '#0d6efd',
                borderWidth: 2,
                tension: 0.3
            },
            {
                label: 'Non Active',
                data: @json($seriesNonActive),
                borderColor: '#dc3545', // merah
                backgroundColor: '#dc3545',
                borderWidth: 2,
                tension: 0.3
            }
        ]
    },
    options: {
        responsive: true,
        spanGaps: true
    }
});
</script> --}}

<script>
new Chart(document.getElementById('chartMonitor'), {
    type: 'line',
    data: {
        labels: @json($chartDays),
        datasets: [
            {
                label: 'Total User',
                data: @json($seriesTotal),
                borderColor: '#6c757d',
                borderWidth: 2,
                tension: 0.3
            },
            {
                label: 'Active',
                data: @json($seriesActive),
                borderColor: '#0d6efd',
                borderWidth: 2,
                tension: 0.3
            },
            {
                label: 'Non Active',
                data: @json($seriesNonActive),
                borderColor: '#dc3545',
                borderWidth: 2,
                tension: 0.3
            }
        ]
    },
    options: {
        responsive: true,
        spanGaps: true
    }
});
// Semua User
new Chart(document.getElementById('chartAll'), {
    type: 'line',
    data: {
        labels: @json($labels),
        datasets: [{
            label: 'Semua User',
            data: @json($allValues),
            borderWidth: 2,
            tension: 0.3
        }]
    }
});

// Active
new Chart(document.getElementById('chartActive'), {
    type: 'line',
    data: {
        labels: @json($labels),
        datasets: [{
            label: 'User Active',
            data: @json($activeValues),
            borderWidth: 2,
            tension: 0.3
        }]
    }
});

// Not Active
new Chart(document.getElementById('chartNotActive'), {
    type: 'line',
    data: {
        labels: @json($labels),
        datasets: [{
            label: 'User Not Active',
            data: @json($notActiveValues),
            borderWidth: 2,
            tension: 0.3
        }]
    }
});
</script>

<style>
.card {
    border-radius: 12px;
}

canvas {
    max-height: 350px;
}
</style>
@endsection