<div id="info_covid19">

    {{-- Card Header--}}
    <div class="card mt-0">
        <div class="card-header bg-warning bg-darken-4 text-white p-1 m-0">
            <h4 class="card-title text-white">Info Covid 19 Babel</h4>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50">

            <ul class="nav nav-tabs nav-justified" id="covid19Tab" role="tablist">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="covid19-summary-tab"
                        data-toggle="tab"
                        href="#covid19-summary"
                        role="tab"
                        aria-controls="covid19-summary"
                        aria-selected="true"
                    >Update {{ $data_covid19->tgl_data->format('d M Y') }}</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        id="covid19-detail-tab"
                        data-toggle="tab"
                        href="#covid19-detail"
                        role="tab"
                        aria-controls="covid19-detail"
                        aria-selected="true"
                    >Sebaran Covid 19 di Babel</a
                    >
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content pt-1">
                <div class="tab-pane active" id="covid19-summary" role="tabpanel" aria-labelledby="covid19-summary-tab">

                    <div class="card-body text-center p-0">
                        <div class="row">
                            <?php
                            $total_t = $data_covid19->pkp_t + $data_covid19->bka_t + $data_covid19->blt_t + $data_covid19->bkb_t + $data_covid19->bkt_t + $data_covid19->bks_t + $data_covid19->btm_t;
                            $total_s = $data_covid19->pkp_s + $data_covid19->bka_s + $data_covid19->blt_s + $data_covid19->bkb_s + $data_covid19->bkt_s + $data_covid19->bks_s + $data_covid19->btm_s;
                            $total_m = $data_covid19->pkp_m + $data_covid19->bka_m + $data_covid19->blt_m + $data_covid19->bkb_m + $data_covid19->bkt_m + $data_covid19->bks_m + $data_covid19->btm_m;
                            $total_a = $data_covid19->pkp_a + $data_covid19->bka_a + $data_covid19->blt_a + $data_covid19->bkb_a + $data_covid19->bkt_a + $data_covid19->bks_a + $data_covid19->btm_a;

                            $total_td = $data_covid19->pkp_td + $data_covid19->bka_td + $data_covid19->blt_td + $data_covid19->bkb_td + $data_covid19->bkt_td + $data_covid19->bks_td + $data_covid19->btm_td;
                            $total_sd = $data_covid19->pkp_sd + $data_covid19->bka_sd + $data_covid19->blt_sd + $data_covid19->bkb_sd + $data_covid19->bkt_sd + $data_covid19->bks_sd + $data_covid19->btm_sd;
                            $total_md = $data_covid19->pkp_md + $data_covid19->bka_md + $data_covid19->blt_md + $data_covid19->bkb_md + $data_covid19->bkt_md + $data_covid19->bks_md + $data_covid19->btm_md;
                            $total_ad = $data_covid19->pkp_ad + $data_covid19->bka_ad + $data_covid19->blt_ad + $data_covid19->bkb_ad + $data_covid19->bkt_ad + $data_covid19->bks_ad + $data_covid19->btm_ad;

                            ?>
                            <div class="col-6">
                                <button type="button" class="btn btn-danger waves-effect waves-float waves-light">Terkornfirmasi</button>
                                <h2 class="card-text m-50">{{ number_format($total_t) }} {!! $total_td > 0 ? Helper::upDownNeg($total_td) : '' !!}</h2>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-success waves-effect waves-float waves-light">Selesai Isolasi</button>
                                <h2 class="card-text m-50">{{ number_format($total_s) }} {!! $total_sd > 0 ? Helper::upDownPos($total_sd) : '' !!}</h2>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-warning waves-effect waves-float waves-light">Data Kasus Aktif</button>
                                <h2 class="card-text m-50">{{ number_format($total_a) }} {!! $total_ad > 0 ? Helper::upDownNeg($total_ad) : '' !!}</h2>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary waves-effect waves-float waves-light">Meninggal</button>
                                <h2 class="card-text m-50">{{ number_format($total_m) }} {!! $total_md > 0 ? Helper::upDownNeg($total_md) : '' !!}</h2>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="covid19-detail" role="tabpanel" aria-labelledby="covid19-detail-tab">

                    <div class="table-responsive">
                        <table class="table b-table table-striped table-bordered table-sm table-none">
                            <thead>
                            <th>KAB/KOTA</th>
                            <th class="text-danger">Terkonfirmasi</th>
                            <th class="text-success">Sembuh</th>
                            <th class="text-secondary">Meninggal</th>
                            <th class="text-warning">Aktif</th>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Pangkalpinang</td>
                                <td class="text-center">{!! number_format($data_covid19->pkp_t).' '.Helper::upDownNeg($data_covid19->pkp_td) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->pkp_s).' '.Helper::upDownPos($data_covid19->pkp_sd) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->pkp_m).' '.Helper::upDownNeg($data_covid19->pkp_md) !!}</td>
                                <td class="text-center">{{ number_format($data_covid19->pkp_a) }}</td>
                            </tr>

                            <tr>
                                <td>Bangka</td>
                                <td class="text-center">{!! number_format($data_covid19->bka_t).' '.Helper::upDownNeg($data_covid19->bka_td) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bka_s).' '.Helper::upDownPos($data_covid19->bka_sd) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bka_m).' '.Helper::upDownNeg($data_covid19->bka_md) !!}</td>
                                <td class="text-center">{{ number_format($data_covid19->bka_a) }}</td>
                            </tr>

                            <tr>
                                <td>Belitung</td>
                                <td class="text-center">{!! number_format($data_covid19->blt_t).' '.Helper::upDownNeg($data_covid19->blt_td) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->blt_s).' '.Helper::upDownPos($data_covid19->blt_sd) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->blt_m).' '.Helper::upDownNeg($data_covid19->blt_md) !!}</td>
                                <td class="text-center">{{ number_format($data_covid19->blt_a) }}</td>
                            </tr>

                            <tr>
                                <td>Bangka Barat</td>
                                <td class="text-center">{!! number_format($data_covid19->bkb_t).' '.Helper::upDownNeg($data_covid19->bkb_td) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bkb_s).' '.Helper::upDownPos($data_covid19->bkb_sd) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bkb_m).' '.Helper::upDownNeg($data_covid19->bkb_md) !!}</td>
                                <td class="text-center">{{ number_format($data_covid19->bkb_a) }}</td>
                            </tr>

                            <tr>
                                <td>Bangka Tengah</td>
                                <td class="text-center">{!! number_format($data_covid19->bkt_t).' '.Helper::upDownNeg($data_covid19->bkt_td) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bkt_s).' '.Helper::upDownPos($data_covid19->bkt_sd) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bkt_m).' '.Helper::upDownNeg($data_covid19->bkt_md) !!}</td>
                                <td class="text-center">{{ number_format($data_covid19->bkt_a) }}</td>
                            </tr>

                            <tr>
                                <td>Bangka Selatan</td>
                                <td class="text-center">{!! number_format($data_covid19->bks_t).' '.Helper::upDownNeg($data_covid19->bks_td) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bks_s).' '.Helper::upDownPos($data_covid19->bks_sd) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->bks_m).' '.Helper::upDownNeg($data_covid19->bks_md) !!}</td>
                                <td class="text-center">{{ number_format($data_covid19->bks_a) }}</td>
                            </tr>

                            <tr>
                                <td>Belitung Timur</td>
                                <td class="text-center">{!! number_format($data_covid19->btm_t).' '.Helper::upDownNeg($data_covid19->btm_td) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->btm_s).' '.Helper::upDownPos($data_covid19->btm_sd) !!}</td>
                                <td class="text-center">{!! number_format($data_covid19->btm_m).' '.Helper::upDownNeg($data_covid19->btm_md) !!}</td>
                                <td class="text-center">{{ number_format($data_covid19->btm_a) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>

        <div class="card-footer py-1">
            <h6><small class="text-muted">Sumber data :</small> <a href="https://www.facebook.com/dinkesbabel" target="_blank">Dinas Kesehatan Provinsi Kepulauan Bangka Belitung</a></h6>
        </div>

    </div>

</div>
