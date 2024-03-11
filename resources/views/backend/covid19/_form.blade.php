<div class="row">
    <div class="col-12">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">

                <div class="form-group col-12 col-sm-4">
                    <strong>Tanggal Data Covid 19 Bangka Belitung</strong>
                    {!! Form::text('tgl_data', null, array('class' => 'form-control')) !!}
                </div>

                <table class="table b-table table-striped table-bordered table-sm table-none">
                    <thead>
                    <tr class="text-center">
                        <th rowspan="2">KAB/KOTA</th>
                        <th colspan="2" class="text-warning">Terkonfirmasi</th>
                        <th colspan="2" class="text-success">Sembuh</th>
                        <th colspan="2" class="text-danger">Meninggal</th>
                        <th class="text-primary">Aktif</th>
                    </tr>
                    <tr  class="text-center">
                        <th>Nilai</th>
                        <th>Delta</th>
                        <th>Nilai</th>
                        <th>Delta</th>
                        <th>Nilai</th>
                        <th>Delta</th>
                        <th>Nilai</th>
                    </tr>
                    </thead>

                    <?php !isset($data_prev_covid19) ? $data_prev_covid19 = $covid19 : $data_prev_covid19 ?>

                    <tbody>
                        <tr>
                            <td>Pangkalpinang</td>
                            <td>{!! Form::text('pkp_t', $data_prev_covid19->pkp_t, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('pkp_td', $data_prev_covid19->pkp_td ? $data_prev_covid19->pkp_td : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('pkp_s', $data_prev_covid19->pkp_s, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('pkp_sd', $data_prev_covid19->pkp_sd ? $data_prev_covid19->pkp_sd : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('pkp_m', $data_prev_covid19->pkp_m, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('pkp_md', $data_prev_covid19->pkp_md ? $data_prev_covid19->pkp_md : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('pkp_a', $data_prev_covid19->pkp_a, array('class' => 'form-control text-center')) !!}</td>
                        </tr>
                        <tr>
                            <td>Bangka</td>
                            <td>{!! Form::text('bka_t', $data_prev_covid19->bka_t, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bka_td', $data_prev_covid19->bka_td ? $data_prev_covid19->bka_td : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bka_s', $data_prev_covid19->bka_s, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bka_sd', $data_prev_covid19->bka_sd ? $data_prev_covid19->bka_sd : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bka_m', $data_prev_covid19->bka_m, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bka_md', $data_prev_covid19->bka_md ? $data_prev_covid19->bka_m : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bka_a', $data_prev_covid19->bka_a, array('class' => 'form-control text-center')) !!}</td>
                        </tr>
                        <tr>
                            <td>Bangka Tengah</td>
                            <td>{!! Form::text('bkt_t', $data_prev_covid19->bkt_t, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkt_td', $data_prev_covid19->bkt_td ? $data_prev_covid19->bkt_td : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkt_s', $data_prev_covid19->bkt_s, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkt_sd', $data_prev_covid19->bkt_sd ? $data_prev_covid19->bkt_sd : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkt_m', $data_prev_covid19->bkt_m, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkt_md', $data_prev_covid19->bkt_md ? $data_prev_covid19->bkt_md : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkt_a', $data_prev_covid19->bkt_a, array('class' => 'form-control text-center')) !!}</td>
                        </tr>
                        <tr>
                            <td>Bangka Barat</td>
                            <td>{!! Form::text('bkb_t', $data_prev_covid19->bkb_t, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkb_td', $data_prev_covid19->bkb_td ? $data_prev_covid19->bkb_td : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkb_s', $data_prev_covid19->bkb_s, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkb_sd', $data_prev_covid19->bkb_sd ? $data_prev_covid19->bkb_sd : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkb_m', $data_prev_covid19->bkb_m, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkb_md', $data_prev_covid19->bkb_md ? $data_prev_covid19->bkb_md : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bkb_a', $data_prev_covid19->bkb_a, array('class' => 'form-control text-center')) !!}</td>
                        </tr>
                        <tr>
                            <td>Bangka Selatan</td>
                            <td>{!! Form::text('bks_t', $data_prev_covid19->bks_t, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bks_td', $data_prev_covid19->bks_td ? $data_prev_covid19->bks_td : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bks_s', $data_prev_covid19->bks_s, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bks_sd', $data_prev_covid19->bks_sd ? $data_prev_covid19->bks_sd : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bks_m', $data_prev_covid19->bks_m, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bks_md', $data_prev_covid19->bks_md ? $data_prev_covid19->bks_md : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('bks_a', $data_prev_covid19->bks_a, array('class' => 'form-control text-center')) !!}</td>
                        </tr>
                        <tr>
                            <td>Belitung</td>
                            <td>{!! Form::text('blt_t', $data_prev_covid19->blt_t, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('blt_td', $data_prev_covid19->blt_td ? $data_prev_covid19->blt_td : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('blt_s', $data_prev_covid19->blt_s, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('blt_sd', $data_prev_covid19->blt_sd ? $data_prev_covid19->blt_sd : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('blt_m', $data_prev_covid19->blt_m, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('blt_md', $data_prev_covid19->blt_md ? $data_prev_covid19->blt_md : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('blt_a', $data_prev_covid19->blt_a, array('class' => 'form-control text-center')) !!}</td>
                        </tr>
                        <tr>
                            <td>Belitung Timur</td>
                            <td>{!! Form::text('btm_t', $data_prev_covid19->btm_t, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('btm_td', $data_prev_covid19->btm_td ? $data_prev_covid19->btm_td : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('btm_s', $data_prev_covid19->btm_s, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('btm_sd', $data_prev_covid19->btm_sd ? $data_prev_covid19->btm_sd : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('btm_m', $data_prev_covid19->btm_m, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('btm_md', $data_prev_covid19->btm_md ? $data_prev_covid19->btm_md : 0, array('class' => 'form-control text-center')) !!}</td>
                            <td>{!! Form::text('btm_a', $data_prev_covid19->btm_a, array('class' => 'form-control text-center')) !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <strong>Status</strong>
                {!! Form::text('status', null, array('class' => 'form-control')) !!}
            </div>

        </div>
    </div>
</div>



