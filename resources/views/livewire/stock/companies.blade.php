<div>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-circle"></i> Add New Company
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="{{ $companyId ? 'update' : 'store' }}">
                            <!-- Logo Preview (above the label) -->
                            <div class="mb-3 text-center">
                                @if($logo)
                                    @if (is_string($logo))
                                        <img src="{{ asset('storage/logos/' . $logo) }}" class="img-fluid" width="100%" alt="Logo">
                                    @else
                                        <img src="{{ $logo->temporaryUrl() }}" class="img-fluid" width="100%" alt="Logo">
                                    @endif
                                @endif
                            </div>

                            <!-- Logo Upload -->
                            <div class="mb-3">
                                <label for="logo" class="form-label"><i class="fa fa-upload"></i> Logo</label>
                                <input type="file" class="form-control" name="logo" wire:model="logo" accept="image/*">
                                @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Company Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label"><i class="fa fa-building"></i> Company Name</label>
                                <input type="text" class="form-control" name="name" wire:model="name" placeholder="Enter Company Name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label"><i class="fa fa-phone"></i> Phone</label>
                                <input type="tel" class="form-control" name="phone" wire:model="phone" placeholder="Enter Phone Number">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Website -->
                            <div class="mb-3">
                                <label for="website" class="form-label"><i class="fa fa-globe"></i> Website <font color="red"><b>(Optional)</b></font></label>
                                <input type="text" class="form-control" name="website" wire:model="website" placeholder="Website">
                                @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label"><i class="fa fa-info-circle"></i> Description</label>
                                <textarea class="form-control" style="resize: none" name="description" wire:model="description" rows="3" placeholder="Enter Description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-danger float-end">
                                    <i class="fa fa-save mx-2"></i> {{ $companyId ? 'Update' : 'Publish' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-list"></i> All Companies
                    </div>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-building"></i> Name</th>
                                <th><i class="fa fa-phone"></i> Phone</th>
                                <th><i class="fa fa-globe"></i> Website</th>
                                <th><i class="fa fa-cogs"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/logos/' . $company->logo) }}" class="img-fluid rounded-circle" height="50px" width="50px" alt="">
                                        {{ ucfirst($company->name) }}
                                    </td>
                                    <td>{{ $company->phone }}</td>
                                    <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-success" wire:click="edit({{ $company->id }})">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $company->id }})">
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
</div>
