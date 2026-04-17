
<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i> All Users
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-user"></i> Name</th>
                                <th><i class="fa fa-envelope"></i> Email</th>
                                <th><i class="fa fa-file-alt"></i> Description</th>
                                <th><i class="fa fa-phone"></i> Phone</th>
                                <th><i class="fa fa-id-badge"></i> Role</th>
                                <th><i class="fa fa-cogs"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->users as $user)
                                <tr>
                                    <td>                                    
                        
                                        <img src="{{ asset('storage/userspicture/' . $user->picture) }}" class="img-fluid rounded-circle" height="50px" width="50px" alt="">

                                        {{ ucfirst($user->name) }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->description) ?? 'N/A' }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    <td>{{ ucfirst($user->role->title ?? 'N/A') }}</td>

                                    <td>
                                        <div>
                                            <button class="btn btn-danger" 
                                                    style="height: 30px; font-size: 0.9rem; padding: 0.25rem 0.5rem;"
                                                    wire:click="confirmDelete({{ $user->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button class="btn btn-success" 
                                                    style="height: 30px; font-size: 0.9rem; padding: 0.25rem 0.5rem;"
                                                    wire:click="editUser({{ $user->id }})">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @if($deleteUserId && $showDeleteModal)
        <div class="modal d-block" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" wire:click="$set('showDeleteModal', false)" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="$set('showDeleteModal', false)" class="btn btn-secondary">Cancel</button>
                        <button wire:click="deleteConfirmed" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>