@extends('template.master')
@section('content')
    <style>
        h6 {
            color: #155592;
            font-weight: bold;
        }
    </style>
    <style>
        .nav-pills .nav-link.active {
            color: #fff;
            background-color: #00A549;
            box-shadow: 0px 10px 20px 0px rgba(50, 50, 50, 0.52)
        }

        .nav {
            white-space: nowrap;
            display: block !important;
            flex-wrap: nowrap;
            max-width: 100%;
            overflow-x: scroll;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch
        }

        .nav li {
            display: inline-block
        }

        input[type=number] {
            /*for absolutely positioning spinners*/
            position: relative;
            padding: 5px;
            padding-right: 25px;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            opacity: 1;
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: inner-spin-button !important;
            width: 25px;
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
        }

        .custom-scrollbar-js,
        .custom-scrollbar-css {
            height: 75px;
        }


        /* Custom Scrollbar using CSS */
        .custom-scrollbar-css {
            overflow-y: scroll;
        }

        /* scrollbar width */
        .custom-scrollbar-css::-webkit-scrollbar {
            width: 3px;
        }

        /* scrollbar track */
        .custom-scrollbar-css::-webkit-scrollbar-track {
            background: #EEE;
        }

        /* scrollbar handle */
        .custom-scrollbar-css::-webkit-scrollbar-thumb {
            border-radius: 1rem;
            background: #26C784;
            background: -webkit-linear-gradient(to right, #11998e, #26C784);
            background: linear-gradient(to right, #11998e, #26C784);
        }

        .badge-notif {
            position: relative;
        }

        .badge-notif[data-badge]:after {
            content: attr(data-badge);
            position: absolute;
            top: 3px;
            right: -2px;
            font-size: .7em;
            background: #e53935;
            color: white;
            width: 18px;
            height: 18px;
            text-align: center;
            line-height: 18px;
            border-radius: 50%;
        }
    </style>
    <style>
        /* card active */
        .buying-selling.active {
            background-image: linear-gradient(to right, #00B7B5 0%, #00B7B5 19%, #019392 60%, #04817F 100%);
        }

        .option1 {
            display: none;
        }

        .buying-selling {
            width: 123px;
            padding: 10px;
            position: relative;
        }

        .buying-selling-word {
            font-size: 10px;
            font-weight: 600;
            margin-left: 35px;
        }

        .radio-dot:before,
        .radio-dot:after {
            content: "";
            display: block;
            position: absolute;
            background: #fff;
            border-radius: 100%;
        }

        .radio-dot:before {
            width: 20px;
            height: 20px;
            border: 1px solid #ccc;
            top: 10px;
            left: 16px;
        }

        .radio-dot:after {
            width: 12px;
            height: 12px;
            border-radius: 100%;
            top: 14px;
            left: 20px;
        }

        .buying-selling.active .buying-selling-word {
            color: #fff;
        }

        .buying-selling.active .radio-dot:after {
            background-image: linear-gradient(to right, #00B7B5 0%, #00B7B5 19%, #019392 60%, #04817F 100%);
        }

        .buying-selling.active .radio-dot:before {
            background: #fff;
            border-color: #699D17;
        }

        .buying-selling:hover .radio-dot:before {
            border-color: #adadad;
        }

        .buying-selling.active:hover .radio-dot:before {
            border-color: #699D17;
        }


        /* .buying-selling.active .radio-dot:after {
            background-image: linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%);
        } */

        /* dot */
        .buying-selling:hover .radio-dot:after {
            background-image: linear-gradient(to right, #00B7B5 0%, #00B7B5 19%, #019392 60%, #04817F 100%);
        }

        /* .buying-selling.active:hover .radio-dot:after {
            background-image: linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%);

        } */

        @media (max-width: 400px) {

            .mobile-br {
                display: none;
            }

            .buying-selling {
                width: 49%;
                padding: 10px;
                position: relative;
            }

        }
    </style>
    <div class="content-wrapper" style="min-height: 511px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-12">
                        <center>
                            <h4 style="color: rgb(120, 120, 120); font-weight: bold; --darkreader-inline-color:#837e75;"
                                data-darkreader-inline-color="">Orderan</h4>
                        </center>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <input type="hidden" id="id_distribusi" value="{{ $id }}">
        <input type="hidden" id="jml_order" value="0">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div id="distribusi2">

                                </div>
                            </div>
                            <div class="card-body">
                                <div id="tugas_head">

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <form id="tambah_pesanan_new">
        @csrf
        <div class="modal fade" id="tbh_menu" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="orderan">

                        </div>

                        <div id="tambah_menu_order"></div>

                        <div align="right" class="mt-2">
                            <button type="button" id="tambah_form_menu" class="btn btn-sm btn-success">+</button>
                        </div>
                        <div class="buying-selling-group" id="buying-selling-group" data-toggle="buttons">


                        </div>


                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary ">Edit / Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('edit_pembayaran') }}" method="post">
        @csrf
        <div class="modal fade" id="edit_pembayaran" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="form_edit_pembayaran">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn_e_pembayaran">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="tambah_pesanan_new_majo">
        @csrf
        <div class="modal fade" id="tbh_menu_majo" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                    <div class="modal-header " style="background-color: #CDE4D2; color: #745349">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan stk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="orderan_majo">

                        </div>

                        <br>
                        <br>

                        {{-- <div id="tambah_menu_order_majo"></div>

                    <div align="right" class="mt-2">
                        <button type="button" id="tambah_form_menu_majo" class="btn btn-sm btn-success">+</button>
                    </div> --}}

                        <div class="buying-selling-group_majo" id="buying-selling-group" data-toggle="buttons">


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn  btn_save_majo"
                            style="background-color: #B6C7B9; color:#745349">Edit /
                            Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.pembayaran', function() {
                var total_tagihan = parseInt($('#total_tagihan').val());

                var total_pembayaran = 0;
                $(".pembayaran").each(function() {
                    total_pembayaran += parseFloat($(this).val());
                });
                var total_bayar = total_pembayaran;


                // console.log(total_bayar);

                if (total_tagihan <= total_bayar) {
                    $('#btn_e_pembayaran').removeAttr('disabled');
                } else {
                    $('#btn_e_pembayaran').attr('disabled', 'true');
                }
            });
            
            $(document).on('click', '.btn_tbh', function(event) {
                $.ajax({
                    url: "{{ route('get_karyawan') }}",
                    method: "GET",

                    success: function(data) {

                        $('.buying-selling-group').html(data);

                    }
                });
            });

            $(document).on('submit', '#e_pembayaran', function(event) {
                event.preventDefault();
                var no_order = $("#no_order").val();
                var total_tagihan = parseInt($('#total_tagihan').val());
                var cash = parseInt($('#cash').val());
                var d_bca = parseInt($('#d_bca').val());
                var k_bca = parseInt($('#k_bca').val());
                var d_mandiri = parseInt($('#d_mandiri').val());
                var k_mandiri = parseInt($('#k_mandiri').val());

                var total_bayar = cash + d_bca + k_bca + d_mandiri + k_mandiri;
                $('#btn_e_pembayaran').hide();
                $.ajax({
                    url: `{{ route('edit_pembayaran') }}?no_order=${no_order}&cash=${cash}&d_bca=${d_bca}&k_bca=${k_bca}&d_mandiri=${d_mandiri}&k_mandiri=${k_mandiri}&total_bayar=${total_bayar}`,
                    type: 'GET',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#edit_pembayaran').hide();
                        setTimeout(function() {
                            $("[data-dismiss=modal]").trigger({
                                type: "click"
                            });
                        }, 50);
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Pembayaran berhasil diedit'
                        });

                        $('#btn_e_pembayaran').show();


                    }
                });

            });

            $(document).on('keyup', '.input_edit_pembayaran', function() {
                var total_tagihan = parseInt($('#total_tagihan').val());


                var cash = isNaN(parseInt($('#cash').val())) ? 0 : parseInt($('#cash').val());
                var d_bca = isNaN(parseInt($('#d_bca').val())) ? 0 : parseInt($('#d_bca').val());
                var k_bca = isNaN(parseInt($('#k_bca').val())) ? 0 : parseInt($('#k_bca').val());
                var d_mandiri = isNaN(parseInt($('#d_mandiri').val())) ? 0 : parseInt($('#d_mandiri')
                    .val());
                var k_mandiri = isNaN(parseInt($('#k_mandiri').val())) ? 0 : parseInt($('#k_mandiri')
                    .val());

                var total_bayar = cash + d_bca + k_bca + d_mandiri + k_mandiri;

                // console.log(total_bayar);

                if (total_tagihan <= total_bayar) {
                    $('#btn_e_pembayaran').removeAttr('disabled');
                } else {
                    $('#btn_e_pembayaran').attr('disabled', 'true');
                }
            });

            $(document).on('click', '.btn_edit_pembayaran', function() {

                var no_order = $(this).attr('no_order');



                $.ajax({
                    url: "{{ route('get_pembayaran') }}?no_order=" + no_order,
                    method: "GET",
                    success: function(data) {
                        $('#form_edit_pembayaran').html(data);

                        var total_tagihan = parseInt($('#total_tagihan').val());
                        var cash = parseInt($('#cash').val());
                        var d_bca = parseInt($('#d_bca').val());
                        var k_bca = parseInt($('#k_bca').val());
                        var d_mandiri = parseInt($('#d_mandiri').val());
                        var k_mandiri = parseInt($('#k_mandiri').val());

                        var total_bayar = cash + d_bca + k_bca + d_mandiri + k_mandiri;

                        if (total_tagihan <= total_bayar) {
                            $('#btn_e_pembayaran').removeAttr('disabled');
                        } else {
                            $('#btn_e_pembayaran').attr('disabled', 'true');
                        }

                    }
                });

            });

            $(document).on('click', '.btn_pembayaran', function() {

                var no = $(this).attr('no_order');

                $.ajax({
                    url: "{{ route('check_pembayaran') }}",
                    method: "GET",
                    data: {
                        no: no,

                    },
                    success: function(data) {
                        if (data == 'ada') {
                            window.location.href =
                                "{{ route('list_orderan') }}?no=" + no
                        } else {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'error',
                                title: 'selesaikan pesanan terlebih dahulu dengan menekan tombol <i class="text-info fas fa-thumbs-up"></i>'
                            });
                        }

                    }
                });

            });

            load_distribusi2();

            function load_distribusi2() {
                var id_distribusi = $("#id_distribusi").val();
                var jml_baru = $("#jumlah1").val();
                var jml_order = $("#jml_order").val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('distribusi2') }}?id=" + id_distribusi,
                    dataType: "html",
                    success: function(hasil) {
                        $('#distribusi2').html(hasil);
                        if (jml_baru != jml_order) {
                            // console.log(`${jml_baru} : ${jml_order}`);
                            load_tugas();
                            $("#jml_order").val(jml_baru);
                        }
                    }
                });

            }
            setInterval(function() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    data: {},
                });
                load_distribusi2();
                load_tugas();
            }, 10000);

            load_tugas();

            function load_tugas() {
                var id_distribusi = $("#id_distribusi").val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('waitress') }}?dis=" + id_distribusi,
                    dataType: "html",
                    success: function(hasil) {
                        $('#tugas_head').html(hasil);
                    }
                });
            }
            $(document).on('click', '.waitress', function(event) {
                var kode = $(this).attr('kode');
                var kry = $(this).attr('kry');
                var id = $(this).attr('id_distribusi')

                // alert('behasil');
                $.ajax({
                    type: "POST",
                    url: "{{ route('pilih_waitress') }}",
                    data: {
                        kode: kode,
                        kry: kry,
                        id: id,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Waitress sudah dipilih'
                        });
                        load_tugas();
                    }
                });
            });
            $(document).on('click', '.un_waitress', function(event) {
                var kode = $(this).attr('kode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('un_waitress') }}",
                    data: {
                        kode: kode,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Waitress dibatalkan'
                        });
                        load_tugas();
                    }
                });
            });
            $(document).on('click', '.selesai', function(event) {
                var kode = $(this).attr('kode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('meja_selesai') }}",
                    data: {
                        kode: kode,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Makanan telah selesai'
                        });
                        load_tugas();
                    }
                });
            });
            $(document).on('click', '.gagal', function(event) {

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    icon: 'error',
                    title: 'Waitress belum dipilih'
                });
                load_tugas();
            });

            $(document).on('click', '.btn_pembayaran', function() {

                var no = $(this).attr('no_order');

                $.ajax({
                    url: "<?= route('check_pembayaran') ?>",
                    method: "GET",
                    data: {
                        no: no
                    },
                    success: function(data) {
                        if (data == 'ada') {
                            window.location.href = "<?= route('list_orderan') ?>?no=" + no
                        } else {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'error',
                                title: 'selesaikan pesanan terlebih dahulu dengan menekan tombol <i class="text-info fas fa-thumbs-up"></i>'
                            });
                        }

                    }
                });

            });

            $(document).on('click', '.clear', function(event) {
                var kode = $(this).attr('kode');

                Swal.fire({
                    title: 'Apakah anda yakin ?',
                    text: "Meja yang sudah di clear Up tidak bisa di munculkan kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1596AA',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Clear Up'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: "<?= route('clear') ?>?kode=" + kode,
                            success: function(response) {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    icon: 'success',
                                    title: 'Meja telah di clearup'
                                });
                                load_tugas();
                            }
                        });
                        $('.scrol' + detail).hide();
                    } else {
                        return false;
                    }
                })



            });

            $(document).on('click', '.btn_tbh', function() {
                var no_order = $(this).attr('no_order');
                var id_distribusi = $("#id_distribusi").val();
                // console.log(no_order);
                $.ajax({
                    url: "{{ route('tambah_pesanan') }}?no=" + no_order + "&id=" + id_distribusi,
                    dataType: "html",
                    success: function(hasil) {
                        $('#orderan').html(hasil);
                        $('.row_tambah_menu').remove();
                        $('.select2bs4').select2({
                            theme: 'bootstrap4'
                        });
                    }
                });

            });
            // Form Tambah
            var count_tambah = 1;
            $('#tambah_form_menu').click(function() {
                count_tambah = count_tambah + 1;
                // var no_nota_atk = $("#no_nota_atk").val();
                var html_code = "<div class='row mt-2 row_tambah_menu' id='row_tambah" + count_tambah +
                    "'>";

                html_code +=
                    '<div class="col-lg-4"><select name="id_harga[]" class="select form-control id_harga id_harga1' +
                    count_tambah + ' " detail="' + count_tambah +
                    '" required><option value="">-Pilih Menu-</option><?php foreach ($menu as $m) : ?><option value="<?= $m->id_harga ?>"><?= $m->nm_menu ?></option><?php endforeach ?></select></div>';

                html_code +=
                    '<div class="col-lg-2"><input type="number" name="qty[]"  value="1" min="1" class="form-control" required></div>';

                html_code +=
                    '<div class="col-lg-2"><input type="text" name="harga[]" class="form-control harga harga' +
                    count_tambah + '" detail="' + count_tambah + '" readonly></div>';

                html_code +=
                    '<div class="col-lg-3"><input type="text" name="req[]"  class="form-control"></div>';

                html_code +=
                    ' <div class="col-md-1"><button type="button" name="remove" data-row="row_tambah' +
                    count_tambah + '" class="btn btn-danger btn-sm remove_tambah_menu">-</button></div>';


                html_code += "</div>";

                $('#tambah_menu_order').append(html_code);
                $('.select').select2()
                $('.select2bs4').one('select2:open', function(e) {
                    $('input.select2-search__field').prop('placeholder', 'Search...');
                });
            });

            $(document).on('click', '.remove_tambah_menu', function() {
                var delete_row = $(this).data("row");
                $('#' + delete_row).remove();
            });

            var isSubmit = false
            $(document).on('submit', '#tambah_pesanan_new', function(event) {
                event.preventDefault();
                $('#btn_tambah_pesanan').hide();
                var kd_order = $('#kd_order').val()
                var id_dis = $('#id_dis').val()
                var orang = $('#orang').val()
                var meja = $('#meja').val()


                var id_harga = $("#id_harga").val()

                var pesanan_new = $("#tambah_pesanan_new").serialize()
                if (!isSubmit) {
                    isSubmit = true
                    $.ajax({
                        url: "{{ route('save_pesanan_new') }}?" + pesanan_new,
                        method: 'GET',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#tbh_menu').hide();
                            setTimeout(function() {
                                $("[data-dismiss=modal]").trigger({
                                    type: "click"
                                });
                            }, 50);
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'success',
                                title: 'Pesanan berhasil ditambahkan'
                            });
                            load_tugas();

                            $('#tambah_pesanan').trigger("reset");
                            $('.id_harga').val('');
                            $('.id_harga').trigger('change');
                            $('.row_tambah_menu').remove();




                        }

                    });
                    setTimeout(() => {
                        isSubmit = false
                    }, 15000);
                }
                $('#btn_tambah_pesanan').show();

            });

            $(document).on('click', '.selesai_majo', function(event) {
                var kode = $(this).attr('kode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('meja_selesai_majo') }}",
                    data: {
                        kode: kode,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Makanan telah selesai'
                        });
                        load_tugas();
                    }
                });
            });
            $(document).on('click', '.waitress_majo', function(event) {
                var kode = $(this).attr('kode');
                var kry = $(this).attr('kry');


                $.ajax({
                    type: "POST",
                    url: "{{ route('pilih_waitress_majo') }}",
                    data: {
                        kode: kode,
                        kry: kry,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Waitress sudah dipilih'
                        });
                        load_tugas();
                    }
                });
            });

            $(document).on('click', '.un_waitress_majo', function(event) {
                var kode = $(this).attr('kode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('un_waitress_majo') }}",
                    data: {
                        kode: kode,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Waitress dibatalkan'
                        });
                        load_tugas();
                    }
                });
            });


            $(document).on('click', '.btn_tbh_majo', function() {
                var no_order = $(this).attr('no_order');
                var id_distribusi = $("#id_distribusi").val();
                // console.log(no_order);
                $.ajax({
                    url: "{{ route('tambah_pesanan_majo') }}?no=" + no_order + "&id=" +
                        id_distribusi,
                    dataType: "html",
                    success: function(hasil) {
                        $('#orderan_majo').html(hasil);
                        $('.row_tambah_menu').remove();
                        $('.select2bs4').select2({
                            theme: 'bootstrap4'
                        });
                    }
                });
                $.ajax({
                    url: "{{ route('get_karyawan_majo') }}",
                    method: "GET",
                    success: function(data) {
                        $('.buying-selling-group_majo').html(data);

                    }

                });



            });

            var isSubmitting = false
            $(document).on('submit', '#tambah_pesanan_new_majo', function(event) {
                event.preventDefault();
                $('.btn_save_majo').hide();

                var kd_order = $('.kd_order_majo').val()
                var id_dis = $('.id_dis_majo').val()
                var meja = $('.meja_majo').val()
                var qty_majo = $('.qty_majo').val()
                var hrg_majo = $('.hrg_majo').val()

                var nota = [];
                $('input[name="kd_karyawan"]:checked').each(function() {
                    nota.push($(this).attr("value"))
                });

                var id_harga_majo = $(".id_harga_majo").val()
                if (!isSubmitting) {
                    isSubmitting = true
                    $.ajax({
                        url: "{{ route('save_pesanan_majo') }}",
                        method: "GET",
                        data: {
                            nota: nota,
                            kd_order: kd_order,
                            id_dis: id_dis,
                            id_harga_majo: id_harga_majo,
                            meja: meja,
                            qty_majo: qty_majo,
                            hrg_majo: hrg_majo,
                        },
                        success: function(data) {
                            // console.log(data);
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'success',
                                title: 'Pesanan berhasil ditambahkan'
                            });
                            load_tugas();
                            $('#tbh_menu_majo').modal('toggle');
                        }
                    });
                    setTimeout(() => {

                        isSubmitting = false
                    }, 15000);
                }
                $('.btn_save_majo').show();
            });

            $(document).on('click', '.muncul', function(event) {
                var id_meja = $(this).attr('id_meja');
                var no_order = $(this).attr('no_order');
                $.ajax({
                    type: "get",
                    url: "{{ route('load_waitress_selesai') }}",
                    data: {
                        id_meja: id_meja,
                        no_order: no_order
                    },
                    success: function(r) {
                        $('.load_menu_s' + id_meja).html(r);
                        $('.muncul' + id_meja).hide();
                        $('.hilang' + id_meja).show();
                    }
                });


            });
            $(document).on('click', '.hilang', function(event) {
                var id_meja = $(this).attr('id_meja');

                // Sembunyikan data
                $('.load_menu_s' + id_meja).html('');


                // Ubah visibilitas tombol
                $('.hilang' + id_meja).hide();
                $('.muncul' + id_meja).show();
            });






        });
    </script>
@endsection
