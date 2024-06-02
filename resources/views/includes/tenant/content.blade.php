<div class="main-content">
    <div class="cont-wrapper">
        <div class="row">
            <div class="col-md-6 col-lg-6">

            </div>
            <div id="success-error-message" class="success-error col-md-6 col-lg-6">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif



            </div>
        </div>
        <div class="tenant-screening">
            <div class="card-head">
                <h3>Tenant Screening</h3>
                <div class="progress-sec">
                    <ul>
                        <li class="completed">
                            <label>Step 1/4</label>
                            <span></span>
                        </li>
                        <li class="completed">
                            <label>Step 2/4</label>
                            <span></span>
                        </li>
                        <li>
                            <label>Step 3/4</label>
                            <span></span>
                        </li>
                        <li>
                            <label>Step 4/4</label>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-content">
                <div class="card-body whopays-sec min-hieght">
                    <h2>Select Report<span>Applicant currently resides in</span></h2>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="country" type="radio" id="inlineradio1" value="option1">
                        <label class="form-check-label" for="inlineradio1">Canada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="country" type="radio" id="inlineradio2" value="option2">
                        <label class="form-check-label" for="inlineradio2">United States of America </label>
                    </div>
                    <div class="payInfo-sec1 mt-4">
                        <ul>
                            <li>
                                <h3>Credit Report, and Background Check <label class="new">Best Value</label></h3>

                                <div class="row">
                                    <div class="col-sm-3 col-lg-3">
                                        <h3 class="mt-4">$32.98 <span>/ Report</span></h3>
                                    </div>
                                    <div class="col-sm-3 col-lg-3"></div>
                                    <div class="col-sm-3 col-lg-3"></div>
                                    <div class="col-sm-3 col-lg-3"><button class="view-sample btn btn-primary">View
                                            Sample</button></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4">
                                        <ul class="subpara">
                                            <li>Long Form equifax credit report</li>
                                            <li>Current and former addresses</li>
                                            <li>aliases</li>
                                            <li>Employment confirmation</li>
                                            <li>Open and closed credit Facilities (Trade lines)</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <ul class="subpara">
                                            <li>credit balances</li>
                                            <li>collections</li>
                                            <li>bankruptcies</li>
                                            <li>inquiries</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <ul class="subpara">
                                            <li>Global Public information search for:criminal records, court decisions,
                                                negative press,Sanctions andmore</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="payInfo-sec1 mt-4">
                        <ul>
                            <li>
                                <h3>Credit Report</h3>
                                <div class="row">
                                    <div class="col-sm-3 col-lg-3">
                                        <h3 class="mt-4 pull-left">$32.98 <span>/ Report</span></h3>
                                    </div>
                                    <div class="col-sm-3 col-lg-3"></div>
                                    <div class="col-sm-3 col-lg-3"></div>
                                    <div class="col-sm-3 col-lg-3"><button class="view-sample btn btn-primary">View
                                            Sample</button></div>
                                </div>

                                <hr>

                            </li>

                        </ul>
                    </div>
                    <div class="payInfo-sec1 mt-4">
                        <ul>
                            <li>
                                <h3>Background Check</h3>
                                <div class="row">
                                    <div class="col-sm-3 col-lg-3">
                                        <h3 class="mt-4 pull-left">$16.99 <span>/ Report</span></h3>
                                    </div>
                                    <div class="col-sm-3 col-lg-3"></div>
                                    <div class="col-sm-3 col-lg-3"></div>
                                    <div class="col-sm-3 col-lg-3"><button class="view-sample btn btn-primary">View
                                            Sample</button></div>
                                </div>

                                <hr>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="back-btn">Back</button>
                <button class="next-btn">Continue</button>
            </div>
        </div>
    </div>
</div>
