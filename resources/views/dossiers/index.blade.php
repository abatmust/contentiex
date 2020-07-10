
@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-secondary" href="{{route('dossiers.create')}}"">ملف جديد</a>
        <h2 dir="rtl" class="text-center">لائحة الملفات</h2>

        <table dir="rtl" class="table">
            <thead>
                <tr>
                    <th style="text-align: center">المرجع</th>
                    <th>رائج</th>
                    <th> السنة</th>
                    <th> المحكمة المختصة</th>
                    <th> نوع الملف</th>
                    <th>مرحلة التقاضي</th>
                    <th>ملف سابق</th>
                    <th>ملاحظات</th>
                    <th>...</th>
                    <th>...</th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dossiers as $dossier)
                <tr>
                    <td scope="row">{{$dossier->ref}}</td>
                    <td>
                        @if($dossier->encours) 
                            <span class='badge badge-warning'>رائج</span>
                        @endif
                    </td>
                    <td>{{$dossier->annee}}</td>
                    <td>{{$dossier->tribunal->nomination ?? '---'}}</td>
                    <td>{{$dossier->type}}</td>
                    <td>{{$dossier->niveau}}</td>
                    <td> </span>{{$dossier->previous->ref ?? '...'}} /{{$dossier->previous->annee ?? '...'}} / {{$dossier->previous->niveau ?? '...'}}</td>
                    <td>{{$dossier->observation}}</td>
                    <td><a href="{{route('dossiers.edit', ['dossier' => $dossier->id])}}" class="btn btn-primary">تعديل</a></td>
                    <td><a href="{{route('dossiers.show', ['dossier' => $dossier->id])}}" class="btn btn-secondary">تفاصيل</a></td>
                    <td>
                        
                        <a href="{{route('dossiers.jugement.create', ['dossier' => $dossier->id])}}" class="btn btn-secondary mb-1">إضافة حكم</a>
                        
                        @if (!$dossier->jugements->isEmpty())
                            <a href="{{route('dossiers.jugement.index', ['dossier' => $dossier->id])}}" class="btn btn-primary">لائحة الاحكام</a>
                        @endif
                        
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10"><h2 style="text-align: center">لا شـــــــــــــــيء</h2></td>
                    
                </tr>
                    
                @endforelse
                
            </tbody>
        </table>

    </div>
@endsection