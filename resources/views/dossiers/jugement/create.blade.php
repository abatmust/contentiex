@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="text-right">إضافة حكم جديد</h2>
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
    <form action="{{route('dossiers.jugement.add', ['dossier'=> $dossier])}}" method="POST">
            @csrf
            <div dir="rtl" class="row">
                
                <div dir="rtl" class="form-group col">
                    <label for="num">عدد</label>
                </div>
                <div dir="rtl" class="form-group col">
                    <input type="text" name="num" id="num" class="form-control" placeholder="عدد">                  
                </div>
                <div dir="rtl" class="form-group col">
                    <label for="date">تاريخ الحكم</label>
                </div>
                <div dir="rtl" class="form-group col">
                    <input type="date" name="date" id="date" class="form-control" placeholder="تاريخ الحكم" value="{{old('date') ?? ''}}">
                </div>
            </div>
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col">
                    <label for="favorable"> في مصلحة م.ح</label>
                </div>
                <div dir="rtl" class="form-group col">
                    <input type="checkbox" name="favorable" id="favorable" class="form-control form-check-input">
                </div>
                <div dir="rtl" class="form-group col">
                    <label for="montant">المبلغ</label>
                </div>
                <div dir="rtl" class="form-group col">
                    <input type="text" name="montant" id="montant" class="form-control" placeholder="المبلغ">                  
                </div>
            </div>
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col-2">
                    <label for="contenu">المضمون</label>
                </div>
                <div dir="rtl" class="form-group col-6">
                    {{-- <input type="text" name="contenu" id="contenu" class="form-control" placeholder="المضمون" value="{{old('contenu') ?? ''}}"> --}}
                    <textarea class="form-control" name="contenu" id="contenu"  rows="2">{{old('contenu') ?? ''}}</textarea>
                </div>
                <div class="form-group col-2">
                   
                    <input type="file" class="form-control-file" id="myFile" name="myFile">
                  </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-success btn-block" value="إضافة"/>
                </div>
                
    
            </div>
            
            
        </form>
        
    </div>
@endsection
