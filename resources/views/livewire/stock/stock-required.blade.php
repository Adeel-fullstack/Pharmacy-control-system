<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fa fa-list"></i> Stock Required </div>
                    <button wire:click="downloadPdf" class="btn btn-primary">
                        <i class="fa fa-download me-2"></i> Download
                    </button>
                </div>
                <div>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-tag"></i> Name</th>
                                <th><i class="fa fa-sort-amount-up"></i> Current Stock</th>
                                <th><i class="fa fa-building"></i> Company</th>
                                <th><i class="fa fa-cogs"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stocks as $stock)
                                <tr>
                                    <td>{{ ucfirst($stock->medicineName) }}</td>
                                    <td>{{ $stock->total_items }}</td>
                                    <td>{{ ucfirst($stock->company->name) }}</td> <!-- Adjusted to reference the associated company -->
                                    <td>
                                        <button class="btn btn-info">
                                            <i class="fa fa-info-circle mx-2"></i> Details
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No stock available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
