@extends ('layout.master')
@section('content')
@include('layout/breadcrumb')
<!--==============================================================
Main Page wrapper
============================================================== -->
<div class="container-fluid">
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active home" id="home" role="tabpanel">
                        <div class="p-20">
                            <form class="form-horizontal" method="post" action="{{url('update')}}">
                                <div class="card-body">
                                    <h4 class="card-title">User Info</h4>
                                    
                                    <!-- @include('layout/validator') -->
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Suffix</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="suffix_name" value="{{ Request::old('suffix_name',$Userdata->suffix_name) }}" id="fname" placeholder="Mr / Dr / P.H.D">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name *</label>
                                        <div class="col-sm-6">
                                            <input type="hidden" name="id" value="{{ $Userdata->user_id }}">
                                            <input type="text" class="form-control" name="first_name" value="{{ Request::old('first_name',optional($Userdata)->first_name)}}" id="fname" placeholder="First Name Here">
                                            @if ($errors->has('first_name'))
                                            <div class="valid-error">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name *</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="last_name" value="{{ Request::old('last_name',$Userdata->last_name)}}" id="lname" placeholder="Last Name Here">
                                            @if ($errors->has('last_name'))
                                            <div class="valid-error">{{ $errors->first('last_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Display Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="user_name" value="{{ Request::old('user_name',$Userdata->user_name) }}" id="lname" placeholder="Last Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass" class="col-sm-3 text-right control-label col-form-label">Select Role *</label>
                                        <div class="col-sm-3">
                                            <select class="form-control"  name="user_role">
                                                <option value="">Select Role</option>
                                                <?php foreach($UserRoles as $key=>$value) { ?>
                                                <option value="<?php echo $value->role_id; ?>" <?php if( Request::old('user_role',$Userdata->user_role)==$value->role_id){ echo 'selected=selected';}?>><?php echo $value->role_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            @if ($errors->has('user_role'))
                                            <div class="valid-error">{{ $errors->first('user_role') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Email *</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control email-inputmask" name="user_email" value="{{ Request::old('user_email',$Userdata->user_email
                                            ) }}" id="email1" placeholder="Email Here">
                                            @if ($errors->has('user_email'))
                                            <div class="valid-error">{{ $errors->first('user_email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No *</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control phone-inputmask" name="user_phone" value="{{ Request::old('user_phone',$Userdata->user_phone) }}" id="cono1" placeholder="Contact No Here">
                                            @if ($errors->has('user_phone'))
                                            <div class="valid-error">{{ $errors->first('user_phone') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Job Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="job_title" value="{{ Request::old('job_title',$Userdata->job_title) }}" id="cono1" placeholder="Job Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Detail</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="user_details">{{ Request::old('user_details',$Userdata->user_details) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass" class="col-sm-3 text-right control-label col-form-label">Active</label>
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="1" class="custom-control-input" id="customControlValidation5" name="user_status" {{($Userdata->user_status == 1) ? 'checked' : ''}} >
                                                <label class="custom-control-label" for="customControlValidation5">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="0" class="custom-control-input" id="customControlValidation6" name="user_status" {{($Userdata->user_status == 0) ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="customControlValidation6">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       <!--  <button type="button" class="btn btn-primary">Import User</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================================================
End Main Page wrapper
============================================================== -->
@endsection