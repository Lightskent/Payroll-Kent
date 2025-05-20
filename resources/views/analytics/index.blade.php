@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Payroll Analytics</h1>

        {{-- Payroll Overview Chart --}}
        <div class="mb-5">
            <canvas id="payrollChart" height="120"></canvas>
        </div>

        {{-- Department-wise Employee Tables --}}
        @foreach($departments as $department)
            <div class="mb-5">
                <h3>{{ $department->name }}</h3>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Employee</th>
                            <th>Salary</th>
                            <th>Total Payroll Paid</th>
                            <th>Last Payment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($department->employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>${{ number_format($employee->salary->amount, 2) }}</td>
                                <td>${{ number_format($employee->payrollRecords->sum('amount'), 2) }}</td>
                                <td>{{ optional($employee->payrollRecords->sortByDesc('paid_at')->first())->paid_at ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    {{-- Include Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   @php
    $employees = $departments->flatMap->employees;

    $labels = $employees->pluck('name');
    $salaries = $employees->map(fn($e) => $e->salary->amount ?? 0);
    $payrolls = $employees->map(fn($e) => $e->payrollRecords->sum('amount'));
@endphp

<h2>All Employees</h2>
<ul>
    @foreach($departments as $department)
        @foreach($department->employees as $employee)
            <li>{{ $employee->name ?? 'NO NAME FOUND' }}</li>
        @endforeach
    @endforeach
</ul>


    <script>
        const ctx = document.getElementById('payrollChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [
                    {
                        label: 'Salary ($)',
                        data: {!! json_encode($salaries) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Payroll Paid ($)',
                        data: {!! json_encode($payrolls) !!},
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Employee Salary vs Payroll Paid'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Amount in USD'
                        }
                    }
                }
            }
        });
    </script>
@endsection

