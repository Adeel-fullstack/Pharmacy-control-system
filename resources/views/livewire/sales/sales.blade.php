<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa fa-list"></i> Sales
                    </div>
                    <div class="input-group" style="width: 300px;">
                        <input type="text" name="search" wire:keyup="searches" wire:model="search" class="form-control" placeholder="Type to search">
                    </div>                    
                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-tag"></i> Product Name</th>
                                <th><i class="fa fa-user"></i> Customer Name</th>
                                <th><i class="fa fa-dollar-sign"></i> Sale Price</th>
                                <th><i class="fa fa-sort-numeric-up"></i> Quantity Sold</th>
                                <th><i class="fa fa-calendar"></i> Date of Sale</th>
                                <th><i class="fa fa-cogs"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $sale)
                                <tr>
                                    <td>{{ ucfirst($sale->stock->medicineName) }}</td>
                                    <td>{{ ucfirst($sale->customer->name) }}</td>
                                    <td>{{ $sale->sale_price }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ $sale->date_of_sale}}</td>
                                    <td>
                                        <button class="btn btn-info">
                                            <i class="fa fa-info-circle mx-2"></i> Details
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Sale available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
