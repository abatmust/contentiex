@extends('layouts.app')
@section('content')
    <div class="container">
      
        <h2 dir="rtl" class="text-center">تفاصيل الملف</h2>

        <div class="card-group">
            <div class="card">
               
                <div class="card-body">
                <h4 dir="rtl" class="text-center card-title"><span class="badge badge-pill badge-primary">المرجع: {{$dossier->ref}}</span></h4>
                    @if($dossier->encours)
                        <div class="text-center">
                            <span class="badge badge-warning">رائج</span>
                        </div>
                    @endif
                    <div dir="rtl" class="row">
                        <div dir="rtl" class="col-10">
                            <p dir="rtl" class="text-right card-text"><span class="badge badge-info">الاطراف :</span><br>
                                @if ($dossier->parties)
                                    @foreach ($dossier->parties as $partie)
                                        <span>ال{{$partie->pivot->qualite}}: {{$partie->nomination}}</span><br>
                                    @endforeach
                                @endif
                                </p>
                        </div>
                        <div dir="rtl" class="col-2">
                        <a class="btn btn-sm btn-primary" href="{{'../addPartieToDossier/' . $dossier->id}}">معالجة الاطراف</a>
                        </div>
                    </div>
                        
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
        
    </div>
@endsection