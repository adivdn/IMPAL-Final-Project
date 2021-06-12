@extends('layout.admin')

@section('title','Admin Page')

@section('container')

<link rel="stylesheet" href="{{ asset('AdminActivities.css') }}">

    <div id="main">
        <div  class="header">
            <button class="openbtn" onclick="openNav()">☰</button>
        </div>
        <div class="container">
            <h1 class="mt-5">Data Pembayaran</h1>
            

            <!-- Modal -->

            <table class="table mt-5 table-bordered">
                <thead class="bg-light text-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Pembayaran</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Metode</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataBayar as $db)
                        <tr class="data-row">
                            <th class="tbId" scope="row">{{$db->id}}</th>
                            <td class="">{{$db->pembayarans_id}}</td>
                            <td class="">{{$db->kode}}</td>
                            <td class="">{{$db->metode}}</td>
                            @if($db->konfirmasi == '0')
                            <td class="">
                                <a href="{{route('adminBayar',['id' => $db->id, 'status' => 'sudah'])}}" class="btn btn-success">Sudah</a> <a href="{{route('adminBayar',['id' => $db->id, 'status' => 'belum'])}}" class="btn btn-danger">Belum</a>
                            
                            </td>
                            @else
                            <td class="">{{$db->konfirmasi}}</td>
                            @endif
                        </tr>
                    @endforeach
                   
                </tbody>
               
            </table>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $(document).on('click', "#edit-item", function() {
        $(this).addClass('edit-item-trigger-clicked');

        var options = {
        'backdrop': 'static'
        };
        $('#modalEditMember').modal(options)
  })

  $('#modalEditMember').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked");
    var row = el.closest(".data-row");

    var id = row.children(".tbId").text();
    var nama = row.children(".tbNamaKereta").text();
    var jumlahkursi = row.children(".tbjumlah_kursi").text();
    var stasiun_asal = row.children(".tbStasiunAsal").text();
    var stasiun_tujuan = row.children(".tbStasiunTujuan").text();
    var jamkeberangkatan = row.children(".tbjamkeberangkatan").text();
    var jamtiba = row.children(".tbjamtiba").text();
    var gerbong = row.children(".tbgerbong").text();

    $("#editId").val(id);
    $("#editNama").val(nama);
    $("#editJumlahKursi").val(jumlahkursi);
    $("#editStasiunAsal").val(stasiun_asal);
    $("#editStasiunTujuan").val(stasiun_tujuan);
    $("#editJamKeberangkatan").val(jamkeberangkatan);
    $("#editJamTiba").val(jamtiba);
    $("#editGerbong").val(gerbong);
  })

  $('#modalEditMember').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked');
    $("#edit-form").trigger("reset");
  })
})
</script>
