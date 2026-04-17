<div>
<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa fa-list"></i> Stock List
                    </div>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" name="search" wire:keyup="searches" wire:model="search" class="form-control" placeholder="Type to search">
                    </div>                    
                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-tag"></i> Name</th>
                                <th><i class="fa fa-dollar-sign"></i> Price <small>(Per Tablet)</small></th>
                                <th><i class="fa fa-cube"></i> Number of Boxes</th>
                                <th><i class="fa fa-box"></i> Box Price</th>
                                <th><i class="fa fa-sort-amount-up"></i> Quantity</th>
                                <th><i class="fa fa-truck"></i> Distributor</th>
                                <th><i class="fa fa-cogs"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stocks as $stock)
                                <tr>
                                    <td>                                    
                                        <img src="{{ asset('storage/medicinelogos/' . $stock->medicinelogo) }}" class="img-fluid rounded-circle" height="50px" width="50px" alt="">
                                        {{ ucfirst($stock->medicineName) }}
                                    </td>
                                    <td>{{ $stock->sale_price_each }}</td>
                                    <td>{{ $stock->number_of_boxes }}</td>
                                    <td>{{ $stock->purchase_price_box }}</td>
                                    <td>{{ $stock->total_items }}</td>
                                    <td>
                                        <span data-toggle="tooltip" title="{{ $stock->company->name }}">
                                            {{ $stock->distributor->distributor_name}}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info">
                                            <i class="fa fa-info-circle mx-2"></i> Details
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No stock available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script> --}}
</div>