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
            <h1 class="mt-5">CRUD Kereta</h1>
            <button type="button" class="btn-add btn-primary mt-5" data-toggle="modal" data-target="#modalTambahMember">
            + Tambah Kereta
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalTambahMember" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Kereta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('addKereta')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nama">Nama Kereta</label>
                                    <input type="text" class="form-control" id="nama_kereta" name="nama_kereta" placeholder="Nama Kereta" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_kursi">Jumlah Kursi</label>
                                    <input type="number" min="100" max="200" class="form-control" id="jumlah_kursi" name="jumlah_kursi" placeholder="Jumlah Kursi" required>
                                </div>
                                <div class="form-group">
                                    <label for="stasiun_asal">Stasiun Asal</label>
                                    <input type="text" class="form-control" id="stasiunAsal" name="stasiun_asal" placeholder="Stasiun Asal" required>
                                </div>
                                <div class="form-group">
                                    <label for="stasiun_tujuan">stasiun Tujuan</label>
                                    <input type="text" class="form-control" id="stasiunTujuan" name="stasiun_tujuan" placeholder="Stasiun Tujuan" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam_keberangkatan">Jam Keberangkatan</label>
                                    <input type="time"  class="form-control" id="jam_keberangkatan" name="jam_keberangkatan" placeholder="Jam Keberangkatan" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam_tiba">Jam Tiba</label>
                                    <input type="time"  class="form-control" id="jam_tiba" name="jam_tiba" placeholder="Jam Tiba" required>
                                </div>
                                <div class="form-group">
                                    <label for="gerbong">Gerbong</label>
                                    <input type="text" class="form-control" id="gerbong" name="gerbong" placeholder="Gerbong" required>
                                </div>
                                <button type="submit" class="btn btn-success my-3" style="float : right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                @foreach ($listkereta as $lk)
                        <tr class="data-row">
                            <th class="tbId" scope="row">{{  $lk->id }}</th>
                            <td class="tbNamaKereta">{{  $lk->nama_kereta   }}</td>
                            <td class="tbjumlah_kursi">{{  $lk->jumlah_kursi }}</td>
                            <td class="tbStasiunAsal">{{  $lk->stasiun_asal }}</td>
                            <td class="tbStasiunTujuan">{{  $lk->stasiun_tujuan }}</td>
                            <td class="tbjamkeberangkatan">{{  $lk->jam_keberangkatan  }}</td>
                            <td class="tbjamtiba">{{  $lk->jam_tiba   }}</td>
                            <td class="tbgerbong">{{  $lk->gerbong  }}</td>
                            <td><button class=" btn btn-success rounded" id="edit-item">Edit</button> <a class="btn btn-danger rounded" href="{{route('keretaDelete', ['id' => $lk->id])}}">Delete</a></td>
                        </tr>
                    @endforeach
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
