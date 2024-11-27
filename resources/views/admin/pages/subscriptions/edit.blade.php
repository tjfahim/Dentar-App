@extends('admin.layouts.master')

@section('title')
    Edit Subscription |
@endsection

@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <form action="{{ route('subscription.update', $subscription->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edit Subscription</h4>
                        <a href="{{ route('subscription.index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="List Subscriptions">
                            <i class="mdi mdi-step-backward"></i> List Subscriptions
                        </a>
                    </div>
                    <div class="row mt-5">

                        <input type="hidden" id="user_id" name="user_id" value="{{ $subscription->user_id }}">
                        <input type="hidden" id="in_app_item_id" name="in_app_item_id" value="{{ $subscription->in_app_item_id }}">
                        <!-- User Name -->
                        <div class="mt-2">
                            <label for="user_name">User Name</label>
                            <input type="text" name="user_name" class="form-control border-info" value="{{ old('user_name', $subscription->user->name) }}" placeholder="Enter User Name" disabled>
                            @error('user_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Item -->
                        <div class="mt-2">
                            <label for="item_name">Item</label>
                            <input type="text" name="item_name" class="form-control border-info" value="{{ old('item_name', $subscription->inAppItem->name) }}" placeholder="Enter User Name" disabled>

                            @error('item')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="mt-2">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control border-info" value="{{ old('quantity', $subscription->quantity) }}" placeholder="Enter Quantity" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Paid Amount -->
                        <div class="mt-2">
                            <label for="paid_amount">Paid Amount</label>
                            <input type="number" step="0.01" name="paid_amount" class="form-control border-info" value="{{ old('paid_amount', $subscription->paid_amount) }}" placeholder="Enter Paid Amount" required>
                            @error('paid_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Status -->
                        <div class="mt-2">
                            <label for="payment_status">Payment Status</label>
                            <select name="payment_status" class="form-control border-info" required>
                                <option value="pending" {{ old('payment_status', $subscription->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ old('payment_status', $subscription->payment_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="failed" {{ old('payment_status', $subscription->payment_status) == 'failed' ? 'selected' : '' }}>Failed</option>
                                {{-- <option value="returned" {{ old('payment_status', $subscription->payment_status) == 'returned' ? 'selected' : '' }}>Returned</option> --}}
                            </select>
                            @error('payment_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Method -->
                        <div class="mt-2">
                            <label for="payment_method">Payment Method</label>
                            <input type="text" name="payment_method" class="form-control border-info" value="{{ old('payment_method', $subscription->payment_method) }}" placeholder="Enter Payment Method">
                            @error('payment_method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Transaction ID -->
                        <div class="mt-2">
                            <label for="transaction_id">Transaction ID</label>
                            <input type="text" name="transaction_id" class="form-control border-info" value="{{ old('transaction_id', $subscription->transaction_id) }}" placeholder="Enter Transaction ID">
                            @error('transaction_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-sm btn-info"><i class="mdi mdi-content-save"></i> Update Subscription</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
