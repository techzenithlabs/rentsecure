@include('includes.header')

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <section class="main-wrapper">
            
                @switch(Auth::user()->role_id)
                @case(1){{-- SuperAdmin --}}
                @include('layouts.admin.sidebar')
                  @break
                @case(2){{-- Landlord --}}
                @include('layouts.landlord.sidebar')
                  @break
                @case(3){{-- Tenant --}}
                @include('layouts.tenant.sidebar')
                  @break
               @endswitch

              <!-----Include main layout--->
               @switch(Auth::user()->role_id)
               @case(1){{-- SuperAdmin --}}
               @include('includes.admin.dashboard')
                 @break
               @case(2){{-- Landlord --}}
               @include('includes.landlord.dashboard')
                 @break
               @case(3){{-- Tenant --}}
               @include('includes.landlord.dashboard')
                 @break
              @endswitch

               <!-----incude main layout-->

               <div class="main-content">
                <div class="cont-wrapper">
                    <div class="my-property">
                        <div class="card-head">
                            <h3>My properties <span>Only add properties for which you need to screen tenants.</span></h3>
                            <button class="add-btn">Add Property</button>
                        </div>
                        <div class="custform-tabs">
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Street Address</label>
                                            <div class="select-arrow">
                                               <select class="form-control">
                                                   <option>Select</option>
                                                   <option>Select</option>
                                                   <option>Select</option>
                                                   <option>Select</option>
                                               </select>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Apartment #</label>
                                            <div class="select-arrow">
                                               <select class="form-control">
                                                   <option>Apartment #</option>
                                                   <option>Apartment #</option>
                                                   <option>Apartment #</option>
                                                   <option>Apartment #</option>
                                               </select>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Rent Amount</label>
                                            <div class="select-arrow">
                                               <select class="form-control">
                                                   <option>Enter Rent Amount</option>
                                                   <option>Select</option>
                                                   <option>Select</option>
                                                   <option>Select</option>
                                               </select>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Province</label>
                                             <div class="select-arrow">
                                               <select class="form-control">
                                                   <option>Select</option>
                                                   <option>Select</option>
                                                   <option>Select</option>
                                               </select>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date Available</label>
                                            <input type="date" class="form-control" name="" placeholder="DD/MM/YYYY">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="Number" class="form-control" id="exampleInputEmail1" placeholder="Enter your postal code">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group upload-doc">
                                              <label>Upload Document</label>
                                              <div class="upload-sec">
                                                  <input id="uploadFile" class="f-input form-control" placeholder="Choose Document">
                                                <div class="fileUpload btn btn--browse">
                                                    <span>Browse</span>
                                                    <input id="uploadBtn" type="file" class="upload">
                                                </div>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">I certify that I am the owner of the property</label>
                                          </div>
                                      </div>
                                    </div>
                                </form></div>
                            
                        </div>
                        <div class="added-pro">
                            <h2>Added Properties</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Address</th>
                                              <th scope="col">Available Dates</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>123 Main Street, Toronto ON M4L 1V2</td>
                                              <td><img class="img-fluid" src="images/date-icon.png"> 31 March, 2024</td>
                                              <td><button>Start Screening</button></td>
                                            </tr>
                                            <tr>
                                              <td>347 Church Street, Toronto ON M4L 6H1</td>
                                              <td><img class="img-fluid" src="images/date-icon.png"> 31 March, 2024</td>
                                              <td><button>Start Screening</button></td>
                                            </tr>
                                            <tr>
                                              <td>347 Church Street, Toronto ON M4L 6H1</td>
                                              <td><img class="img-fluid" src="images/date-icon.png"> 31 March, 2024</td>
                                              <td><button>Start Screening</button></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Screening Progress</th>
                                              <th scope="col">Status</th>
                                              <th scope="col"></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>123 Main Street, Toronto ON M4L 1V2</td>
                                              <td><button class="send-req">Request Sent</button> <lable>awaiting documentation.</lable></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td>347 Church Street, Toronto ON M4L 6H1</td>
                                              <td><span class="review">Review in Progress</span></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td>347 Church Street, Toronto ON M4L 6H1</td>
                                              <td><span class="complete">Completed</span></td>
                                              <td><button>Download Report</button></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>

            </section>
        </div>
@include('includes.footer')

