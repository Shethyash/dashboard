@extends ('layout.master')
@section('content')
@include('layout/breadcrumb')


<!--============================================================== 
    Main Page wrapper
    ============================================================== -->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        	<div class="card">
                <!-- <div class="card-body">
                    <h5 class="card-title m-b-0">Static Table With Checkboxes</h5>
                </div> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <!-- <th>
                                    <label class="customcheckbox m-b-20">
                                        <input type="checkbox" id="mainCheckbox" />
                                        <span class="checkmark"></span>
                                    </label>
                                </th> -->
                                <th scope="col" class="ch">@sortablelink('first_name','User Name')</th>
                                <th scope="col" class="ch">@sortablelink('email','User Email')</th>
                                <!-- <th scope="col" class="ch">@sortablelink('role_title','Role Title')</th>
                                <th scope="col" class="ch">@sortablelink('user_status','Active status')</th> -->
                                <th scope="col" class="ch">Action</th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                        	@foreach($users as $value)
                            <tr>
                                <td>{{ $value->first_name }} </td>
                                <td>{{ $value->email }} </td>
                                <td>
                                    <a href="user/{{$value->id}}">
                                        <button class="btn margin-5 text-white btn-update"  data-toggle="tooltip" data-placement="top" title="Update">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <button type="submit" class="btn margin-5 text-white btn-del" onclick="openDelete('users','user_id','{{$value->id}}')" data-toggle="modal" data-target="#DeleteModel" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->appends(\Request::except('page'))->render('layout.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================================================== 
    End Main Page wrapper
    ============================================================== -->

@endsection