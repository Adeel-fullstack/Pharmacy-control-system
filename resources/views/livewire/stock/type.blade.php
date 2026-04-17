<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card" style="min-height: 250px">
                <div class="card-header">
                    <i class="fa fa-plus-circle"></i> Add New Type
                </div>
                <div class="card-body">
                    <div class="mt-2">
                        <label for="type" class="form-label"><i class="fa fa-list"></i> Type</label>
                        <input type="text" class="form-control mt-2" wire:model="type" placeholder="Enter type">
                        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger float-end" wire:click="saveType">
                        <i class="fa fa-save me-2"></i> {{ $editMode ? 'Update' : 'Publish' }}
                    </button>
                </div>
            </div>
        </div>

        <!-- Table of All Types -->
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-list"></i> All Types
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-9"><i class="fa fa-cube"></i> Types</th>
                            <th class="col-3"><i class="fa fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type) <!-- Using Livewire property -->
                            <tr>
                                <td>{{ ucfirst($type->type) }}</td> <!-- Display the type -->
                                <td>
                                    <button class="btn btn-sm btn-success" wire:click="editType({{ $type->id }})"> <!-- Edit button -->
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" wire:confirm="Are you sure? You want to delete type." wire:click="deleteType({{ $type->id }})"> <!-- Delete button -->
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