@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div dir="rtl" class="card-header text-right">لوحة الاستقبال</div>

                <div class="card-body text-center" dir="rtl">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 dir="rtl" class="text-right">مرحبا بكم بقسم المنازعات ...</h2>

                    <a class="btn btn-primary btn-lg" href="{{route('dossiers.index')}}">الملفات</a>
                    <a class="btn btn-primary btn-lg" href="{{route('tribunals.index')}}">المحاكم</a>
                    <a class="btn btn-primary btn-lg" href="{{route('parties.index')}}">الاطراف</a>
                    <a class="btn btn-primary btn-lg" href="{{route('jugements.index')}}">الاحكام</a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
