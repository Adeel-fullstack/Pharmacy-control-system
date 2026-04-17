<div>
    <div>
        <div>
            <div class="container-fluid mt-1">
                <div class="row">
                    <!-- Add New general Form -->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-circle"></i> Add New General
                            </div>
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">{{ session('message') }}</div>
                                @endif
        
                                <form wire:submit.prevent="{{ $generaleId ? 'update' : 'store' }}">
                                    <!-- Logo Preview (above the label) -->
                                    <div class="mb-3 text-center">
                                        @if($logo)
                                            @if (is_string($logo))
                                                <img src="{{ asset('storage/' . $logo) }}" class="img-fluid" width="100%" alt="Logo">
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
        
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><i class="fa fa-user"></i> Name</label>
                                        <input type="text" class="form-control" name="name" wire:model="name" placeholder="Enter Name">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label"><i class="fa fa-envelope"></i> Email</label>
                                        <input type="email" class="form-control" name="email" wire:model="email" placeholder="Enter Email">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
                                    <!-- WhatsApp -->
                                    <div class="mb-3">
                                        <label for="whatsapp" class="form-label"><i class="fa fa-whatsapp"></i> WhatsApp</label>
                                        <input type="tel" class="form-control" name="whatsapp" wire:model="whatsapp" placeholder="Enter WhatsApp Number">
                                        @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
                                    <!-- Landline -->
                                    <div class="mb-3">
                                        <label for="landline" class="form-label"><i class="fa fa-phone"></i> Landline</label>
                                        <input type="tel" class="form-control" name="landline" wire:model="landline" placeholder="Enter Landline Number">
                                        @error('landline') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label"><i class="fa fa-map-marker"></i> Address</label>
                                        <input type="text" class="form-control" name="address" wire:model="address" placeholder="Enter Address">
                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
                                    <!-- Website -->
                                    <div class="mb-3">
                                        <label for="website" class="form-label"><i class="fa fa-globe"></i> Website</label>
                                        <input type="text" class="form-control" name="website" wire:model="website" placeholder="Enter Website">
                                        @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
                                    <!-- Publish Button -->
                                    <div class="card-footer">
                                        <button class="btn btn-danger float-end">
                                            <i class="fa fa-save mx-2"></i> {{ $generaleId ? 'Update' : 'Publish' }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        
                    <!-- All Generals Table -->
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-list"></i> All Generals
                            </div>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i> Name</th>
                                        <th><i class="fa fa-envelope"></i> Email</th>
                                        <th><i class="fa fa-whatsapp"></i> WhatsApp</th>
                                        <th><i class="fa fa-phone"></i> Landline</th>
                                        <th><i class="fa fa-globe"></i> Website</th>
                                        <th><i class="fa fa-cogs"></i> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($generales as $generale)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/generallogos/' . $generale->logo) }}" class="img-fluid rounded-circle" height="50px" width="50px" alt="">
                                                {{ $generale->name }}
                                            </td>
                                            <td>{{ $generale->email }}</td>
                                            <td>{{ $generale->whatsapp }}</td>
                                            <td>{{ $generale->landline }}</td>
                                            <td><a href="{{ $generale->website }}" target="_blank">{{ $generale->website }}</a></td>
                                            <td>
                                                <button class="btn btn-sm btn-success" wire:click="edit({{ $generale->id }})">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $generale->id }})">
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
    </div>
</div>
