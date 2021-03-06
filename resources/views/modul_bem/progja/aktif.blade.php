@extends('layouts.bem_template')
@section('title','BEM - Progja Aktif')
@section('header','Data Program Kerja Aktif')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table color-table dark-table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Pengajuan</th>
                            <th>Program Kerja</th>
                            <th>Penanggung Jawab</th>
                            <th>Tgl Pengajuan</th>
                            <th>Tgl Disetujui</th>
                            <th>Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($aktif as $item)
                            <tr style="color:black">
                                <td>{{$no}}</td>
                                <td>{{$item->no_pengajuan}}</td>
                                <td>{{$item->judul}}</td>
                                <td>{{$item->pic}}</td>
                                <td>{{$item->created_at->format('d-m-y')}}</td>
                                <td>{{$item->updated_at->format('d-m-y')}}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">Download</a>
                                </td>
                            </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    // Tinjau Program Kerja
    $(document).on('click','#tinjau', function () {
    var id = $(this).attr('data-id-tinjau');
    $.get(' {{Url("progja-bem-a-tinjau")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
        swal({
            html : "Berhasil Ubah Status Diterima",
            showConfirmButton : false,
            type : "success",
            timer : 1000
        });
        location.reload();
    });
    });

    // Teruskan Program Kerja ke Kemahasiswaan
    $(document).on('click','#teruskan', function () {
    var id = $(this).attr('data-id-teruskan');
    $.get(' {{Url("progja-bem-teruskan")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
        swal({
            html : "Berhasil Ubah Status Diterima",
            showConfirmButton : false,
            type : "success",
            timer : 1000
        });
        location.reload();
    });
    });

    // Revisi Program Kerja Untuk UKM
    $(document).on('click','#revisi', function () {
    var id = $(this).attr('data-id-revisi');
    $.get(' {{Url("progja-bem-revisi")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
        swal({
            html : "Berhasil Ubah Status Diterima",
            showConfirmButton : false,
            type : "success",
            timer : 1000
        });
        location.reload();
    });
    });

    // / Program Kerja Ditolak
    $(document).on('click','#tolak', function () {
    var id = $(this).attr('data-id-tolak');
    $.get(' {{Url("progja-bem-tolak")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
        swal({
            html : "Berhasil Ubah Status Diterima",
            showConfirmButton : false,
            type : "success",
            timer : 1000
        });
        location.reload();
    });
    });
</script>
@endsection