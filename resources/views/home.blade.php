<!-- resources/views/home.blade.php -->

@extends('dashboard')

@section('content')
<div class="w-full flex flex-col">
    <div class="cardsSummary flex justify-between">
        <div class="cardSummary bg-white rounded shadow p-2">
            <div class="cardSummaryTitle flex flex-col justify-between items-center">
                <p class="text-xl font-bold">Total Income</p>
                <p class="text-xl font-bold text-green-500">Rp. 3000</p>
            </div>
        </div>
        <div class="cardSummary bg-white flex-col rounded shadow p-2">
        <div class="cardSummaryContent flex flex-col justify-between items-center">
                <p class="text-xl font-bold">Total Expenses</p>
                <p class="text-xl font-bold text-red-500">Rp. 200</p>
            </div>
        </div>
        <div class="cardSummary bg-white rounded shadow p-2">
            <div class="cardSummaryTitle flex flex-col justify-between items-center">
                <p class="text-xl font-bold">Total Balance</p>
                <p class="text-xl font-bold text-green-500">Rp. 800</p>
            </div>
        </div>
        <div class="cardSummary bg-white rounded shadow p-2">
        <div class="cardSummaryContent flex flex-col justify-between items-center">
                <p class="text-xl font-bold">Total Users</p>
                <p class="text-xl font-bold text-red-500">4</p>
            </div>
        </div>
    </div>
<div class="container flex space-x-12 mt-12 flex-row w-full">
    <div class="container w-1/2 h-96">
        <div class="bg-white rounded shadow">
            {!! $expensesChart->container() !!}
        </div>
    </div>
    <div class="container w-1/2 ">
        <div class="bg-white rounded shadow">
            {!! $incomeChart->container() !!}
        </div>
    </div>
</div>
</div>
<script src="{{ $expensesChart->cdn() }}"></script>
{{ $expensesChart->script() }}
<script src="{{ $incomeChart->cdn() }}"></script>
{{ $incomeChart->script() }}
@endsection
