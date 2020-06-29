
@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-secondary" href="{{route('tribunals.create')}}"">إضافة محكمة </a>
        <h2 dir="rtl" class="text-center">لائحة المحاكم</h2>

        <table dir="rtl" class="table">
            <thead>
                <tr>
                    <th style="text-align: center">الرقم</th>
                    <th>المحكمة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tribunals as $tribunal)
                <tr>
                    <td scope="row">{{$tribunal->id}}</td>
                    <td>{{$tribunal->nomination}}</td>
                </tr>
                @empty
                    
                <tr>
                    <td scope="row">لا شيء</td>
                    <td>لا شيء</td>
                </tr>

                
            
                    
                @endforelse
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection