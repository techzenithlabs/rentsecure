@include('includes.header')

<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <section class="main-wrapper">
        @include('layouts.admin.sidebar')
        <div class="main-content">>
            <div class="cont-wrapper" style="min-height:500px">
                <div class="row">
                    <div class="col-sm-10 col-lg-10">
                        <div style="display:none" class="verifiedsuccess alert alert-success"></div>
                        <div style="display:none" class="verifiedfailed alert alert-danger"></div>

                    </div>
                    <div class="col-sm-2 col-lg-2">
                        <a href="{{ route('screening.landlord') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>

                @if (isset($documents) && !empty($documents))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sr No</th>
                                <th scope="col">Documents</th>
                                <th scope="col">Expiry Date</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                               $filePath = config('app.url').'/storage/app/';


                            @endphp

                            @foreach ($documents as $key=>$doc)
                            @php

                            $userId=$doc->user_id;
                            $isVerified=$doc->is_verified;
                            $uploadeddocuments=$doc->documents;

                            @endphp
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><a href="{{ $filePath.$uploadeddocuments }}">Click Here</a></td>
                                <td>N/A</td>

                            </tr>

                            @endforeach

                            </tbody>

                        </table>
                        <center>
                        @if($isVerified==0)
                        <a onclick="takeAction(event,'{{$userId}}',1)" style="padding:4px;font-size:0.8em" class="btn btn-success">Approve</a>
                        <a onclick="takeAction(event,'{{$userId}}',2)" style="padding:4px;font-size:0.8em" class="btn btn-danger">Reject</a>
                        @elseif($isVerified==1)
                        <a disabled style="padding:4px;font-size:0.8em" class="btn btn-success disabled">Approve</a><br/>
                        <a onclick="takeAction(event,'{{$userId}}',2)" style="padding:4px;font-size:0.8em" class="btn btn-danger">Reject</a>
                        @elseif($isVerified==2)
                        <a onclick="takeAction(event,'{{$userId}}',1)" style="padding:4px;font-size:0.8em" class="btn btn-success">Approve</a>
                        <a disabled style="padding:4px;font-size:0.8em" class="btn btn-danger disabled">Reject</a>
                        @endif
                    </center>
                @endif
            </div>

        </div>



    </section>
</div>
@include('includes.footer')
