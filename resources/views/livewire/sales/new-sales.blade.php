<div class="container-fluid mt-2">
    <div class="row">
        <!-- Main Sale Form -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header h5">
                    <i class="fa fa-plus-circle"></i> Add New Sale
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-body">
                    <form wire:submit.prevent="{{ $sale_id ? 'updateSale' : 'saveSale' }}">
                        
                        <!-- Medicine Name -->
                        <div class="mb-3">
                            <label for="medicine_id" class="form-label"><i class="fa fa-capsules"></i> Medicine Name</label>
                            <select class="form-select" name="medicine_id" id="medicine_id" wire:model="medicine_id" wire:change="update" placeholder="Enter Medicine Name">
                                <option value="">Select Medicine</option>
                                @foreach($stocks as $stock)
                                    <option value="{{ $stock->id }}">{{ $stock->medicineName }}</option>
                                @endforeach
                            </select>
                            @error('medicine_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label mt-3"><i class="fa fa-sort-numeric-up"></i> Quantity</label>
                            <input type="number" class="form-control" wire:model="quantity" placeholder="Enter Quantity">
                            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Sale Price -->
                        <div class="mb-3">
                            <label for="salePrice" class="form-label"><i class="fa fa-dollar-sign"></i> Sale Price</label>
                            <input type="number" class="form-control" wire:model="sale_price" readonly>
                            @error('sale_price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Purchase Price -->
                        <div class="mb-3">
                            <label for="purchasePrice" class="form-label mt-3"><i class="fa fa-shopping-cart"></i> Purchase Price</label>
                            <input type="number" class="form-control" wire:model="purchase_price" readonly>
                            @error('purchase_price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Discount -->
                        <div class="mb-3">
                            <label for="discount" class="form-label mt-3"><i class="fa fa-tags"></i> Discount (%) <font color="red"><b>(Optional)</b></font></label>
                            <input type="number" class="form-control" wire:model="discount" placeholder="Enter Discount">
                            @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Date of Sale -->
                        <div class="mb-3">
                            <label for="dateOfSale" class="form-label mt-3"><i class="fa fa-calendar"></i> Date of Sale</label>
                            <input type="date" class="form-control" wire:model="date_of_sale">
                            @error('date_of_sale') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Customer Type -->
                        <div class="mb-3">
                            <label for="customerType" class="form-label mt-3"><i class="fa fa-user"></i> Customer Type</label>
                            <select name="" wire:change="cus" class="form-control" id="">
                                <option value="old">Old Customers</option>
                                <option value="new">New Customers</option>
                            </select>
                            <!-- Old Customer Dropdown -->
                            @if($customer_type === 'old')
                                <div class="mb-3">
                                    <label for="customer" class="form-label mt-3">Select Old Customer</label>
                                    <select class="form-select" wire:model="customer_id">
                                        <option value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            <!-- New Customer Details -->
                            @elseif($customer_type === 'new')
                                <div class="mb-3">
                                    <label for="newCustomerName" class="form-label mt-3">Name</label>
                                    <input type="text" class="form-control" wire:model="new_customer_name" placeholder="Enter Customer Name">
                                    @error('new_customer_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="newCustomerWhatsapp" class="form-label mt-3">WhatsApp</label>
                                    <input type="text" class="form-control" wire:model="new_customer_whatsapp" placeholder="Enter WhatsApp Number">
                                    @error('new_customer_whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="newCustomerEmail" class="form-label mt-3">Email (Optional)</label>
                                    <input type="email" class="form-control" wire:model="new_customer_email" placeholder="Enter Email (Optional)">
                                    @error('new_customer_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                        <button type="submit" class="btn btn-danger mt-3">
                            <i class="fa fa-save mx-2"></i> {{ $sale_id ? 'Update Sale' : 'Add Sale' }}
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
