<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-circle"></i> Add New Designation
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="department_id" class="form-label">
                            <i class="fa fa-building"></i> Department
                        </label>
                        <select class="form-select" name="department_id" id="department_id" wire:model="department_id">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department }}</option>
                            @endforeach
                        </select>
                        @error('department_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="designation_id" class="form-label">
                            <i class="fa fa-briefcase"></i> Designation
                        </label>
                        <input type="text" class="form-control" name="designation_id" id="designation_id" wire:model="designation_id" placeholder="Enter Designation">
                    </div>
                    <div class="mb-3">
                        <label for="responsibilities" class="form-label">
                            <i class="fa fa-tasks"></i> Responsibilities
                        </label>
                        <textarea class="form-control" name="responsibilities" id="responsibilities" wire:model="responsibilities" rows="3" style="resize: none;" placeholder="Enter Responsibilities"></textarea>
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
                    <i class="fa fa-list"></i> All Designations
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-building"></i> Department</th>
                            <th><i class="fa fa-briefcase"></i> Designation</th>
                            <th><i class="fa fa-tasks"></i> Responsibilities</th>
                            <th><i class="fa fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($designations as $designation)
                        <tr>
                            <td>{{ $designation->department->department }}</td>
                            <td>{{ $designation->designation_id }}</td>
                            <td>{{ $designation->responsibilities }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" wire:click="edit({{ $designation->id }})" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click="delete({{ $designation->id }})" onclick="return confirm('Are you sure you want to delete this designation?')" title="Delete">
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
