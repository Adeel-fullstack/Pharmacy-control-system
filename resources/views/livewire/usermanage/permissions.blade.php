<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i> Permissions
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="fw-bold"><i class="fa fa-book me-1"></i> Title</th>
                            <th class="fw-bold"><i class="fa fa-globe me-1"></i> Url Slug</th>
                            <th class="fw-bold"><i class="fa fa-map-pin me-1"></i> Route Name</th>
                            <th class="fw-bold"><i class="fa fa-pencil me-1"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="py-1 px-1 w-75 form-control" wire:model="title" placeholder="Name">
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </td>
                            <td>
                                <input type="text" class="py-1 px-1 w-75 form-control" wire:model="url_slug" placeholder="Url Slug">
                                @error('url_slug') <span class="text-danger">{{ $message }}</span> @enderror
                            </td>
                            <td>
                                <input type="text" class="py-1 px-1 w-75 form-control" wire:model="route_name" placeholder="Route Name">
                                @error('route_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </td>
                            <td>
                                <button type="button" class="btn btn-{{ $updateMode ? 'success' : 'danger' }} btn-sm" wire:click="{{ $updateMode ? 'update' : 'store' }}">
                                    <i class="fa fa-save me-1"></i> {{ $updateMode ? 'Update' : 'Save' }}
                                </button>
                            </td>
                        </tr>
                        @foreach($this->permissions as $permission)
                        <tr>
                            <td>{{ $permission->title }}</td>
                            <td>{{ $permission->url_slug }}</td>
                            <td>{{ $permission->route_name }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" wire:click="delete({{ $permission->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button class="btn btn-success btn-sm" wire:click="edit({{ $permission->id }})">
                                    <i class="fa fa-edit"></i>
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
