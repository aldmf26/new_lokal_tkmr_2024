<style>
    .table tr:not(.header) {
        display: none;
    }

</style>

<table class="table" width="100%">
    <thead>
        <tr class="header">
            <th class="sticky-top th-atas">Meja</th>
            <th class="sticky-top th-atas">Menu</th>
            <th class="sticky-top th-atas">Request</th>
            <th class="sticky-top th-atas">Qty</th>
            <th class="sticky-top th-atas">Status</th>
            <?php foreach ($tb_koki as $k) : ?>
            <th class="sticky-top th-atas"><?= $k->nama ?></th>
            <?php endforeach ?>
            <th class="sticky-top th-atas">Time In / Durasi</th>
        </tr>
    </thead>
    <tbody style="font-size: 18px;" id="tugas_head">
        <?php foreach ($meja as $m) : ?>
        <tr class="header">
            <td class="bg-info"><?= $m->nm_meja ?></td>
            <td class="bg-info" style="vertical-align: middle;">
                <a class="muncul muncul{{$m->id_meja}}  sembunyi{{$m->id_meja}} btn btn-primary btn-sm" id_meja="{{$m->id_meja}}">View</a>
            </td>
            <td class="bg-info"></td>
            <td class="bg-info"></td>
            <td class="bg-info"></td>
            <?php foreach ($tb_koki as $k) : ?>
            <td class="bg-info" style="vertical-align: middle;"><?= $k->nama ?></td>
            <?php endforeach ?>
            <td colspan="50" class="bg-info"></td>
        </tr>
        

        <?php $menu = DB::select(
            "SELECT b.nm_menu, c.nm_meja, a.*,e.ttlMenu,f.ttlMenuSemua FROM tb_order AS a LEFT JOIN view_menu AS b ON b.id_harga = a.id_harga
                    LEFT JOIN (SELECT d.id_harga, COUNT(id_harga) as ttlMenu FROM `tb_order` as d where d.id_lokasi = '$lokasi' and d.id_meja = '$m->id_meja' and d.selesai = 'dimasak' and aktif = '1' and void = 0 GROUP BY d.id_harga) as e on b.id_harga = e.id_harga
                    LEFT JOIN (SELECT d.id_harga, COUNT(id_harga) as ttlMenuSemua FROM `tb_order` as d where d.id_lokasi = '$lokasi' and d.selesai = 'dimasak' and aktif = '1' and void = 0 GROUP BY d.id_harga) as f on b.id_harga = f.id_harga
                    LEFT JOIN tb_meja AS c ON c.id_meja = a.id_meja where a.id_lokasi = '$lokasi' and a.id_meja = '$m->id_meja' and a.selesai = 'dimasak' and aktif = '1' and void = 0 ORDER BY a.id_order",
        ); ?>
        <?php $menu2 = DB::select(
            "SELECT b.nm_menu, c.nm_meja, a.*,e.ttlMenu,f.ttlMenuSemua FROM tb_order AS a
                    LEFT JOIN view_menu AS b ON b.id_harga = a.id_harga
                    LEFT JOIN (SELECT d.id_harga, COUNT(id_harga) as ttlMenu FROM `tb_order` as d where d.id_lokasi = '$lokasi' and d.id_meja = '$m->id_meja' and d.selesai != 'dimasak' and aktif = '1' and void = 0 GROUP BY d.id_harga) as e on b.id_harga = e.id_harga
                    LEFT JOIN (SELECT d.id_harga, COUNT(id_harga) as ttlMenuSemua FROM `tb_order` as d where d.id_lokasi = '$lokasi' and d.selesai != 'dimasak' and aktif = '1' and void = 0 GROUP BY d.id_harga) as f on b.id_harga = f.id_harga
                    LEFT JOIN tb_meja AS c ON c.id_meja = a.id_meja where a.id_lokasi = '$lokasi' and a.id_meja = '$m->id_meja' and a.selesai != 'dimasak' and aktif = '1' and void = 0 ORDER BY a.id_order",
        );
        $no = 1;
        ?>
        @php
            $setMenit = DB::table('tb_menit')->where('id_lokasi', $lokasi)->first();
        @endphp
        <?php foreach ($menu2 as $m) : if($m->nm_menu == '') {continue;} ?>
        <tr class="hide{{$m->id_meja}} meja{{$m->id_meja}}" >
            <td>selesai</td>
            <td style="text-transform: lowercase;"><?= $m->nm_menu ?> <span class="text-danger">({{$m->ttlMenuSemua}})</span></td>
            <td><?= $m->request ?></td>
            <td><?= $m->qty ?></td>
            <td><a kode="<?= $m->id_order ?>" class="btn btn-warning text-light btn-sm cancel" id_meja="{{$m->id_meja}}"><i
                        class="fas fa-times"></i></a></td>
            <?php foreach ($tb_koki as $k) : ?>
            <?php if($k->id_karyawan == $m->id_koki1 || $k->id_karyawan == $m->id_koki2 || $k->id_karyawan == $m->id_koki3): ?>
            <td><i class="text-success fas fa-check-circle"></i></td>
            <?php else: ?>
            <td></td>
            <?php endif; ?>
            <?php endforeach ?>
            @php
                $mulai = new DateTime($m->j_mulai);
                $selesai = new DateTime($m->j_selesai);
                $menit = $selesai->diff($mulai);
            @endphp
            <?php if (date('H:i', strtotime($m->j_selesai)) < date('H:i', strtotime($m->j_mulai . '+'.$setMenit->menit.'minutes'))) : ?>
            <td><b style="color:blue;"><?= date('H:i', strtotime($m->j_selesai)) ?> / {{$menit->i}} Menit / {{$menit->s}} Detik</b></td>
            <?php else : ?>
            <td><b style="color:red;"><?= date('H:i', strtotime($m->j_selesai)) ?> / {{$menit->i}} Menit / {{$menit->s}} Detik</b></td>
            <?php endif ?>
        </tr>
        <?php endforeach ?>
        <tr class="header">
            <tbody class=" addmeja{{$m->id_meja}}"></tbody>
        </tr>
        <?php foreach ($menu as $m) : if($m->nm_menu == '') {continue;} ?>
        <tr class="header meja{{$m->id_meja}}">
            <td>tidfak</td>
            <td style="white-space:nowrap;text-transform: lowercase;"><?= $m->nm_menu ?> <span class="text-danger">({{$m->ttlMenuSemua}})</span></td>
            <td><?= $m->request ?></td>
            <td><?= $m->qty ?></td>
            <?php if ($m->selesai == 'dimasak') : ?>
            <?php if ($m->id_koki1 != '0') : ?>
            <td><a kode="<?= $m->id_order ?>" class="btn btn-info btn-sm selesai" id_meja="{{$m->id_meja}}"><i class="fas fa-thumbs-up"></i></a>
            </td>
            <?php else : ?>
            <!-- <td><a kode="<?= $m->id_order ?>" class="btn btn-info btn-sm gagal"><i class="fas fa-thumbs-up"></i></a></td> -->
            <td></td>
            <?php endif ?>
            <?php foreach ($tb_koki as $k) : ?>
            <?php if ($m->id_koki1 != '0') : ?>
            <?php if ($m->id_koki1 == $k->id_karyawan) : ?>
            <td><a kode="<?= $m->id_order ?>" class="btn btn-warning btn-sm un_koki1" id_meja="{{$m->id_meja}}"><i class="fas fa-minus"></i></a>
            </td>
            <?php else : ?>
            <?php if ($m->id_koki2 != '0') : ?>
            <?php if ($m->id_koki2 == $k->id_karyawan) : ?>
            <td><a kode="<?= $m->id_order ?>" class="btn btn-sm btn-warning un_koki2" id_meja="{{$m->id_meja}}"><i
                        class="fas fa-grip-lines"></i></a></td>
            <?php else : ?>
            <?php if ($m->id_koki3 != '0') : ?>
            <td><a kode="<?= $m->id_order ?>" class="btn btn-sm btn-warning un_koki3"id_meja="{{$m->id_meja}}"><i class="fas fa-bars"></i></a>
            </td>
            <?php else : ?>
            <td><a kode="<?= $m->id_order ?>" kry="<?= $k->id_karyawan ?>" class="btn btn-sm btn-success koki3"><i
                        class="fas fa-users" id_meja="{{$m->id_meja}}"></i></a></td>
            <?php endif ?>
            <?php endif ?>

            <?php else : ?>
            <td><a kode="<?= $m->id_order ?>" kry="<?= $k->id_karyawan ?>" id_meja="{{$m->id_meja}}" class="btn btn-sm btn-success koki2"><i
                        class="fas fa-user-friends"></i></a></td>
            <?php endif ?>
            <?php endif ?>
            <?php else : ?>
            <td><a kode="<?= $m->id_order ?>" kry="<?= $k->id_karyawan ?>" id_meja="{{$m->id_meja}}" class="btn btn-sm btn-success koki1"><i
                        class="fas fa-check"></i></a></td>
            <?php endif ?>
            <?php endforeach ?>
            <td style="font-weight: bold;"><?= date('H:i', strtotime($m->j_mulai)) ?></td>
            <?php else : ?>
            <td style="text-decoration: line-through; "><a href="<?= base_url("orderan/order/$m->no_order") ?>"
                    style="color:black;">SELESAI</a></td>
            <?php foreach ($tb_koki as $k) : ?>
            <td></td>
            <?php endforeach ?>
            <?php if (date('H:i', strtotime($m->j_selesai)) < date('H:i', strtotime($m->j_mulai . '+'.$setMenit->menit.'minutes'))) : ?>
            <td><b style="color:blue;"><?= date('H:i', strtotime($m->j_selesai)) ?></b></td>
            <?php else : ?>
            <td><b style="color:red;"><?= date('H:i', strtotime($m->j_selesai)) ?></b></td>
            <?php endif ?>
            <?php endif ?>
        </tr>
        <?php endforeach ?>
        <?php endforeach ?>
    </tbody>
</table>


<script src="{{ asset('assets') }}plugins/jquery/jquery.min.js"></script>



<script>
    $(document).ready(function() {
        var ua = navigator.userAgent,
            event = (ua.match(/iPad/i)) ? "touchstart" : "click";
        if ($('.table').length > 0) {
            $('.table .header').on(event, function() {
                $(this).toggleClass("active", "").nextUntil('.header').css('display', function(i, v) {
                    return this.style.display === 'table-row' ? 'none' : 'table-row';
                });
            });
        }
    })
</script>
