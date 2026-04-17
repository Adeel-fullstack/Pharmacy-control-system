
    <div>
    <div class="container-fluid">
        <!-- Add space before the cards -->
        <div class="row my-4 mt-5">
            <!-- Cards (Essential Metrics) -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="fw-bold">Today Sales</h6>
                                <h3>
                                    <span>{{$totalSales}}</span>
                                </h3>
                            </div>
                            <div class="ms-auto">
                                <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="fw-bold">Total Customers</h6>
                                <h3>
                                    <span>{{ $customerCount }}</span>
                                </h3>
                            </div>
                            <div class="ms-auto">
                                <i class="fas fa-user fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="fw-bold">Stock Levels</h6>
                                <h3>
                               <span>{{ $stocklevel }}</span>
                               </h3>
                            </div>
                            <div class="ms-auto">
                                <i class="fas fa-pills fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="fw-bold">Pending Orders</h6>
                                <h3>15</h3>
                            </div>
                            <div class="ms-auto">
                                <i class="fas fa-truck fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light  fs-3" style="text:white">
                        <div>
                            <i class="fa fa-list"></i> Stock List
                        </div>

                         <button wire:click="exportStocks" class="btn btn-success btn-sm">
                           <i class="fa fa-file-excel"></i> Export Excel
                                 </button>
                       
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
                                            <img src="{{ asset('storage/medicinelogos/' . $stock->medicinelogo) }}" class="img-fluid rounded-circle" height="70px" width="40px" alt="">
                                            {{ ucfirst($stock->medicineName) }}
                                        </td>
                                        <td>{{ $stock->sale_price_each }}</td>
                                        <td>{{ $stock->number_of_boxes }}</td>
                                        <td>{{ $stock->purchase_price_box }}</td>
                                        <td>{{ $stock->total_items }}</td>
                                        <td>
                                            <span data-toggle="tooltip" title="{{ $stock->company->name }}">
                                                {{ $stock->distributor->distributor_name }}
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
                                        <td colspan="7">No stock available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-light fs-3">
                    <div>
                        <i class="fa fa-list"></i> Sales
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

<div class="container-fluid mt-5">
            <div class="card">
                <div class="card-header bg-light fs-3 text-bold" >
                    <i class="fa fa-list"></i> Customers List
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-user"></i> Name</th>
                            <th><i class="fa fa-whatsapp"></i> WhatsApp</th>
                            <th><i class="fa fa-envelope"></i> Email</th>
                            <th><i class="fa fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ ucfirst($customer->name) }}</td>
                                <td>{{ $customer->whatsapp }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success" wire:click="edit({{ $customer->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $customer->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6"><p>No Customer is available right now</p></td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>

    
    <!-- Bootstrap 5 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Livewire Scripts -->
    @livewireScripts
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js Initialization Script for Order Stats Chart -->
   
  
  