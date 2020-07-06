@extends('layouts.app')
@section('content')
    <div class="container">
      
        <h2 dir="rtl" class="text-center">تفاصيل الملف</h2>
        {{$dossier}}

        <div class="card-group">
            <div class="card">
               
                <div class="card-body">
                <h4 dir="rtl" class="text-center card-title"><span class="badge badge-pill badge-primary">المرجع: {{$dossier->ref}}</span></h4>
                    @if($dossier->encours)
                        <div class="text-center">
                            <span class="badge badge-warning">رائج</span>
                        </div>
                    @endif

                    <p dir="rtl" class="text-right card-text"><span class="badge badge-info">الاطراف :</span><br>
                    @if ($dossier->parties)
                        @foreach ($dossier->parties as $partie)
                            <span>ال{{$partie->pivot->qualite}}: {{$partie->nomination}}</span><br>
                        @endforeach
                    @endif
                    </p>
                    <p dir="rtl" class="text-right card-text"><span class="badge badge-info">مرحلة التقاضي:</span> {{$dossier->niveau}}</p>
                    <p dir="rtl" class="text-right card-text"><span class="badge badge-info">نوع القضية:</span> {{$dossier->type}}</p>
                    <p dir="rtl" class="text-right card-text"><span class="badge badge-info">السنة:</span> {{$dossier->annee}}</p>
                    <p dir="rtl" class="text-right card-text"><span class="badge badge-info">المحكمة المختصة:</span> {{$dossier->tribunal ? $dossier->tribunal->nomination : '...'}}</p>
                    <p dir="rtl" class="text-right card-text"><span class="badge badge-info">الملف السابق:
                        @if ($dossier->previous)
                            </span>المرجع: {{$dossier->previous->ref ?? '...'}} السنة: {{$dossier->previous->annee ?? '...'}} درجة التقاضي: {{$dossier->previous->niveau ?? '...'}}
                            
                        @endif

                    </p>
                    <p dir="rtl" class="text-right card-text"><span class="badge badge-info">ملاحظة:</span> {{$dossier->observation}}</p>
                </div>
            </div>
           
        </div>
        <div class="card-group mt-2">
            <div class="card">
                <h3>إضافة الاطراف</h3>
                <form action="route('dossier_partie_attach', ['dossier' => $dossier->id, 'partie' => partie_id])" method="POST">
                @csrf   
                    <div class="form-group">
                      <label for="partie_id">الطرف</label>
                      <select class="form-control" name="partie_id" id="partie_id">
                        @foreach ($parties as $partie)
                            
                      <option value="{{$partie->id}}">{{$partie->nomination}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                    <input type="submit" value="إضافة">
                </form>
                
            </div>
        </div>
    </div>
@endsection