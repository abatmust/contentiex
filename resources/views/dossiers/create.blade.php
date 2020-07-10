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
                <input type="text" name="ref" id="ref" class="form-control" placeholder="المرجع" value="{{old('ref' ?? '')}}">
                </div>
                <div dir="rtl" class="col form-check text-right">
                    <label dir="rtl" class="form-check-label" for="encours">رائج</label>
                    <input type="checkbox" name="encours" id="encours" class="form-control form-check-input" {{old('ref') ? 'checked' : ''}}>
                </div>
                
                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="niveau">مرحلة التقاضي</label>
                    <select class="form-control" name="niveau" id="niveau">
                      <option  value="">إختار ...</option>
                      <option {{old('niveau') == 'إبتدائي' ? 'selected' : ''}}>إبتدائي</option>
                      <option {{old('niveau') == 'إستئناف' ? 'selected' : ''}}>إستئناف</option>
                      <option {{old('niveau') == 'نقض' ? 'selected' : ''}}>نقض</option>
                      
                    </select>
                </div>
    
            </div>
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="type">نوع القضية</label>
                    <select class="form-control" name="type" id="type">
                      <option value="">إختار ...</option>
                      <option {{old('type') == 'إداري' ? 'selected' : ''}}>إداري</option>
                      <option {{old('type') == 'مدني' ? 'selected' : ''}}>مدني</option>
                      <option {{old('type') == 'تجاري' ? 'selected' : ''}}>تجاري</option>
                      <option {{old('type') == 'إجتماعي' ? 'selected' : ''}}>إجتماعي</option>
                      <option {{old('type') == 'جنحي' ? 'selected' : ''}}>جنحي</option>
                      <option {{old('type') == 'سرقة المياه' ? 'selected' : ''}}>سرقة المياه</option>
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
                        <option {{old('tribunal_id') == $tribunal->id ? 'selected' : ''}} value="{{$tribunal->id}}" >{{$tribunal->nomination}}</option>
                        
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
                  <textarea name="observation" id="observation" rows="3" class="form-control">{{old('observation' ?? '')}}</textarea>
                </div>
                <div dir="rtl" class="form-group col-4">
                  <label class="float-right" for="dossier_id">ملف سابق</label>
                  {{-- <input type="text" name="dossier_id" id="dossier_id" class="form-control" placeholder="ملف سابق" aria-describedby="helpId"> --}}
                  <select dir="rtl" class="form-control" name="dossier_id" id="dossier_id">
                    <option value="">إختار ....</option>
                    @foreach($dossiers as $dossier)
                        <option {{old('dossier_id') == $dossier->id ? 'selected' : ''}} value="{{$dossier->id}}"
                         
                          >{{$dossier->ref}}: {{$dossier->type}} : {{$dossier->annee}}</option>
                    @endforeach
        
                  </select>
                </div>
            </div>
            <input style="width:31%" type="submit" class="btn btn-success" value="إضافة"/>
        </form>
        
    </div>
@endsection