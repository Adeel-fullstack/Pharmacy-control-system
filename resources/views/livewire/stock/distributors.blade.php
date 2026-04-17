<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-circle"></i> Add New Distributor
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="company_id" class="form-label">
                            <i class="fa fa-industry"> </i>Company Name
                        </label>
                        <select class="form-select" name="company_id" id="company_id" wire:model="company_id">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="distributor_name" class="form-label">
                            <i class="fa fa-user"></i> Distributor Name
                        </label>
                        <input type="text" class="form-control" name="distributor_name" id="distributor_name" wire:model="distributor_name" placeholder="Enter Distributor Name">
                    </div>
                    <div class="mb-3">
                        <label for="distributor_email" class="form-label">
                        <i class="fa-solid fa-envelope" style="font-size:0.7rem;"></i> Distributor Email
                      </label>
                      <input type="email" class="form-control" name="distributor_email" id="distributor_email" wire:model="distributor_email" placeholder="Enter Distributor Email">
                   </div>
                    <div class="mb-3">
                        <label for="contact_person" class="form-label">
                            <i class="fa fa-user"></i> Contact Person
                        </label>
                        <input type="text" class="form-control" name="contact_person" id="contact_person" wire:model="contact_person" placeholder="Enter Contact Person Name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            <i class="fa fa-phone"></i> Phone
                        </label>
                        <input type="tel" class="form-control" name="phone" id="phone" wire:model="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">
                            <i class="fa fa-map-marker-alt"></i> Address
                        </label>
                        <textarea name="address" class="form-control" name="address" id="address" wire:model="address" rows="2" placeholder="Enter Address"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    @if($updateMode)
                        <button class="btn btn-success float-end" wire:click="update">
                            <i class="fa fa-save mx-2"></i> Update
                        </button>
                    @else
                        <button class="btn btn-danger float-end" wire:click="store">
                            <i class="fa fa-save mx-2"></i> Publish
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i> All Distributors
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            
                            <th><i class="fa fa-user"></i> Distributor Name</th>
                            <th><i class="fa-solid fa-envelope" style="font-size:0.7rem;"></i> Distributor Email</th>
                            <th><i class="fa fa-user"></i> Contact Person</th>
                            <th><i class="fa fa-phone"></i> Phone</th>
                            <th><i class="fa fa-map-marker-alt"></i> Address</th>
                            <th><i class="fa fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($distributors as $distributor)
                        <tr>
                        
                            <td>{{ ucfirst($distributor->distributor_name) }}</td>
                            <td>
                            <a href="#">
                                {{$distributor->distributor_email}}
                           </a>
                           </td>
                            <td>{{ $distributor->contact_person }}</td>
                            <td>{{ $distributor->phone }}</td>
                            <td>{{ ucfirst($distributor->address) }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" wire:click="edit({{ $distributor->id }})" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click="delete({{ $distributor->id }})" onclick="return confirm('Are you sure you want to delete this distributor?')" title="Delete">
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
