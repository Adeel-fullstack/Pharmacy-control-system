<div class="container-fluid mt-4">

@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">

    <!-- LEFT SIDE -->
    <div class="col-lg-9">

        <!-- 🔹 CARD 1: SALE ENTRY -->
        <div class="card mb-3">
            <div class="card-header">
                <h5>Sale Entry</h5>
            </div>

            <div class="card-body">
                <div class="row align-items-end">

                    <!-- Medicine -->
                    <div class="col-md-3 position-relative">
                        <label class="form-label">Medicine</label>
                        <input type="text"
                               class="form-control"
                               wire:model.debounce.300ms="medicine_search"
                               placeholder="Type medicine"
                               autocomplete="off">

                        @if(!empty($medicine_results))
                        
     <ul class="list-group position-absolute w-100 shadow" 
    style="z-index:1000; max-height:220px; overflow-y:auto; background-color:#f8f9fa;">
    @foreach($medicine_results as $medicine)
        <li class="list-group-item d-flex justify-content-between
            {{ $medicine->total_items == 0 ? 'text-muted' : 'list-group-item-action' }}"
            @if($medicine->total_items > 0)
                wire:click="selectMedicine({{ $medicine->id }})"
            @endif
            style="cursor:pointer;">
            <span>{{ $medicine->medicineName }}</span>
            <small>Stock: {{ $medicine->total_items }}</small>
        </li>
    @endforeach
</ul>


                        @endif
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-2">
                        <label class="form-label">Qty</label>
                        <input type="number"
                               class="form-control"
                               wire:model.lazy="quantity"
                               wire:change="calculateTotalPrice"
                               min="1">
                    </div>

                    <!-- Price -->
                    <div class="col-md-2">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" wire:model="price" readonly>
                    </div>

                    <!-- Discount -->
                    <div class="col-md-2">
                        <label class="form-label">Discount</label>
                        <input type="number"
                               class="form-control"
                               wire:model="medicine_discount"
                               wire:input="calculateTotalPrice"
                               min="0">
                    </div>

                    <!-- Total -->
                    <div class="col-md-2">
                        <label class="form-label">Total</label>
                        <input type="number" class="form-control" wire:model="total_price" readonly>
                    </div>

                    <!-- Add Button -->
                    <div class="col-md-1">
                        <button class="btn btn-primary w-100"
                                wire:click="addStock">
                            +
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- 🔹 CARD 2: SALE DETAILS TABLE -->
        <div class="card">
            <div class="card-header">
                <h5>Sale Details</h5>
            </div>

            <div class="card-body p-0">
                @if(!empty($sales))
                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Medicine</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th width="80">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->stock->medicineName }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ $sale->total_price }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $sale->id }})">
                                            ✕
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-3 text-muted">
                        No sales available.
                    </div>
                @endif
            </div>
        </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="col-lg-3">

        <!-- Bill Summary -->
        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Bill No:</strong> {{ $order_id }}</p>
                <p><strong>Total:</strong> {{ $total_bill }}</p>
            </div>
        </div>

        <!-- Payment -->
        <div class="card">
            <div class="card-body">
                <label class="form-label">Payment Method</label>
                <select class="form-select" wire:model="payment_method">
                    <option value="">Select</option>
                    @foreach($titles as $title)
                        <option value="{{ $title->id }}">{{ $title->title }}</option>
                    @endforeach
                </select>

                <button class="btn btn-danger w-100 mt-3"
                        wire:click="checkout">
                    Checkout
                </button>
            </div>
        </div>

    </div>

</div>
</div>
