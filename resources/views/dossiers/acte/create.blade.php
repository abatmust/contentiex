@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="text-right">إضافة جديدة</h2>
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
    <form action="{{route('dossiers.acte.add', ['dossier'=> $dossier])}}" method="POST">
            @csrf
            <div dir="rtl" class="row">
                
                <div dir="rtl" class="form-group col">
                    <label for="type">نوع الاجراء</label>
                </div>
                <div dir="rtl" class="form-group col">
                    {{-- <input type="text" name="type" id="type" class="form-control" placeholder="نوع الاجراء"> --}}
                    <select class="form-control" name="type" id="type" class="form-control">
                        <option value="">إختار...</option>
                        <option {{old('type') === 'قضائي'? 'selected': ''}}>قضائي</option>
                        <option {{old('type') === 'إداري'? 'selected': ''}}>إداري</option>
                        <option {{old('type') === 'ودي'? 'selected': ''}}>ودي</option>
                      </select>
                    
                </div>
                <div dir="rtl" class="form-group col">
                    <label for="date">تاريخ الاجراء</label>
                </div>
                <div dir="rtl" class="form-group col">
                    <input type="date" name="date" id="date" class="form-control" placeholder="تاريخ الاجراء" value="{{old('date') ?? ''}}">
                </div>
                <div dir="rtl" class="form-group col">
                    <label for="delai">الآجل</label>
                </div>
                <div dir="rtl" class="form-group col">
                    <input type="text" name="delai" id="delai" class="form-control" placeholder="الآجل" value="{{old('delai') ?? ''}}">
                </div>
            </div>
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col-2">
                    <label for="contenu">المضمون</label>
                </div>
                <div dir="rtl" class="form-group col-8">
                    {{-- <input type="text" name="contenu" id="contenu" class="form-control" placeholder="المضمون" value="{{old('contenu') ?? ''}}"> --}}
                    <textarea class="form-control" name="contenu" id="contenu"  rows="2">{{old('contenu') ?? ''}}</textarea>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-success btn-block" value="إضافة"/>
                </div>
                
    
            </div>
            
            
        {{-- </form> --}}
        
    </div>
@endsection
