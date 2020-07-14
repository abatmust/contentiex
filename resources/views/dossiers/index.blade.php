
@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-secondary d-print-none" href="{{route('dossiers.create')}}">ملف جديد</a>
        <h2 dir="rtl" class="text-center">لائحة الملفات</h2>
        <input dir="rtl" id="myInput" type="text" placeholder="بحث ..." class="float-right form-control my-3 d-print-none" style="width:20%">
        <table id="myTable" dir="rtl" class="table">
            <thead>
                <tr>
                    <th style="text-align: center">المرجع</th>
                    <th style="text-align: center; width: 20%">الاطراف</th>
                    <th style="text-align: center">رائج</th>
                    <th style="text-align: center"> السنة</th>
                    <th style="text-align: center"> المحكمة المختصة</th>
                    <th style="text-align: center">
                         نوع الملف
                         <br>
                         <select id="typeSelected" class="form-control my-2 d-print-none" name="niveau" id="type">
                                <option  value=""> ...</option>
                                <option>إداري</option>
                                <option>مدني</option>
                                <option>تجاري</option>
                                <option>إجتماعي</option>
                                <option>جنحي</option>
                                <option>سرقة المياه</option>
                             
                         </select>
                    </th>
                    <th style="text-align: center">
                        مرحلة التقاضي <br>
                        <select id="niveauSelected" class="form-control my-2 d-print-none" name="niveau" id="niveau">
                            <option  value=""> ...</option>
                            <option>إبتدائي</option>
                            <option>إستئناف</option>
                            <option>نقض</option>
                            
                        </select>
                    </th>
                    <th style="text-align: center">ملف سابق</th>
                    <th style="text-align: center">ملاحظات</th>
                    <th style="text-align: center" class="d-print-none">...</th>
                    <th style="text-align: center" class="d-print-none">...</th>
                    <th style="text-align: center" class="d-print-none">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dossiers as $dossier)
                <tr class="rowData">
                    <td scope="row">{{$dossier->ref}}</td>
                    <td scope="row" style="width: 20%">
                        @forelse ($dossier->parties as $partie)
                            {{$partie->pivot->qualite . ':'?? ''}} <b> {{$partie->nomination}}</b><br>
                        @empty
                            ...
                        @endforelse
                        
                    </td>
                    <td>
                        @if($dossier->encours) 
                            <span class='badge badge-warning'>رائج</span>
                        @endif
                    </td>
                    <td>{{$dossier->annee}}</td>
                    <td>{{$dossier->tribunal->nomination ?? '---'}}</td>
                    <td class="col4">{{$dossier->type}}</td>
                    <td class="col5">{{$dossier->niveau}}</td>
                    <td> </span>{{$dossier->previous->ref ?? '...'}} /{{$dossier->previous->annee ?? '...'}} / {{$dossier->previous->niveau ?? '...'}}</td>
                    <td>{{$dossier->observation}}</td>

                    <td class="d-print-none"><a href="{{route('dossiers.edit', ['dossier' => $dossier->id])}}" class="btn btn-primary">تعديل</a></td>
                    <td class="d-print-none"><a href="{{route('dossiers.show', ['dossier' => $dossier->id])}}" class="btn btn-secondary">تفاصيل</a></td>
                    <td class="d-print-none">
                        
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
@push('scripts')
<script>
    $(document).ready(function(){

        
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr.rowData").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
         });
        $("#niveauSelected").on("change", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable td.col5:contains('" + value + "')").parent().show();
            $("#myTable td.col5:not(:contains('" + value + "'))").parent().hide();
           
         });
        $("#typeSelected").on("change", function() {
            var value = $(this).val().toLowerCase();
          
            $("#myTable td.col4:contains('" + value + "')").parent().show();
            $("#myTable td.col4:not(:contains('" + value + "'))").parent().hide();
            
         });
       
    });
</script>
@endpush