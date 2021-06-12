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
                        <th scope="col">Nama Kereta</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">Stasiun Asal</th>
                        <th scope="col">Stasiun Tujuan</th>
                        <th scope="col">Jam Keberangkatan</th>
                        <th scope="col">Jam Tiba</th>
                        <th scope="col">Gerbong</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                        <tr class="data-row">
                            <th class="tbId" scope="row"></th>
                            <td class="tbNamaKereta"></td>
                            <td class="tbjumlah_kursi"></td>
                            <td class="tbStasiunAsal"></td>
                            <td class="tbStasiunTujuan"></td>
                            <td class="tbjamkeberangkatan"></td>
                            <td class="tbjamtiba"></td>
                            <td class="tbgerbong"></td>
                        </tr>
                   
                </tbody>
                <div class="modal fade" id="modalEditMember" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Kereta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="edit-form" action="{{route('keretaEdit')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="editId" id="editId">
                                    <div class="form-group">
                                        <label for="nama">Nama Kereta</label>
                                        <input type="text" class="form-control" id="editNama" name="nama_kereta" placeholder="" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="JumlahKursi">Jumlah Kursi</label>
                                        <input type="number" class="form-control" id="editJumlahKursi" name="jumlah_kursi" placeholder="Jumlah Kursi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="StasiunAsal">Stasiun Asal</label>
                                        <input type="text" class="form-control" id="editStasiunAsal" name="stasiun_asal" placeholder="Stasiun Asal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="StasiunTujuan">Stasiun Tujuan</label>
                                        <input type="text" class="form-control" id="editStasiunTujuan" name="stasiun_tujuan" placeholder="Stasiun Tujuan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jamkeberangkatan">Jam Keberangkatan</label>
                                        <input type="time" class="form-control" id="editJamKeberangkatan" name="jam_keberangkatan" placeholder="Jam Keberangkatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jamTiba">Jam Tiba</label>
                                        <input type="time" class="form-control" id="editJamTiba" name="jam_tiba" placeholder="Jam Keberangkatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Gerbong">Gerbong</label>
                                        <input type="text" class="form-control" id="editGerbong" name="gerbong" placeholder="Gerbong" required>
                                    </div>
                                    <button type="submit" class="btn btn-success my-3" style="float : right">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
