<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <!-- Table to List All Employees -->
            <div class="card shadow-sm">
                
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa fa-users"></i> All Employees
                    </div>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" name="search" wire:keyup="searches" wire:model="search" class="form-control" placeholder="Type to search">
                    </div>                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="white-space: nowrap;"> <i class="fa fa-user"></i> Name </th>
                                    <th style="white-space: nowrap;"> <i class="fa fa-phone"></i> Contact </th>
                                    <th style="white-space: nowrap;"> <i class="fa fa-envelope"></i> Email </th>
                                    <th style="white-space: nowrap;"> <i class="fa fa-briefcase"></i> Designation </th>
                                    <th style="white-space: nowrap;"> <i class="fa fa-money-bill"></i> Salary </th>
                                    <th style="white-space: nowrap;"> <i class="fa fa-calendar-alt"></i> Hire Date </th>
                                    <th style="white-space: nowrap;"> <i class="fa fa-cogs"></i> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td>                                    
                                        <img src="{{ asset('storage/picturelogos/' . $employee->picture) }}" class="img-fluid rounded-circle" height="50px" width="50px" alt="">
                                        {{ $employee->name }}
                                    </td>
                                    <td>{{ $employee->contact }}</td>
                                    <td>{{ $employee->email}}</td>
                                    <td>
                                        <span data-toggle="tooltip" title="{{ $employee->department->department  }}">
                                            {{ $employee->designation->designation_id}}
                                        </span>
                                    </td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>{{ $employee->hireDate}}</td>
                                    <td>
                                        <button class="btn btn-info">
                                            <i class="fa fa-info-circle mx-2"></i> Details
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No employee available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
