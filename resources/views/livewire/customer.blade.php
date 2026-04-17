<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-circle"></i> Add New Customer
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <form wire:submit.prevent="{{ $customerId ? 'update' : 'store' }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fa fa-user"></i> Name
                            </label>
                            <input type="text" class="form-control" id="name" name="name" wire:model="name" placeholder="Enter Customer Name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">
                                <i class="fa fa-whatsapp"></i> WhatsApp
                            </label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" wire:model="whatsapp" placeholder="Enter WhatsApp Number">
                            @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fa fa-envelope"></i> Email <font color="red"><b>(Optional)</b></font>
                            </label>
                            <input type="email" class="form-control" id="email" name="email" wire:model="email" placeholder="Enter Email (Optional)">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger float-end" type="submit">
                                <i class="fa fa-save mx-2"></i> {{ $customerId ? 'Update' : 'Publish' }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i> Customers List
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-user"></i> Name</th>
                            <th><i class="fa fa-whatsapp"></i> WhatsApp</th>
                            <th><i class="fa fa-envelope"></i> Email</th>
                            <th><i class="fa fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ ucfirst($customer->name) }}</td>
                                <td>{{ $customer->whatsapp }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success" wire:click="edit({{ $customer->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $customer->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6"><p>No Customer is available right now</p></td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
