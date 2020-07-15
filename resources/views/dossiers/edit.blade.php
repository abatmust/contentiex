

@extends('layouts.app')
@section('content')
    <div class="container">

       
        <h2 dir="rtl" class="text-right">تعديل ملف</h2>
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
    <form action="{{route('dossiers.update', ['dossier'=> $monDossier->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col">
                  <label class="float-right" for="ref">المرجع</label>
                  <input type="text" name="ref" id="ref" class="form-control" placeholder="المرجع" value="{{$monDossier->ref}}">
                </div>
                <div dir="rtl" class="col form-check text-right">
                    <label dir="rtl" class="form-check-label" for="encours">رائج</label>
                <input type="checkbox" name="encours" id="encours" class="form-control form-check-input" {{$monDossier->encours ? 'checked': ''}}>
                </div>
                
                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="niveau">مرحلة التقاضي</label>
                    <select class="form-control" name="niveau" id="niveau">
                      <option value="">إختار ...</option>
                      <option {{$monDossier->niveau == 'إبتدائي' ? 'selected': ''}} value="إبتدائي">إبتدائي</option>
                      <option {{$monDossier->niveau == 'إستئناف' ? 'selected': ''}} value="إستئناف">إستئناف</option>
                      <option {{$monDossier->niveau == 'نقض' ? 'selected': ''}} value="نقض">نقض</option>
                    </select>
                </div>
    
            </div>
            <div dir="rtl" class="row">
                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="type">نوع القضية</label>
                    <select class="form-control" name="type" id="type">
                      <option value="">إختار ...</option>
                      <option {{$monDossier->type == 'إداري' ? 'selected': ''}}>إداري</option>
                      <option {{$monDossier->type == 'إداري استعجالي' ? 'selected': ''}}>إداري استعجالي</option>
                      <option {{$monDossier->type == 'مدني' ? 'selected': ''}}>مدني</option>
                      <option {{$monDossier->type == 'مدني استعجالي' ? 'selected': ''}}>مدني استعجالي</option>
                      <option {{$monDossier->type == 'تجاري' ? 'selected': ''}}>تجاري</option>
                      <option {{$monDossier->type == 'تجاري استعجالي' ? 'selected': ''}}>تجاري استعجالي</option>
                      <option {{$monDossier->type == 'إجتماعي' ? 'selected': ''}}>إجتماعي</option>
                      <option {{$monDossier->type == 'إجتماعي استعجالي' ? 'selected': ''}}>إجتماعي استعجالي</option>
                      <option {{$monDossier->type == 'جنحي' ? 'selected': ''}}>جنحي</option>
                      <option {{$monDossier->type == 'جنحي استعجالي' ? 'selected': ''}}>جنحي استعجالي</option>
                      <option {{$monDossier->type == 'سرقة المياه' ? 'selected': ''}}>سرقة المياه</option>
                    </select>
                </div>

                <div dir="rtl" class="form-group col">
                    <label class="float-right" for="annee">السنة</label>
                    <input type="text" name="annee" id="annee" class="form-control" placeholder="السنة" value="{{$monDossier->annee}}">
                </div>
                <div dir="rtl" class="form-group col">
                <label class="float-right" for="tribunal_id">المحكمة المختصة</label>
                <select class="form-control" name="tribunal_id" id="tribunal_id">
                        <option value="">إختار</option>
                    @foreach ($tribunals as $tribunal)
                        <option value="{{$tribunal->id}}" {{$monDossier->tribunal_id == $tribunal->id ? 'selected': ''}}>{{$tribunal->nomination}}</option>
                        
                    @endforeach
                    
                  </select>    
                
                </div>
            </div>
            <div dir="rtl" class="row">
    
                <div dir="rtl" class="form-group col-8">
                  <label class="float-right" for="observation">ملاحظة</label>
                  <textarea name="observation" id="observation" rows="3" class="form-control">{{$monDossier->observation ?? ''}}</textarea>
                </div>
                <div dir="rtl" class="form-group col-4">
                  <label class="float-right" for="dossier_id">ملف سابق</label>
                {{-- <input type="text" name="dossier_id" id="dossier_id" class="form-control" placeholder="ملف سابق" value="{{$monDossier->dossier_id}}"> --}}
                    <select dir="rtl" class="form-control" name="dossier_id" id="dossier_id">
                        <option value="">إختار ....</option>
                        @foreach($dossiers as $dossier)
                            <option value="{{$dossier->id}}" {{$dossier->id === $monDossier->dossier_id ? 'selected' : ''}}>{{$dossier->ref}}: {{$dossier->type}} : {{$dossier->annee}}</option>
                        @endforeach
        
                  </select>    
            </div>
            </div>
            <input style="width:31%" name="valider" type="submit" class="btn btn-success" value="تعديل"/>
        </form>
            
            <form action="{{route('dossiers.destroy', ['dossier'=> $monDossier->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <label for=""></label>
                    <input style="width:10%" name="valider" type="submit" class="delete_btn btn btn-danger mt-5 float-right" value="حذف"/>
                </div>
            </form>
        
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){

        $('.delete_btn').on('click', function(event){
            event.preventDefault();
            swal.fire({
            title: 'هل أنت متأكد ؟',
            text: "! لن يكون بإمكانك التراجع ",
            icon: 'question',
            iconHtml: '؟',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم',
            cancelButtonText: 'لا',
            showCancelButton: true,
            showCloseButton: true
      

            }).then((result) => {
            if (result.value) {
            event.target.form.submit();
                Swal.fire(
                'حذف !',
                'تم الحذف.',
                'success'
                )
            }
            })
        });
       
    });
</script>
@endpush