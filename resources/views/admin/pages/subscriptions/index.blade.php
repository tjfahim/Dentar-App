@extends('admin.layouts.master')

@section('title')
    Subscription |
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Subscription List</h4>
                    <button type="button" class="btn btn-outline-info btn-sm btn-icon-text mx-1" onclick="printTable()">
                        <i class="mdi mdi-printer"></i>
                        Print
                    </button>
                    {{-- <div class="d-flex">
                        <a href="" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="Add Quiz"><i class="mdi mdi-library-plus"></i> Add Quiz</a>
                    </div> --}}
                </div>
                <div class="table-responsive pt-3">
                    <table id="courseReportManageTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center bg-info text-dark">
                                <th># Id</th>
                                <th>User Name</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Paid Amount</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <tbody>
                        @forelse ($subscriptions as $subscription)
    <tr class="text-center">
        <td>{{ $subscription->id ?? '' }}</td>
        <td>{{ $subscription->user->name ?? '' }}</td>
        <td>{{ $subscription->inAppItem->name ?? '' }}</td>
        <td>{{ $subscription->quantity ?? '' }}</td>
        <td>{{ $subscription->paid_amount ?? '' }}</td>
        <td>{{ $subscription->payment_status ?? '' }}</td>
        <td>{{ $subscription->payment_method ?? '' }}</td>
        <td>{{ $subscription->transaction_id ?? '' }}</td>
        <td>{{ $subscription->created_at->format('j F Y, g:i a') ?? '' }}</td>
        <td>
            @if($subscription->payment_status !== 'completed')
                <a href="{{ route('subscription.edit', $subscription->id) }}" class="btn btn-sm btn-info me-2" data-toggle="tooltip" data-placement="right" title="Edit Item"><i class="mdi mdi-grease-pencil"></i></a>
            @endif
        </td>
    </tr>
@empty
                            <tr class="text-center">
                                <td colspan="8">No data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
