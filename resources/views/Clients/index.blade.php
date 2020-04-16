@extends('Layouts.app')

@section('content')

    
    {{-- Display status of work --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div><i class="fa fa-fw fa-globe"></i>
        <strong>Browse Users</strong>
        <a href="{{url('add')}}" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i>  Add User</a>
    </div>  
    <div>

        @if (count($clients) ?? '' > 0)                  

            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Sr#</th>
                        {{-- <th>id</th> --}}
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Phone</th>
                        <th class="text-center">Record Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- User Details --}}
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{$count}}</td>
                            {{-- <td>{{$client->id}}</td> --}}
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->phone}}</td>
                            {{-- Note : we use created_at to record_date and make mask 2020-5-6 like down  --}}
                            {{-- <td align="center">{{ date('yy-m-d', strtotime($client->created_at)) }}</td>     --}}
                            <td align="center">{{$client->record_date}}</td>
                            <td align="center">

                            {{-- Add User --}}
                                <form action="{{url('edit/'.$client->id)}}"method="POST">
                                    @csrf
                                    @method('GET')                                
                                    <button class="text-primary btn-sm-sm btn btn-default" type="submit"><i class="fa fa-fw fa-edit"></i> Edit </button>       
                                </form>
                                
                                {{-- Delete User --}}
                                <form action="{{url('delete/'.$client->id)}}" onclick="return confirm('Are you sure to delete user {{$client->name}}?')" method="POST">
                                    @csrf
                                    @method('DELETE')                                
                                    <button class="text-danger btn-sm btn btn-default" type="submit"><i class="fa fa-fw fa-trash"></i> Delete</button>       
                                </form>
                            </td>

                        </tr> 

                        <?php $count +=1; ?>    

                    @endforeach
                        
                </tbody>
            </table>
        
        @else
            {{-- If there isn't user ,sent message --}}
          <br>
          <div class="Message alert alert-info"  align="center">
            <h3><strong>OPPS !</strong> There are no registered users</h3>
          </div>

        @endif

    </div>

@endsection
