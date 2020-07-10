@extends('layouts.app')
@section('content')
    <div class="container">
    <h2 class="text-right">لائحة الاحكام الصادرة في الملف {{$dossier->ref}}</h2>
    @foreach($errors->all() as $error)
               
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Alert!</strong> {{$error}}.
                </div>
            @endforeach
@foreach ($dossier->jugements as $jugement)
    <div class="card text-right mb-2">
        <div class="card-body">
        <h4 dir="rtl" class="card-title text-right">الحكم عدد :{{$jugement->num }} بتاريخ: {{$jugement->date}}</h4>
        <p dir="rtl" class="card-text text-right">{{$jugement->contenu}}</p>

            <button class="btn btn-info btn-sm update-btn mb-3">إستمارة التعديل</button>
            @if($errors->any())
            

        @endif
        <form action="{{route('jugement.update', ['jugement' => $jugement->id])}}" method="POST" class="myform rounded p-3 d-none" style="border: 2px solid black">
            @csrf
            @method('PUT')    
            <div dir ="rtl" class="row">
                    <div class="form-group col">
                      <label for="num">عدد</label>
                    <input type="text" name="num" id="num" class="form-control" placeholder="عدد" value="{{$jugement->num}}">
                    </div>
                    <div class="form-group col">
                      <label for="date">التاريخ</label>
                      <input type="date" name="date" id="date" class="form-control" placeholder="التاريخ" value="{{$jugement->date}}">
                    </div>
                    <div class="form-group col">
                        <label for="montant">المبلغ</label>
                        <input type="text" name="montant" id="num" class="form-control" placeholder="المبلغ" value="{{$jugement->montant}}">
                    </div>
                    <div class="form-check col">
                        <label class="form-check-label">
                            <div>

                                في مصلحة م.ح
                            </div>
                        <input type="checkbox" class="form-control form-check-input" name="favorable" id="favorable {{$jugement->favorable ? 'checked' : ''}}">
                        
                    </label>
                    </div>

                </div>
                <div dir="rtl" class="row">
                    <div class="form-group col-8">
                      <label for="contenu">المضمون</label>
                      <textarea name="contenu" id="contenu" class="form-control" placeholder="المضمون" rows="2">{{$jugement->contenu}}</textarea>
                    </div>
                    <div class="col-4">
                        <br>
                        <br>
                        <input class="btn btn-lg btn-block btn-primary" style="width: 50%" type="submit" value="تأكيد">

                    </div>
                  
                </div>
                

            </form>
        </div>
    </div>
    
@endforeach
  
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){

        $('.update-btn').on('click', function(){
           
            $(this).next('.myform').toggleClass("d-none");
       
    });
    })
</script>
@endpush