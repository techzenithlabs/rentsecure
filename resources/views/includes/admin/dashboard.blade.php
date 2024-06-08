<div class="main-content">
    <div class="cont-wrapper">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Dashboard</h1>
            </div>

            <div class="row" style="min-height: 400px;">
              <div class="col-md-4">
                <div class="card text-white bg-primary mb-3 custom-card-height">
                  <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text badge">{{ getUserData()->total }}</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-white bg-success mb-3 custom-card-height">
                  <div class="card-body">
                    <h5 class="card-title">Total Land lords</h5>
                    <p class="card-text badge">{{ getUserData()->landlords }}</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card text-white bg-warning mb-3 custom-card-height">
                  <div class="card-body">
                    <h5 class="card-title">Total Tenants</h5>
                    <p class="card-text badge">{{ getUserData()->tenants }}</p>
                  </div>
                </div>
              </div>

            </div>

            

    </div>
   </div>
