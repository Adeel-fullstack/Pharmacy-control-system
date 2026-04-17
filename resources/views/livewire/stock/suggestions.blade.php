<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-circle"></i> Add New Suggestion
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <form wire:submit.prevent="{{ $suggestionId ? 'update' : 'store' }}">


                    <div class="mb-3">
                        <label for="medicineName" class="form-label">
                            <i class="fa fa-pills"></i> Medicine Name
                        </label>
                        <input type="text" class="form-control" id="medicineName" name="medicineName" wire:model="medicineName" placeholder="Enter Medicine Name">
                        @error('medicineName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">
                            <i class="fa fa-building"></i> Company Name
                        </label>
                        <input type="text" class="form-control" id="companyName" name="companyName" wire:model="companyName" placeholder="Enter Company Name">
                        @error('companyName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="distributorName" class="form-label">
                            <i class="fa fa-truck"></i> Distributor Name <font color="red"><b>(Optional)</b></font>
                        </label>
                        <input type="text" class="form-control" id="distributorName" name="distributorName" wire:model="distributorName" placeholder="Enter Distributor Name (Optional)">
                        @error('distributorName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger float-end">
                        <i class="fa fa-save mx-2"></i> {{ $suggestionId ? 'Update' : 'Publish' }}
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i> Suggestions List
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-pills"></i> Medicine Name</th>
                            <th><i class="fa fa-building"></i> Company Name</th>
                            <th><i class="fa fa-truck"></i> Distributor Name</th>
                            <th><i class="fa fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suggestions as $suggestion)
                            <tr>
                                <td>{{ ucfirst($suggestion->medicineName) }}</td>
                                <td>{{ ucfirst($suggestion->companyName) }}</td>
                                <td>{{ ucfirst($suggestion->distributorName)}}</td>
                                <td>
                                    <button class="btn btn-sm btn-success" wire:click="edit({{ $suggestion->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $suggestion->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
