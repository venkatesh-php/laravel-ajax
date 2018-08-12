@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">UserName</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label"> Country</label>
                                <?php 
                                // use countries;
                                use Illuminate\Http\Request;
                                use App\Http\Requests;
                                $countries = DB::table("countries")->get();
                                ?>
                                <!-- {{$countries}} -->
                            <div class="col-md-6">
                                <select name="country" id='country' class="form-control" value="">
                                    <option value="" disabled="disabled" selected="selected">Select</option>  
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}} </option> 
                                @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>
                            <div class="col-md-6">
                                <select name="state" id="state" class="form-control">
                                
                               {{-- @foreach ($states as $state)
                                    <option value="{{$state->name}}" disabled="disabled" selected="selected">{{$state->name}}</option>
                                @endforeach
                                --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <select name="city" id="city" class="form-control">
                                {{-- @foreach ($cities as $city)
                                    <option value="{{city->name}}" disabled="disabled" selected="selected">{{city->name}}</option>
                                @endforeach
                                --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> -->
<script type="text/javascript">
$(function(){
    $('#country').change(function(){
    var countryID = $(this).val(); 
    console.log(countryID);
    if(countryID){
        var url='/get_state_list';
        console.log(url); 
        $.ajax({
            
           type:"GET",
           dataType : 'json',
           async: false,
           url:"{{url('/get_state_list')}}/"+countryID,   
           data:JSON.stringify(),

           success:function(data){  
            console.log(data)   
                    
            if(data){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                var x = data["name"];
                $.each(data,function(id,x){
                    $("#state").append('<option value="'+id+'">'+x+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });



    $('#state').on('change',function()
    {
        var stateID = $(this).val();    
            if(stateID)
            {
                $.ajax({
                type:"GET",
                dataType : 'json',
                async: false,
                url:"{{url('get_city_list')}}/"+stateID,
                data:JSON.stringify(),

                success:function(data){     
                    console.log(data)           
                if(data)
                {
                $("#city").empty();
                $("#city").append('<option>Select</option>');
                $.each(data,function(id,name){
                    $("#city").append('<option value="'+id+'">'+name+'</option>');
                });
           
                }
            else
            {
               $("#city").empty();
            }
           }
        });
    }
    else
    {
        $("#city").empty();
    }
        
   });
});
</script>
@endsection
