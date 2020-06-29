
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
                @foreach ($dossiers as $dossier)
                <tr>
                    <td scope="row">{{$dossier->ref}}</td>
                    <td>{{$dossier->encours}}</td>
                    <td>{{$dossier->annee}}</td>
                </tr>
                    
                @endforeach
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection