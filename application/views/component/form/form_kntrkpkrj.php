<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker.css"/>


<div class="content shadow p-4 my-4">
    <form class="needs-validation" method="POST" action="<?=$action?>" novalidate>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-pekerjaan-tab" data-toggle="pill" data-target="#pills-pekerjaan" type="button" role="tab" aria-controls="pills-pekerjaan" aria-selected="true">
                    Pekerjaan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link"
                    id="pills-kontrak-tab"
                    data-toggle="pill"
                    data-target="#pills-kontrak"
                    type="button"
                    role="tab"
                    aria-controls="pills-kontrak"
                    aria-selected="false"
                    >
                    Kontrak
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link"
                    id="pills-penyedia-tab"
                    data-toggle="pill"
                    data-target="#pills-penyedia"
                    type="button"
                    role="tab"
                    aria-controls="pills-penyedia"
                    aria-selected="false"
                    >
                    Penyedia
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- tab form Pekerjaan -->
            <div
                class="tab-pane fade show active"
                id="pills-pekerjaan"
                role="tabpanel"
                aria-labelledby="pills-pekerjaan-tab"
                >
                <div class="form-group">
                    <label>Satuan Kerja</label>
                    <select class="custom-select" name="id_satker" required>
                        <option selected disabled value="">Silahkan Pilih</option>
                        <?php
                        if(count($sel['satker'])!=0){
                            foreach($sel['satker'] as $stk){ ?>
                        <option <?= $paket->id_satker == $stk->id_satker ? 'selected' : ''?> value="<?=$stk->id_satker?>"><?=$stk->stk_nama?></option>   
                        <?php    }
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">Pilih salah satu.</div>
                </div>
                <div class="form-group">
                    <label>Nama Paket Pekerjaan</label>
                    <input
                        type="text"
                        name="pkt_nama"
                        class="form-control"
                        required
                        value="<?=$paket->pkt_nama?>"
                        />
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Kode RUP</label>
                        <input
                            type="text"
                            name="rup_id"
                            class="form-control"
                            required
                            value="<?=$paket->rup_id?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Kode Tender</label>
                        <input
                            type="text"
                            name="lls_id"
                            class="form-control"
                            required
                            value="<?=$paket->lls_id?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Sumber Dana</label>
                        <input
                            type="text"
                            name="sbd_id"
                            class="form-control"
                            required
                            value="<?=$paket->sbd_id?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tahun Anggaran</label>
                        <input
                            type="text"
                            name="ang_tahun"
                            class="form-control"
                            required
                            value="<?=$paket->ang_tahun?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Metode Pemilihan</label>
                    <select
                        class="custom-select"
                        name="metode_pengadaan"
                        required
                        >
                        <option selected disabled value="">Silahkan Pilih</option>
                        <?php
                        foreach(metode() as $key=>$val){ ?>
                        <option <?= $paket->metode_pengadaan == $key ? 'selected' : '' ?> value="<?=$key?>"><?=$val?></option>
                        <?php }
                        ?>
                    </select>
                    <div class="invalid-feedback">Pilih salah satu.</div>
                </div>
                <div class="form-group">
                    <label>Pagu Anggaran</label>
                    <input
                        type="text"
                        name="pkt_pagu"
                        class="form-control"
                        required
                        value="<?=$paket->pkt_pagu?>"
                        />
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Rencana Pengadaan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#perencanaan').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="perencanaan"
                                name="tanggal_awal_pengadaan"
                                class="form-control"
                                required
                                value="<?= strlen($paket->tanggal_awal_pengadaan) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $paket->tanggal_awal_pengadaan) ?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Realisasi Pengadaan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#pengadaan').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="pengadaan"
                                name="jadwal_awal_pengumuman"
                                class="form-control"
                                required
                                value="<?= strlen($paket->jadwal_awal_pengumuman) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $paket->jadwal_awal_pengumuman)?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Lokasi Pekerjaan</label>
                    <input
                        type="text"
                        name="pkt_lokasi"
                        class="form-control"
                        required
                        value="<?=$paket->pkt_lokasi?>"
                        />
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Latitude</label>
                        <input
                            type="text"
                            name="latitude"
                            class="form-control"
                            required
                            value="<?=$paket->latitude?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Longitude</label>
                        <input
                            type="text"
                            name="longitude"
                            class="form-control"
                            required
                            value="<?=$paket->longitude?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat Lokasi</label>
                    <textarea
                        class="form-control"
                        name="alamat_lokasi"
                        rows="5"
                        required
                        value="<?=$paket->alamat_lokasi?>"
                        ></textarea>
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
            </div>

            <!-- tab form Kontrak -->
            <div
                class="tab-pane fade"
                id="pills-kontrak"
                role="tabpanel"
                aria-labelledby="pills-kontrak-tab"
                >
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Nomor Kontrak</label>
                        <input
                            type="text"
                            name="kontrak_no"
                            class="form-control"
                            required
                            value="<?=$kontrak->kontrak_no?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Kontrak</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#kontrak').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="kontrak"
                                name="kontrak_tanggal"
                                class="form-control"
                                required
                                value="<?= strlen($kontrak->kontrak_tanggal) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $kontrak->kontrak_tanggal)?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kode Rekening Kegiatan</label>
                    <input
                        type="text"
                        name="kode_akun_kegiatan"
                        class="form-control"
                        required
                        value="<?=$kontrak->kode_akun_kegiatan?>"
                        />
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
                <div class="form-row">
                    <div class="col-md-8 mb-3">
                    <label>Nilai Kontrak</label>
                    <input
                        type="text"
                        name="kontrak_nilai"
                        class="form-control"
                        required
                        value="<?=$kontrak->kontrak_nilai?>"
                        />
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Jenis Pembayaran</label>
                    <select
                        class="custom-select"
                        name="btk_pembayaran"
                        required
                        >
                        <option selected disabled value="">Silahkan Pilih</option>
                        <?php
                        foreach(pembayaran() as $key=>$val){ ?>
                        <option <?= $kontrak->btk_pembayaran == $key ? 'selected' : '' ?> value="<?=$key?>"><?=$val?></option>
                        <?php }
                        ?>
                    </select>
                    <div class="invalid-feedback">Pilih salah satu.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Tanggal Awal Pekerjaan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#pekerjaanAwal').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="pekerjaanAwal"
                                name="kontrak_mulai"
                                class="form-control"
                                required
                                value="<?= strlen($kontrak->kontrak_mulai) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $kontrak->kontrak_mulai)?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Tanggal Akhir Pekerjaan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#pekerjaanAkhir').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="pekerjaanAkhir"
                                name="kontrak_akhir"
                                class="form-control"
                                required
                                value="<?= strlen($kontrak->kontrak_akhir) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $kontrak->kontrak_akhir)?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Lama Pekerjaan</label>
                        <input
                            type="number"
                            name="lama_durasi_penyerahan1"
                            class="form-control"
                            required
                            value="<?=$kontrak->lama_durasi_penyerahan1?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label>Lama Pemeliharaan</label>
                        <input
                            type="number"
                            name="lama_durasi_pemeliharaan"
                            class="form-control"
                            required
                            value="<?=$kontrak->lama_durasi_pemeliharaan?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Jabatan Wakil Penyedia</label>
                        <input
                            type="text"
                            name="kontrak_jabatan_wakil"
                            class="form-control"
                            required
                            value="<?=$kontrak->kontrak_jabatan_wakil?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nama Wakil Penyedia</label>
                        <input
                            type="text"
                            name="kontrak_wakil_penyedia"
                            class="form-control"
                            required
                            value="<?=$kontrak->kontrak_wakil_penyedia?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Nomor Rekening Penyedia</label>
                        <input
                            type="text"
                            name="kontrak_norekening"
                            class="form-control"
                            required
                            value="<?=$kontrak->kontrak_norekening?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nama Bank</label>
                        <input
                            type="text"
                            name="kontrak_namarekening"
                            class="form-control"
                            required
                            value="<?=$kontrak->kontrak_namarekening?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
            </div>

            <!-- tab form penyedia -->
            <div
                class="tab-pane fade"
                id="pills-penyedia"
                role="tabpanel"
                aria-labelledby="pills-penyedia-tab"
                >
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Penyedia</label>
                        <input
                            type="text"
                            name="rkn_nama"
                            class="form-control"
                            required
                            value="<?=$rekanan->rkn_nama?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>NPWP Penyedia</label>
                        <input
                            type="text"
                            name="rkn_npwp"
                            class="form-control"
                            required
                            value="<?=$rekanan->rkn_npwp?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Nomor Akta</label>
                        <input
                            type="text"
                            name="lhk_no"
                            class="form-control"
                            required
                            value="<?=$rekanan->lhk_no?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Nama Notaris</label>
                        <input
                            type="text"
                            name="lhk_notaris"
                            class="form-control"
                            required
                            value="<?=$rekanan->lhk_notaris?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Tanggal Akta</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#akta').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="akta"
                                name="lhk_tanggal"
                                class="form-control"
                                required
                                value="<?= strlen($rekanan->lhk_tanggal) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $rekanan->lhk_tanggal)?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat Penyedia</label>
                    <textarea
                        class="form-control"
                        name="rkn_alamat"
                        rows="5"
                        required
                        ><?=$rekanan->rkn_alamat?></textarea>
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" name="submit" type="submit">
                        <?=$button?>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>script/validateForm.js"></script>
<script src="<?= base_url('assets/') ?>script/datePicker.js"></script>