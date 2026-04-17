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
                                    <span>{{ number_format($dailySales) }}</span>
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
                                <h6 class="fw-bold">Weekly Sale</h6>
                                <h3>
                                    <span>{{ number_format($weeklySales) }}</span>
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
                                <h6 class="fw-bold">Monthly Sale</h6>
                                <h3>
                               <span>{{ number_format($monthlySales) }}</span>
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
                                <h6 class="fw-bold">Annual Sale</h6>
                                <h3>{{ number_format($yearlySales) }}</h3>
                            </div>
                            <div class="ms-auto">
                                <i class="fas fa-truck fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          <div class="row my-4 mt-5">

    <!-- Daily Sales -->
    

    <!-- Weekly Sales -->
   

    <!-- Monthly Sales -->
    

    <!-- Total Customers (existing) -->
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="fw-bold">Total Customers</h6>
                        <h3>{{$customerCount}}</h3>
                    </div>
                    <div class="ms-auto">
                        <i class="fas fa-user fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


        </div>
    </div>