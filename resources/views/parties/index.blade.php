
@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-secondary" href="{{route('parties.create')}}">إضافة جديدة </a>
        <h2 dir="rtl" class="text-center">لائحة الاطراف</h2>
        <input dir="rtl" id="myInput" type="text" placeholder="بحث ..." class="float-right form-control my-3" style="width:20%">
        

        <table dir="rtl" class="table" id="myTable">
            <thead>
                <tr>
                    <th style="text-align: center">الرقم</th>
                    <th style="text-align: center">التسمية</th>
                    <th style="text-align: center">---</th>
                    <th style="text-align: center">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($parties as $partie)
                <tr class="rowData">
                    <td scope="row" style="text-align: center">{{$partie->id}}</td>
                    <td style="text-align: center">{{$partie->nomination}}</td>
                    <td style="text-align: center">
                        <form action="{{route('parties.destroy', ['party' => $partie->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="delete_btn btn btn-danger" type="submit" value="حذف">
                        </form>
                    </td>
                    <td style="text-align: center">
                        
                            <a href="{{route('parties.edit', ['party' => $partie->id])}}" class="btn btn-success" >تعديل</a>
                       
                    </td>
                </tr>
                @empty
                    
                <tr>
                    <td colspan="4" style="text-align: center"><h2>لا شـــــــــيء</h2></td>
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
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr.rowData").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
  });
       
    });
</script>
@endpush