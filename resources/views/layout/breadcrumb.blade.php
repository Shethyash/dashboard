<?php
	//echo "<pre>===="; print_r($breadcrumb); die();
?>

<!--============================================================== 
    Bread crumb 
    ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">{{$breadcrumb['title']}}</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    	@foreach($breadcrumb['pages'] as $key=>$value)

                    	@if($value['active'])
                        	<li class="breadcrumb-item active">{{$value['title']}}</li>
                        @else
                        	<li class="breadcrumb-item"  aria-current="page"><a href="{{ url($value['link']) }}">{{$value['title']}}</a></li>
                        @endif

                        @endforeach
                        <!-- <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">User List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New User</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--============================================================== 
    End Bread crumb
    ============================================================== -->