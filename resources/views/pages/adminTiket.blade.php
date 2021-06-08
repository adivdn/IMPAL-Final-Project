@extends('layout.admin')

@section('title','Admin Page')

@section('container')

<link rel="stylesheet" href="{{ asset('AdminActivities.css') }}">

    <div id="main">
        <div  class="header">
            <button class="openbtn" onclick="openNav()">☰</button>
        </div>
        <div class="container">
            <h1 class="mt-5">CRUD Tiket</h1>
            <button type="button" class="btn-add btn-primary mt-5" data-toggle="modal" data-target="#modalTambahMember">
            + Tambah Tiket
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalTambahMember" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Tiket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('addTiket')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nama">Id Kereta</label>
                                    <input type="text" class="form-control" id="id_kereta" name="id_kereta" placeholder="Id Kereta" required>
                                </div>
                                <div class="form-group">
                                    <label for="jadwal">Jadwal</label>
                                    <input type="date" class="form-control" id="jadwal" name="jadwal" placeholder="Jadwal" required>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga_tiket">Harga Tiket</label>
                                    <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Harga Tiket" required>
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
                        <th scope="col">Id Kereta</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($listtiket as $lt)
                        <tr class="data-row">
                            <th class="tbId" scope="row">{{  $lt->id }}</th>
                            <td class="tbIdKereta">{{  $lt->keretas_id   }}</td>
                            <td class="tbJadwal">{{  $lt->jadwal }}</td>
                            <td class="tbKelas">{{  $lt->kelas }}</td>
                            <td class="tbHarga">{{  $lt->harga_tiket }}</td>
                            <td><button class=" btn btn-success rounded" id="edit-item">Edit</button> <a class="btn btn-danger rounded" href="{{route('tiketDelete', ['id' => $lt->id])}}">Delete</a></td>
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
                                <form id="edit-form" action="{{route('tiketEdit')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="editId" id="editId">
                                    <div class="form-group">
                                        <label for="nama">Id Kereta</label>
                                        <input type="text" class="form-control" id="id_kereta" name="id_kereta" placeholder="id Kereta" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jadwal">Jadwal</label>
                                        <input type="date" class="form-control" id="editjadwal" name="editjadwal" placeholder="Jadwal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" class="form-control" id="editkelas" name="editkelas" placeholder="Kelas" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_tiket">Harga Tiket</label>
                                        <input type="number" class="form-control" id="editharga_tiket" name="editharga_tiket" placeholder="Harga Tiket" required>
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
    var idKereta = row.children(".tbIdKereta").text();
    var jadwal = row.children(".tbJadwal").text();
    var kelas = row.children(".tbKelas").text();
    var harga = row.children(".tbHarga").text();

    $("#editId").val(id);
    $("#id_kereta").val(idKereta);
    $("#editjadwal").val(jadwal);
    $("#editkelas").val(kelas);
    $("#editharga_tiket").val(harga);
  })

  $('#modalEditMember').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked');
    $("#edit-form").trigger("reset");
  })
})
</script>
