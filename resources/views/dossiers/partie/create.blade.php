@extends('layouts.app')
@section('content')
    <div class="container">

        <h2 dir="rtl" style="text-align: right">إضافة طرف الى الملف</h2>

        <p>الملف رقم: {{$dossier->ref}}</p>
        <div dir="rtl" class="row">
            <div class="card text-left col">
      
                <div class="card-body">
                    <h4 dir="rtl" style="text-align: right" class="card-title">الاطراف</h4>
                        @if ($dossier->parties)
                            @foreach ($dossier->parties as $partie)
                                <div class="text-right row" dir="rtl">
                                    <div class="col-10">
                                        ال{{$partie->pivot->qualite}}: <b>{{$partie->nomination}}</b>
                                    </div>
                                    <div class="col-2">
                                    <form action="{{route('detachPartieFromDossier', ['dossier_id' => $dossier->id, 'partie_id' => $partie->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <input class="btn btn-danger btn-sm mb-1 delete_btn" type="submit" value="حذف">
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                </div>
            </div>
        <div class="col">
            <form action="{{route('addPartieToDossier', ['dossier_id' => $dossier->id])}}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label dir="rtl" class="float-right" for="partie_id">الاطراف</label>
                    <select dir="rtl" class="form-control" name="partie_id" id="partie_id">
                      <option value="">إختار ....</option>
                      @foreach($parties as $partie)
                          <option value="{{$partie->id}}"
                            {{in_array($partie->id, $dossier->parties->pluck('id')->toArray()) ? 'disabled' : ''}}
                            >{{$partie->nomination}}</option>
                      @endforeach
          
                    </select>
                  </div>
                  <div class="form-group">
                    <label dir="rtl" class="float-right" for="qualite">صفة الطرف في القضية</label>
                    <select dir="rtl" class="form-control" name="qualite" id="qualite">
                        <option value="">إختار ....</option>
                      @foreach(['مدعي','مدعى عليه','مدخل في الدعوى'] as $item)
                          <option>{{$item}}</option>
                      @endforeach
          
                    </select>
                  </div>
                  <input type="submit" class="btn btn-success" value="إضافة">
            </form>
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