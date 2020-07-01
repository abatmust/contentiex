
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
                    <th>مرحلة التقاضي</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dossiers as $dossier)
                <tr>
                    <td scope="row">{{$dossier->ref}}</td>
                    <td>{{$dossier->encours}}</td>
                    <td>{{$dossier->annee}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center"><h2>لا شـــــــــــــــيء</h2></td>
                    
                </tr>
                    
                @endforelse
                
            </tbody>
        </table>

    </div>
@endsection