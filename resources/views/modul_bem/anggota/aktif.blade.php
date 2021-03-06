@extends('layouts.bem_template')
@section('title','Anggota BEM')
@section('header','Data Anggota BEM')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><a href="{{url('anggota-bem-add')}}" class="btn btn-primary">Tambah</a></h4>
            <div class="table-responsive">
                <table class="table color-table dark-table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No. Telp</th>
                            <th>Jurusan</th>
                            <th>Jabatan</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($anggota as $item)
                           <tr>
                               <td>{{$no}}</td>
                               <td>{{$item->nama}}</td>
                               <td>{{$item->no_telp}}</td>
                               <td>
                                   @if ($item->jurusan == "TI")
                                       <span class="label label-primary">Teknik Informatika</span>
                                   @elseif($item->jurusan == "SI")
                                        <span class="label label-primary">Sistem Informasi</span>
                                    @elseif($item->jurusan == "AK")
                                        <span class="label label-primary">Akuntansi</span>
                                    @elseif($item->jurusan == "MA")
                                        <span class="label label-primary">Manajemen</span>
                                   @endif
                               </td>
                               <td>
                                   @if ($item->jabatan == "")
                                       <span class="label label-warning">Belum Dipilih</span>
                                   @else
                                    <span class="label label-warning">{{$item->jabatan}}</span>
                                   @endif
                               </td>
                               <td>{{$item->angkatan}}</td>
                               <td>
                                   @if ($item->status == "Aktif")
                                        <span class="label label-primary">Anggota Aktif</span>
                                   @elseif($item->status == "Non-Aktif")
                                        <span class="label label-warning">Tidak Aktif</span>
                                   @else
                                        <span class="label label-warning">Pembimbing</span>
                                   @endif
                               </td>
                               <td>
                                  @if ($item->jabatan == "")
                                    <a data-id-jab="{{$item->id}}" data-id-nam="{{$item->nama}}" data-toggle="modal" data-target="#tampiljab" id="addjabatan" class="btn btn-sm btn-info" style="color:white">Add Jabatan</a>
                                    <a data-id={{$item->id}} 
                                            data-id-name = {{$item->nama}}
                                            data-id-alamat={{$item->alamat}}
                                            data-id-no={{$item->no_telp}}
                                            data-id-jur={{$item->jurusan}}
                                            data-id-angkatan={{$item->angkatan}}
                                            data-id-status ={{$item->status}}
                                        class="btn btn-sm btn-warning" data-toggle="modal" data-target="#tampil" id="edit" style="color:white" >Edit</a>
                                  @else
                                    <a data-id={{$item->id}} 
                                            data-id-name = {{$item->nama}}
                                            data-id-alamat={{$item->alamat}}
                                            data-id-no={{$item->no_telp}}
                                            data-id-jur={{$item->jurusan}}
                                            data-id-angkatan={{$item->angkatan}}
                                            data-id-status ={{$item->status}}
                                        class="btn btn-sm btn-warning" data-toggle="modal" data-target="#tampil" id="edit" style="color:white" >Edit</a>
                                  @endif
                                  
                               </td>
                           </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
                @include('modul_bem.anggota.edit')
            </div>
            @include('modul_bem.anggota.addjab')
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    // Tampilkan Modal Edit Anggota
    $(document).on('click','#edit', function(){
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-id-name');
        var alamat = $(this).attr('data-id-alamat');
        var no_telp = $(this).attr('data-id-no');
        var jurusan = $(this).attr('data-id-jur');
        var angkatan = $(this).attr('data-id-angkatan');
        var status = $(this).attr('data-id-status');
        $("#id").val(id)
        $("#nama").val(nama)
        $("#alamat").val(alamat)
        $("#no_telp").val(no_telp)
        $("#jurusan").val(jurusan)
        $("#angkatan").val(angkatan)
        $("#status").val(status)
    });
    
    // Proses Edit Anggota
    $(document).on('click','#simpan', function(){
        var id = $("#id").val();
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var no_telp = $("#no_telp").val();
        var jurusan = $("#jurusan").val();
        var angkatan = $("#angkatan").val();
        var status = $("#status").val();
        
        $.get('{{Url("anggota-bem-edit")}}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id,no_telp:no_telp,nama:nama,alamat:alamat,jurusan:jurusan,status:status,angkatan:angkatan}, function(resp){
                swal({
                html :  "Berhasil Edit Harga",
                showConfirmButton :  false,
                type: "success",
                timer: 1000 
                });
            $("#id").val(''); 
            $("#nama").val('');
            $("#alamat").val('');
            $("#no_telp").val('');
            $("#jurusan").val(''); 
            $("#angkatan").val(''); 
            $("#status").val('');  
            location.reload();
        });
    });

    // Tampilkan Modal Tambah Anggota
    $(document).on('click','#addjabatan', function(){
        var id = $(this).attr('data-id-jab');
        var nama = $(this).attr('data-id-nam');
        var jabatan = $(this).attr('data-id-jabatan');
        $("#id").val(id)
        $("#nam").val(nama)
        $("#jabatan").val(jabatan)
    });

    // Proses Tambah Jabatan BEM
    $(document).on('click','#simpan_jabatan', function(){
    var id = $("#id").val();
    var nama = $("#nam").val();
    var jabatan = $("#jabatan").val();

    $.get('{{Url("add-jabatan-bem")}}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id,nama:nama,jabatan:jabatan}, function(resp){
                swal({
                html :  "Berhasil Menambah Jabatan",
                showConfirmButton :  false,
                type: "success",
                timer: 1000 
                });
            $("#id").val(''); 
            $("#nam").val('');
            $("#jabatan").val('');
            location.reload();
        });
    });
</script>
@endsection