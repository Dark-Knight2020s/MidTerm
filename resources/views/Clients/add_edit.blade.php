@extends('Layouts.app')

@section('content')


    {{-- Display status of work --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- onsubmit="return validateForm()" --}}
    
    @if (isset($client_edit))

        {{-- Update User --}}
        <div class="card">

            <div class="card-header"><i class="fa fa-fw fa-edit"></i>
                <strong>Update User</strong>
                <a href="{{url('index')}}" onclick="return confirm('Are you sure to exit  befor update user {{$client_edit->name}}?')" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a>
            </div>

            <div class="card-body">
                <div class="col-sm-6">
                    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>                

                        <form action="{{url('update/'.$client_edit->id)}}" method="POST" class="form-horizontal">
                            @csrf
                            @method('PATCH')
                        <div class="form-group">
                                <label>User Name <span class="text-danger">*</span></label>
                                <input type="text" name="user_name" id="username" class="form-control" value="{{$client_edit->name}}">
                                @error('user_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>User Email <span class="text-danger">*</span></label>
                                <input type="email" name="user_email" id="useremail" class="form-control" value="{{$client_edit->email}}">
                                @error('user_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>User Phone <span class="text-danger">*</span></label>
                                <input type="tel" name="user_phone" id="userphone" pattern=".{14,14}" title="Accept US Number format (888) 888-8888" class="tel form-control"  x-autocompletetype="tel" value="{{$client_edit->phone}}">
                                @error('user_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>            
        
    @else

        {{-- Add User --}}
        <div class="card">

            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i>
                <strong>Add User</strong>
                <a href="{{url('index')}}" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a>
            </div>

            <div class="card-body">
                <div class="col-sm-6">
                    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>                

                        <form action="{{url('store')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label>User Name <span class="text-danger">*</span></label>
                                <input type="text" name="user_name" id="username" class="form-control" placeholder="Enter user name">
                                @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>User Email <span class="text-danger">*</span></label>
                                <input type="email" name="user_email" id="useremail" class="form-control" placeholder="Enter user email">
                                @error('user_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>User Phone <span class="text-danger">*</span></label>
                                <input type="tel" name="user_phone" id="userphone" pattern=".{14,14}" title="Accept US Number format (888) 888-8888" class="tel form-control"  x-autocompletetype="tel" placeholder="Enter user phone" >
                                @error('user_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>

    @endif

@endsection