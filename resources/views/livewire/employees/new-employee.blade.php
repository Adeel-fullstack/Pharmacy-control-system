<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><i class="fa fa-user-edit"></i> Employee Information</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="createEmployee">
                        <div class="row align-items-center">
                            <!-- Picture Upload with Preview -->
                            <div class="col-lg-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="picture" class="form-label mb-0"><i class="fa fa-image"></i> Profile Picture</label>
                                    @if($picture)
                                        @if (is_string($picture))
                                            <img src="{{ asset('storage/' . $picture) }}" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;" alt="picture">
                                        @else
                                            <img src="{{ $picture->temporaryUrl() }}" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;" alt="picture">
                                        @endif
                                    @endif
                                </div>
                                <input type="file" class="form-control mt-2" id="picture" wire:model="picture" accept="image/*">
                                @error('picture') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Name Input -->
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label"><i class="fa fa-user"></i> Name</label>
                                <input type="text" class="form-control" id="name" name="name" wire:model="name" placeholder="Enter Name" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="contact" class="form-label"><i class="fa fa-phone"></i> Contact</label>
                                <input type="tel" class="form-control" id="contact" name="contact" wire:model="contact" placeholder="Enter Contact" required>
                                @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="altContact" class="form-label"><i class="fa fa-phone-alt"></i> Alternative Contact</label>
                                <input type="tel" class="form-control" id="altContact" name="altContact" wire:model="altContact" placeholder="Enter Alternative Contact">
                                @error('altContact') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label"><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" class="form-control" id="email" name="email" wire:model="email" placeholder="Enter Email" required>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="department_id" class="form-label"><i class="fa fa-building"></i> Department</label>
                                <select class="form-select" id="department_id" name="department_id" wire:model="department_id" wire:change="select_department" required>
                                    <option value="" selected>Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department }}</option>
                                    @endforeach                                
                                </select>
                                @error('department_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <!-- Designation Dropdown with Database Options -->
                            <div class="col-lg-6 mb-3">
                                <label for="designation_id" class="form-label"><i class="fa fa-briefcase"></i> Designation</label>
                                <select class="form-select" id="designation_id" name="designation_id" wire:model="designation_id" required>
                                    <option value="" selected>Select Designation</option>
                                    @foreach($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->designation_id }}</option>
                                    @endforeach
                                    </select>
                                    @error('designation_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            <div class="col-lg-6 mb-3">
                                <label for="branch" class="form-label"><i class="fa fa-map-marker-alt"></i> Assigned Branch</label>
                                <input type="text" class="form-control" id="branch" name="branch" wire:model="branch" placeholder="Enter Assigned Branch">
                                @error('branch') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="salary" class="form-label"><i class="fa fa-money-bill"></i> Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" wire:model="salary" placeholder="Enter Salary" required>
                                @error('salary') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="hireDate" class="form-label"><i class="fa fa-calendar-alt"></i> Hire Date</label>
                                <input type="date" class="form-control" id="hireDate" name="hireDate" wire:model="hireDate" required>
                                @error('hireDate') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type='submit'><i class="fa fa-save mx-2"></i> Save Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
