<div class="container-fluid mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><i class="fa fa-user-edit"></i> User Information</h5>
                </div>
                <div class="card-body">
                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="saveUser">
                        <div class="row">
                            <!-- Left side: Name and Email fields stacked vertically -->
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label"><i class="fa fa-user"></i> Name</label>
                                    <input type="text" class="form-control" wire:model.defer="name" placeholder="Enter Name">
                                    @error('name')
                                        <font color="red"><b>{{ $message }}</b></font>
                                    @enderror
                                </div>
                            
                                <div class="mb-4">
                                    <label for="email" class="form-label"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="email" class="form-control" wire:model.defer="email" placeholder="Enter Email">
                                    @error('email')
                                        <font color="red"><b>{{ $message }}</b></font>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Right side: Image preview and file input, centered vertically -->
                            <div class="col-lg-6 d-flex flex-column align-items-center">
                                <!-- Image preview -->
                                <div class="mb-2 text-center">
                                    @if($picture)
                                        @if (is_string($picture))
                                            <img src="{{ asset('storage/userspicture/' . $userpicture) }}" class="img-fluid img-thumbnail" style="width: 200; height: 200px; object-fit: cover;" alt="User Image">
                                        @else
                                            <img src="{{ $picture->temporaryUrl() }}" class="img-fluid img-thumbnail" style="width: 200; height: 200px; object-fit: cover;" alt="User Image">
                                        @endif
                                    @else
                                        <img src="https://via.placeholder.com/150" class="img-fluid img-thumbnail" style="width: 200; height: 200px; object-fit: cover;" alt="User Image">
                                    @endif
                                </div>
                            
                                <!-- File input -->
                                <input type="file" class="form-control-file" wire:model="picture" accept="image/*">
                                @error('picture') 
                                    <font color="red"><b>{{ $message }}</b></font>
                                @enderror
                            </div>
                            
                            
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label"><i class="fa fa-phone"></i> Phone</label>
                                <input type="text" class="form-control" wire:model.defer="phone" placeholder="Enter Phone Number">
                                @error('phone')
                                    <font color="red"><b>{{ $message }}</b></font>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role" class="form-label"><i class="fa fa-list"></i> Role</label>
                                <select class="form-select" wire:model="role_id">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endforeach
                                </select>
                                @error('role_id')
                                    <font color="red"><b>{{ $message }}</b></font>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="description" class="form-label"><i class="fa fa-file-alt"></i> Description</label>
                                <textarea class="form-control" wire:model.defer="description" rows="3" style="resize: none;" placeholder="Enter Description"></textarea>
                                @error('description')
                                    <font color="red"><b>{{ $message }}</b></font>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label"><i class="fa fa-lock"></i> Password</label>
                                <input type="password" class="form-control" wire:model.defer="password" placeholder="Enter Password">
                                @error('password')
                                    <font color="red"><b>{{ $message }}</b></font>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="confirmPassword" class="form-label"><i class="fa fa-lock"></i> Confirm Password</label>
                                <input type="password" class="form-control" wire:model.defer="password_confirmation" placeholder="Confirm Password">
                                @error('confirmPassword')
                                    <font color="red"><b>{{ $message }}</b></font>
                                @enderror
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-danger">
                                <i class="fa fa-save mx-2" type='submit'></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>