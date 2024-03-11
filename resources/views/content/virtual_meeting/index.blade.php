@extends('layouts/contentLayoutMaster')

@section('title', 'Agenda Virtual Meeting')

@section('content')
    <div class="content-body">

            <div class="card">
                <div class="card-body">

                    <!-- Tabel Data -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="zoom_meetings_table" class="table table-sm table-hover table-bordered table_style1">
                                    <thead class="style1-head">
                                    <tr role="row">
                                        <th class="text-center" width="110px">Tanggal</th>
                                        <th class="text-center">Waktu</th>
                                        <th class="text-center">Nama Acara</th>
                                        <th class="text-center">Penyelenggara</th>
                                    </tr>
                                    </thead>

                                    <tbody class="style1-body">

                                    {{--ACCOUNT : diskominfobabel@gmail.com--}}
                                    <tr class="alert alert-info">
                                        <td colspan="5">
                                            <button type="button" class="btn btn-sm btn-warning">Vicon Kominfo A (Kapasitas 500)</button>
                                        </td>
                                    </tr>

                                    <?php
                                    $prev_date = "";
                                    ?>

                                    @foreach($response0 as $index =>$data)

                                        @if($prev_date != Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>{{ Helper::meetingDateId($data['start_time']) }}</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif

                                        @if($prev_date == Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif


                                        <?php
                                        $prev_date = Helper::meetingDateId($data['start_time']);
                                        ?>

                                    @endforeach

                                    {{--ACCOUNT : vicon1@babelprov.go.id--}}
                                    <tr class="alert alert-info">
                                        <td colspan="5">
                                            <button type="button" class="btn btn-sm btn-warning">Vicon Kominfo B (Kapasitas 500)</button>
                                        </td>
                                    </tr>

                                    <?php
                                    $prev_date = "";
                                    ?>

                                    @foreach($response1 as $index =>$data)

                                        @if($prev_date != Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>{{ Helper::meetingDateId($data['start_time']) }}</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif

                                        @if($prev_date == Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif


                                        <?php
                                        $prev_date = Helper::meetingDateId($data['start_time']);
                                        ?>

                                    @endforeach

                                    {{--ACCOUNT : vicon2@babelprov.go.id--}}
                                    <tr class="alert alert-info">
                                        <td colspan="5">
                                            <button type="button" class="btn btn-sm btn-warning">Vicon Kominfo C (Kapasitas 100)</button>
                                        </td>
                                    </tr>

                                    <?php
                                    $prev_date = "";
                                    ?>

                                    @foreach($response2 as $index =>$data)

                                        @if($prev_date != Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>{{ Helper::meetingDateId($data['start_time']) }}</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif

                                        @if($prev_date == Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif


                                        <?php
                                        $prev_date = Helper::meetingDateId($data['start_time']);
                                        ?>

                                    @endforeach

                                    {{--ACCOUNT : vicon3@babelprov.go.id--}}
                                    <tr class="alert alert-info">
                                        <td colspan="5">
                                            <button type="button" class="btn btn-sm btn-warning">Vicon Kominfo D (Kapasitas 100)</button>
                                        </td>
                                    </tr>

                                    <?php
                                    $prev_date = "";
                                    ?>

                                    @foreach($response3 as $index =>$data)

                                        @if($prev_date != Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>{{ Helper::meetingDateId($data['start_time']) }}</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif

                                        @if($prev_date == Helper::meetingDateId($data['start_time']))
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                        <span class="badge bg-{{ Helper::meetingStatusId($data['start_time'], $data['duration']) }}">
                                        {{ Helper::meetingTimeId($data['start_time'], $data['duration']) }}
                                        </span>
                                                </td>
                                                <td>
                                                    {{ $data['topic'] }}
                                                </td>
                                                @if (empty($data['agenda']))
                                                    <td>&nbsp;</td>
                                                @else
                                                    <td>{{ $data['agenda'] }}</td>
                                                @endif
                                            </tr>
                                        @endif


                                        <?php
                                        $prev_date = Helper::meetingDateId($data['start_time']);
                                        ?>

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
@endsection
