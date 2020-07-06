
@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-secondary" href="{{route('tribunals.create')}}">إضافة محكمة </a>
        <h2 dir="rtl" class="text-center">لائحة المحاكم</h2>

        <table dir="rtl" class="table">
            <thead>
                <tr>
                    <th style="text-align: center">الرقم</th>
                    <th style="text-align: center">المحكمة</th>
                    <th style="text-align: center">---</th>
                    <th style="text-align: center">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tribunals as $tribunal)
                <tr>
                    <td scope="row" style="text-align: center">{{$tribunal->id}}</td>
                    <td style="text-align: center">{{$tribunal->nomination}}</td>
                    <td style="text-align: center">
                        <form action="{{route('tribunals.destroy', ['tribunal' => $tribunal->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="delete_btn btn btn-danger" type="submit" value="حذف">
                        </form>
                    </td>
                    <td style="text-align: center">
                        
                            <a href="{{route('tribunals.edit', ['tribunal' => $tribunal->id])}}" class="btn btn-success" >تعديل</a>
                       
                    </td>
                </tr>
                @empty
                    
                <tr>
                    <td colspan="4"><h2 style="text-align: center">لا شـــــــــيء</h2></td>
                </tr>

                
            
                    
                @endforelse
               
            </tbody>
        </table>

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