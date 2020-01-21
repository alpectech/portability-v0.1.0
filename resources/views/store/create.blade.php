@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5" id='store'>

{!!Form::open(['action'=>'StoreController@store', 'method'=>'POST'])!!}
    <!-- row of columns -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="alert alert-dark">
            <h5>1. OUR STORES</h5>
        </div>
        <div class="form-group">
            <select name='location' class='form-control' id='progressA'>
                <option value="" disabled selected>--select--</option>

            @foreach($warehouses as $key=>$value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="alert alert-dark">
            <h5>2. PICKUP DATE AND TIME</h5>
        </div>
        <div class="form-group">
            {{Form::label('pickupDate','DATE & TIME:',['class'=>'pl-2'])}} 
            <span><i class='fa fa-calendar'></i></span>
            {{Form::text('pickupDate',null,['class'=>'form-control datetime', 'id'=>'progressB'])}}
        </div>
    </div>

</div>

   <!-- row of columns -->
<div class="row">

    <div class="col-md-6">
        <div class="alert alert-dark">
            <h5>3. PICKUP POINT</h5>
        </div>

        <div class="form-group">
            <select name='pickupConstituency' class='form-control pickup_constituency' id='progressC'>
                <option value="" disabled selected>--constituency--</option>

            @foreach($constituencies as $key=>$value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name='pickupWard' class='form-control pickup_ward' id='progressD'>
                <option value="" disabled selected>--ward--</option>
                {{-- Ajax dynamic dropdown --}}
            </select>
        </div>
        <div class="form-group">
            {{Form::text('pickupEstate', '',['class'=>'form-control', 'placeholder'=>'estate (optional)'])}}
        </div>
        
        
    </div>
    
    <div class="col-md-6">
        <div class="alert alert-dark">
            <h5>4. PAYMENT</h5>
        </div>
        <div class="form-group" id='progressD'>
            <ul class="list-group">
                <li class="list-group-item">
                {{ Form::radio('paymentTerms', 1 , false, ['class'=>'form-control-sm']) }}
                Prepaid</li>
                <li class=list-group-item>
                {{ Form::radio('paymentTerms', 2 , false, ['class'=>'form-control-sm']) }}
                Collect</li>
            </ul>
        </div>
    </div>

</div>

   <!-- row of columns -->
<div class="row">
   
    <div class="col-md-6">
        <div class="alert alert-dark">
            <h5>5. FREIGHT</h5>
        </div>
        <div class="form-group" id='progressE'>
        <ul class="list-group">
            <li class="list-group-item">
            {{ Form::radio('freight', 1 , false, ['class'=>'form-control-sm']) }}
            Less Than Truckload</li>
            <li class="list-group-item">
            {{ Form::radio('freight', 2 , false, ['class'=>'form-control-sm']) }}
            truckload</li>
            <li class="list-group-item">
            {{ Form::radio('freight', 3 , false, ['class'=>'form-control-sm']) }}
            Full Containerload</li>
            <li class="list-group-item">
            {{ Form::radio('freight', 4 , false, ['class'=>'form-control-sm']) }}
            Less Than Containerload</li>
            <li class="list-group-item">
            {{ Form::radio('freight', 5 , false, ['class'=>'form-control-sm']) }}
            Pickup</li>
        </ul>
        </div>
    </div>

</div>

            {{-- {{Form::hidden('_method','PUT')}} --}}
            {{Form::submit('Submit',['class'=>'btn btn-dark float-right mb-4'])}}
{!!Form::close()!!}



</div>

<script src="{{ URL::to('js/jquery-3.4.1.min.js') }}"></script>

<link rel="stylesheet" href="{{URL::to('css/bootstrap-datetimepicker.min.css')}}">
<script src="{{URL::to('js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript">
    'use strict';
    jQuery.noConflict();
    (function($){
        //Ajax Dynamic Dropdown
        // If pickup Constituency data field changes, fetch its current value, then use to fetch related Wards
     $(document).on('change','.pickup_constituency', function(){
         var constituency_id=$(this).val();
         var parentElementOfConstituency=$(this).parent().parent();
         var op='';
         
         $.ajax({
             type:'GET',
             url:"{{route('dynamic_fetch')}}",
             data:{'constituency_id':constituency_id},
             dataType:'json',
             success:function(data){
                 for(var i=0; i<data.length; i++){
                     op+=`<option value="`+data[i]+`">`+data[i]+`</option>`;
                 }
                 parentElementOfConstituency.find('.pickup_ward').empty().append('<option disabled selected>--select--</option>').append(op);
             }
         });
     });

//Progress bar to track progress of user input
     var width=0;
 var statusFlag={
                 progressA:false,
                 progressB:false,
                 progressC:false,
                 progressD:false,
                 progressE:false,
                 };
     //Progress bar
     $(document).on('change','#progressA',function(){
         width+=20;
        
        if(statusFlag.progressA===false){
            $('.progress_bar').css({'width':width+'%'});
            $('div.progress_bar').empty().append('<p>'+width+'%'+'</p>');
            statusFlag.progressA=true;
        }
     });

     $(document).on('click','#progressB',function(){
         width+=20;

        if(statusFlag.progressB===false){
            $('.progress_bar').css({'width':width+'%'});
            $('div.progress_bar').empty().append('<p>'+width+'%'+'</p>');
            statusFlag.progressB=true;
        }
     });

     $(document).on('change','#progressC',function(){
         width+=20;

        if(statusFlag.progressC===false){
            $('.progress_bar').css({'width':width+'%'});
            $('div.progress_bar').empty().append('<p>'+width+'%'+'</p>');
            statusFlag.progressC=true;
        }
     });

     $(document).on('change','#progressD',function(){
         width+=20;

        if(statusFlag.progressD===false){
            $('.progress_bar').css({'width':width+'%'});
            $('div.progress_bar').empty().append('<p>'+width+'%'+'</p>');
            statusFlag.progressD=true;
        }
     });

     $(document).on('change','#progressE',function(){
         width+=20;

        if(statusFlag.progressE===false){
        $('.progress_bar').css({'width':width+'%'});
        $('div.progress_bar').empty().append('<p>'+width+'%'+'</p>');
        statusFlag.progressE=true;
        }
     });

        //Datetime picker
        $('.datetime').datetimepicker({format: 'YYYY-MM-DD hh:mm:ss'});

    }(jQuery));
</script>
@endsection