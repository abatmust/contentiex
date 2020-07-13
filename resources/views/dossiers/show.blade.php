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
        <div class="card-group">
            <div class="card">
                <h4 dir="rtl" class="text-center card-title"><span class="badge badge-pill badge-primary">الاجراءات</span></h4>
                <div class="card-body">
                    <a class="btn btn-sm btn-primary mb-2" href="{{route('dossiers.acte.create', ['dossier' => $dossier->id])}}">إجراء جديد</a>
                    <table dir="rtl" class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center">نوع</th>
                                <th style="text-align: center">التاريخ</th>
                                <th style="text-align: center">الآجل</th>
                                <th style="text-align: center">المضمون</th>
                                <th>...</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dossier->actes as $acte)
                            <tr>
                                <td style="text-align: center">{{$acte->type}}</td>
                                <td style="text-align: center">{{$acte->date}}</td>
                                <td style="text-align: center">{{$acte->delai}}</td>
                                <td style="text-align: center">{{$acte->contenu}}</td>
                                <td>
                                <form action="{{route('actes.destroy', ['acte' => $acte->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <input class="btn btn-sm btn-danger delete_btn" type="submit" value="حذف">
                                    </form>
                                </td>
                            <td><a class="btn btn-sm btn-secondary" href="{{route('actes.edit', ['acte' => $acte->id])}}">تعديل</a></td>
                               
                            </tr>
                                
                            @empty
                            <tr>
                                <td style="text-align: center" colspan="6"><h2>لا شـــــــيئ</h2></td>
                              
                            </tr>
                                
                            @endforelse
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        
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