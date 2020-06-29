@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body text-center" dir="rtl">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 dir="rtl" class="text-right">مرحبا بكم بقسم المنازعات ...</h2>

                    <a class="btn btn-primary btn-lg" href="{{route('dossiers.index')}}">الملفات</a>
                    <a class="btn btn-primary btn-lg" href="{{route('tribunals.index')}}">المحاكم</a>
                    <button class="btn btn-success">المحاكم</button>
                    <button class="btn btn-success btn-sm">الاطراف</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
