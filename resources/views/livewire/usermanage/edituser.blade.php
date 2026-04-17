<div class="container-fluid mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><i class="fa fa-user-edit"></i> Edit User Information</h5>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <form wire:submit.prevent="update">
                    <div class="row">
                        <!-- Left side: Name and Email fields -->
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="name" class="form-label"><i class="fa fa-user"></i> Name</label>
                                <input type="text" class="form-control" wire:model.defer="name" placeholder="Enter Name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label"><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" class="form-control" wire:model.defer="email" placeholder="Enter Email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
<!-- Right side: Image preview and file input -->
<div class="col-lg-6 d-flex flex-column align-items-center">
    <div class="mb-3">
        @if($userpicture)
            <img src="{{ asset('storage/userspicture/' . $user->picture) }}" class="img-fluid img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;" alt="User Image">
        @else
            <img src="https://via.placeholder.com/200" class="img-fluid img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;" alt="Placeholder Image">
        @endif
    </div>
    <input type="file" class="form-control-file" wire:model="picture" accept="image/*">
    @error('picture') <span class="text-danger">{{ $message }}</span> @enderror
</div>

    

                    <div class="row">
                        <!-- Phone and Role fields -->
                        <div class="col-lg-6 mb-3">
                            <label for="phone" class="form-label"><i class="fa fa-phone"></i> Phone</label>
                            <input type="text" class="form-control" wire:model.defer="phone" placeholder="Enter Phone Number">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
    <div class="col-lg-6 mb-3">
    <label for="role" class="form-label"><i class="fa fa-list"></i> Role</label>
    <select class="form-select" wire:model.defer="role_id">
      @foreach($roles as $role)
    <option value="{{ $role->id }}">{{ $role->title }}</option> 
     @endforeach        
             </select>
    @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
         </div>

       
                    <div class="row">
                        <!-- Description field -->
                        <div class="col-lg-12 mb-3">
                            <label for="description" class="form-label"><i class="fa fa-file-alt"></i> Description</label>
                            <textarea class="form-control" wire:model.defer="description" rows="3" style="resize: none;" placeholder="Enter Description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Password and Confirm Password fields -->
                        <div class="col-lg-6 mb-3">
                            <label for="password" class="form-label"><i class="fa fa-lock"></i> Password</label>
                            <input type="password" class="form-control" wire:model.defer="password" placeholder="Enter Password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="confirmPassword" class="form-label"><i class="fa fa-lock"></i> Confirm Password</label>
                            <input type="password" class="form-control" wire:model.defer="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-save mx-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
