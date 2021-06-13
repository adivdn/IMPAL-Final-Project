@extends('layout.admin')

@section('title','Admin Page')

@section('container')

<link rel="stylesheet" href="{{ asset('AdminActivities.css') }}">

    <div id="main">
        <div  class="header">
            <button class="openbtn" onclick="openNav()">☰</button>
            <form class="form-inline my-2 my-lg-0 ml-auto">
				<a href="{{route('logout')}}" class="btn bg-navy my-2 my-sm-0 widht-btn1">Logout</a>
			</form>
        </div>
        <div class="container">
            <h1 class="mt-5">Data Pemesanan</h1>
            

            <!-- Modal -->

            <table class="table mt-5 table-bordered">
                <thead class="bg-light text-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Nama Kereta</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">Stasiun Asal</th>
                        <th scope="col">Stasiun Tujuan</th>
                        <th scope="col">Jam Keberangkatan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $count = 1;
                    @endphp
                    @foreach($dataPemesan as $dp)
                        
                        <tr class="data-row">
                            <th class="tbId" scope="row">{{$count}}</th>
                            <td>{{$dp->name}}</td>
                            <td>{{$dp->total_cost}}</td>
                            <td>{{$dp->nama_kereta}}</td>
                            <td>{{$dp->adult + $dp->child}}</td>
                            <td>{{$dp->stasiun_asal}}</td>
                            <td>{{$dp->stasiun_tujuan}}</td>
                            <td>{{$dp->jam_keberangkatan}}</td>
                        </tr>
                        @php
                         $count = $count +1;
                    @endphp
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
