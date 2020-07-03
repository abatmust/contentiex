@extends('layouts.app')
@section('content')
    <div class="container">

        <h2 class="text-right">ملف جديد</h2>
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
    <form action="{{route('dossiers.store')}}" method="POST">
            @csrf
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col">
                  <label class="float-right" for="ref">المرجع</label>
                  <input type="text" name="ref" id="ref" class="form-control" placeholder="المرجع" aria-describedby="helpId">
                </div>
                <div dir="rtl" class="col form-check text-right">
                    <label dir="rtl" class="form-check-label" for="encours">رائج</label>
                    <input type="checkbox" name="encours" id="encours" class="form-control form-check-input">
                </div>
                
                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="niveau">مرحلة التقاضي</label>
                    <select class="form-control" name="niveau" id="niveau">
                      <option value="">إختار ...</option>
                      <option value="إبتدائي">إبتدائي</option>
                      <option value="إستئناف">إستئناف</option>
                      <option value="نقض">نقض</option>
                    </select>
                </div>
    
            </div>
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="type">نوع القضية</label>
                    <select class="form-control" name="type" id="type">
                      <option value="">إختار ...</option>
                      <option value="إداري">إداري</option>
                      <option value="مدني">مدني</option>
                      <option value="تجاري">تجاري</option>
                      <option value="إجتماعي">إجتماعي</option>
                      <option value="جنحي">جنحي</option>
                      <option value="سرقة المياه">سرقة المياه</option>
                    </select>
                </div>




                {{-- <div dir="rtl" class="form-group col">
                <label class="float-right" for="type">نوع القضية</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="نوع القضية" aria-describedby="helpId">
                </div> --}}
                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="annee">السنة</label>
                    <input type="text" name="annee" id="annee" class="form-control" placeholder="السنة" aria-describedby="helpId">
                </div>
                <div dir="rtl" class="form-group col">
                <label class="float-right" for="tribunal_id">المحكمة المختصة</label>
                <select class="form-control" name="tribunal_id" id="tribunal_id">
                        <option value="">إختار ...</option>
                    @foreach ($tribunals as $tribunal)
                        <option value="{{$tribunal->id}}" >{{$tribunal->nomination}}</option>
                        
                    @endforeach
                    
                  </select>    
                {{-- <div class="form-group"> --}}
                      {{-- <label for=""></label> --}}
                      
                    {{-- </div> --}}
                </div>
            </div>
            <div dir="rtl" class="row">
    
                <div dir="rtl" class="form-group col-8">
                  <label class="float-right" for="observation">ملاحظة</label>
                  <textarea name="observation" id="observation" rows="3" class="form-control"></textarea>
                </div>
                <div dir="rtl" class="form-group col-4">
                  <label class="float-right" for="dossier_id">ملف سابق</label>
                  <input type="text" name="dossier_id" id="dossier_id" class="form-control" placeholder="ملف سابق" aria-describedby="helpId">
                </div>
            </div>
            <input style="width:31%" type="submit" class="btn btn-success" value="إضافة"/>
        </form>
        
    </div>
@endsection