@extends('layouts.app')
@section('content')
    <div class="container">

        <h2 class="text-right">محكمة جديدة</h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
               
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Alert!</strong> {{$error}}.
                </div>
            @endforeach

        @endif
    <form action="{{route('tribunals.store')}}" method="POST">
            @csrf
            <div dir="rtl" class="row">
                
                <div dir="rtl" class="form-group col">
                    <label for="nomination">المحكمة</label>
                </div>
                <div dir="rtl" class="form-group col">
                    <input type="text" name="nomination" id="nomination" class="form-control" placeholder="المحكمة" aria-describedby="helpId">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-success btn-block" value="إضافة"/>
                </div>
                
    
            </div>
            
            
        </form>
        
    </div>
@endsection