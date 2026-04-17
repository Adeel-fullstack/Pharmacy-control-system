<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user-tag"></i> Roles
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="font-weight-bold"><i class="fa fa-book"></i> Title</th>
                                <th class="font-weight-bold"><i class="fa fa-toggle-on"></i> Status</th>
                                <th class="font-weight-bold"><i class="fa fa-cogs"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="py-1 px-1 w-75 form-control" name="title" wire:model="title" placeholder="Title">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <input type="text" class="py-1 px-1 w-75 form-control" name="status" wire:model="status" placeholder="Status">
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <div style="display:inline-block;">    
                                        <button type="submit" wire:click.prevent="{{ $updateMode ? 'update' : 'store' }}" class="btn btn-{{ $updateMode ? 'success' : 'primary' }} btn-sm">
                                            <i class="fa fa-{{ $updateMode ? 'edit' : 'save' }} me-1"></i> {{ $updateMode ? 'Update' : 'Save' }}
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            @foreach($this->roles as $role)
                                <tr>
                                    <td>{{ ucfirst($role->title) }}</td>
                                    <td>{{ ucfirst($role->status) }}</td>
                                    <td>
                                        <button wire:click="edit({{ $role->id }})" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button wire:click="delete({{ $role->id }})" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#">
                                            <button class="btn btn-warning btn-sm"><i class="fa fa-key"></i></button>
                                        </a>
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
