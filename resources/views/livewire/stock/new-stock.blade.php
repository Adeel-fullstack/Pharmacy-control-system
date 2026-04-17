<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header h5">
                    <i class="fa fa-plus-circle"></i> Add New Stock
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="createStock">
                        
                        <div class="mb-3 text-end">
                            @if($medicinelogo)
                                @if (is_string($medicinelogo))
                                    <img src="{{ asset('storage/medicinelogos/' . $medicinelogo) }}" class="img-fluid" width="10%" alt="Logo">
                                @else
                                    <img src="{{ $medicinelogo->temporaryUrl() }}" class="img-fluid" width="10%" alt="Logo">
                                @endif
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="medicinelogo" class="form-label">
                                <i class="fa fa-upload"></i> Logo <font color="red"><b>(Optional)</b></font>
                            </label>
                            <input type="file" class="form-control" wire:model="medicinelogo" accept="image/*">
                            @error('medicinelogo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="medicineName" class="form-label"><i class="fa fa-capsules"></i> Medicine Name</label>
                            <input type="text" class="form-control" wire:model="medicineName" placeholder="Enter Medicine Name">
                            @error('medicineName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="barcode" class="form-label"><i class="fa fa-barcode"></i> Barcode</label>
                            <input type="text" class="form-control" wire:model="barcode" placeholder="Enter Barcode">
                            @error('barcode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label"><i class="fa fa-tags"></i> Type</label>
                            <select class="form-select" wire:model="type" wire:change="updatePackagingSection">
                                <option value=""selected>Select Type</option>
                                @foreach($types ?? [] as $type)
                                    <option value="{{ $type->id }}">{{ ucfirst($type->type) }}</option>
                                @endforeach
                            </select>
                            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3" wire:loading.remove wire:target="type">
                            <label for="packagingType" class="form-label"><i class="fa fa-box"></i> Packaging Type</label>
                            <select class="form-select" wire:model="packaging_type" wire:change="updateDynamicFields">
                                <option value="" selected>Select Packaging Type</option>
                                <option value="Sachets">Sachets</option>
                                <option value="Blisters">Blisters</option>
                                <option value="Bottles">Bottles</option>
                                <option value="Injections">Injections</option>
                                <option value="Tubes">Tubes</option>
                                <option value="Drops">Drops</option>
                            </select>
                            @error('packaging_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if($packaging_type)
                            @include('livewire.stock.dynamic-fields')
                        @endif

                        <div class="mb-3">
                            <label for="company_id" class="form-label"><i class="fa fa-building"></i> Company Name</label>
                            <select class="form-select" wire:model="company_id" wire:change="select_company">
                                <option value="" selected>Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="distributor_id" class="form-label"><i class="fa fa-truck"></i> Distributor Name</label>
                            <select class="form-select" wire:model="distributor_id">
                                <option value="" selected>Select Distributor</option>
                                @foreach($distributors as $distributor)
                                    <option value="{{ $distributor->id }}">{{ ucfirst($distributor->distributor_name)}}</option>
                                @endforeach
                            </select>
                            @error('distributor_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label"><i class="fa fa-sort-numeric-up"></i> Quantity</label>
                            <input type="number" class="form-control" wire:model="quantity" placeholder="Enter Quantity">
                            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="maxDiscount" class="form-label"><i class="fa fa-percent"></i> Max Discount (%)</label>
                            <input type="number" class="form-control" wire:model="maxDiscount" placeholder="Enter Max Discount" step="0.01" min="0" max="100">
                            @error('maxDiscount') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="text-end">
                            <button class="btn btn-danger">
                                <i class="fa fa-save mx-2" type='submit'></i> Publish
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
