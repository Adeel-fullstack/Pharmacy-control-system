<div>
    <div class="container-fluid">
        <div class="row">
            <!-- Add New Department Card -->
            <div class="col-lg-3">
                <div class="card" style="min-height: 250px">
                    <div class="card-header">
                        <i class="fa fa-plus-circle"></i> Add New Department
                    </div>
                    <div class="card-body">
                        <div class="mt-2">
                            <label for="department" class="form-label">
                                <i class="fa fa-list"></i> Department
                            </label>
                            <input type="text" class="form-control mt-2" wire:model="department" placeholder="Enter department">
                            @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger float-end" wire:click="saveDepartment">
                            <i class="fa fa-save me-2"></i> {{ $editMode ? 'Update' : 'Publish' }}
                        </button>
                    </div>
                </div>
            </div>
    
            <!-- Table of All Departments -->
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-list"></i> All Departments
                    </div>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-9"><i class="fa fa-cube"></i> Departments</th>
                                <th class="col-3"><i class="fa fa-cogs"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $department)
                                <tr>
                                    <td>{{ $department->department }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" wire:click="editDepartment({{ $department->id }})">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteDepartment({{ $department->id }})" onclick="return confirm('Are you sure you want to delete this department?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">No departments available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
