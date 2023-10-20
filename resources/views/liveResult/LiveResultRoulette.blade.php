@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ url('css/history.css') }}" rel="stylesheet" type="text/css" />
@endpush


@section('style')
    <style>
        .table_td td {
            padding: 0 !important;
            border-top: 0 !important;
        }

        table {
            width: 100%;
        }

        td {
            padding: 0.5rem;
            text-align: center;
        }

        /* Apply mobile styles below a certain screen width (e.g., 768px) */
        @media (max-width: 768px) {
            tr {
                display: block;
                text-align: center;
            }

            td {
                font-size: 28px;
                width: 100%;
                display: block;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background: green">
                    <h5 class=" text-white text-align-center" style="text-transform: none !important; text-align:center">
                        FunRoulette</h5>

                    <button type='button' id="reset" class="btn text-white btn-outline-light"
                        style="background: #1B0905"><span aria-hidden='true'>Reset
                            Balance</span></button>
                </div>
                <div class="card-body"
                    style="background: linear-gradient(to right, #bc883d, #f5e47b, #bc883d); color:black">
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-1 mx-2 mb-1 text-center justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-lg-9 col-md-5 p-1" style="background-color: #1B0905" id="table">
                                <div class="box">
                                    {{--  <div class="table-responsive table-borderless ">
                                        @php
                                            $no = 0;
                                            $no1 = 0;
                                            $no2 = 0;
                                            $red = [0, 3, 1, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
                                            $black = [2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35];
                                        @endphp
                                        <div class="" style="height: 500px;">
                                            <table class="table-responsive table_td">
                                                <tbody class="chat-list">
                                                    <tr>
                                                        <td class="text-center">
                                                            <table style="border:2px solid #ffffff;"
                                                                class="text-center table">
                                                                <tbody style="border:2px solid #ffffff;">

                                                                    @for ($i = 1; $i <= 4; $i++)
                                                                        <tr class="text-center"
                                                                            style="border:2px solid #FFFFFF;">
                                                                            @for ($j = 1; $j <= 10 && $no < 37; $j++)
                                                                                @php
                                                                                    // echo $no;
                                                                                    $check = substr($no, -2);
                                                                                    // $check1 = substr($no,-1);
                                                                                    // echo $win[$k-1];
                                                                                    // die;
                                                                                    $bull = false;
                                                                                    $length = 2;
                                                                                @endphp
                                                                                @if (in_array($no, $red))
                                                                                    @if ($no === 0)
                                                                                        <td class="No"
                                                                                            style="padding:0rem 0rem;color:green;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                                                            id="{{ $no }}">
                                                                                            <table style="padding:0;">
                                                                                                <tr>
                                                                                                    <td class="No"
                                                                                                        style="text-align: center">
                                                                                                        <span
                                                                                                            style="font-size:20px;padding-bottom: 1rem; color:#fff">{{ $no }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:#000;background-color:#3cff00; color:#fff"
                                                                                                            id='spot{{ $no }}'>0</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    @else
                                                                                        <td class="No"
                                                                                            style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                                                            id="{{ $no }}">
                                                                                            <table style="padding:0;">
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="text-align: center">
                                                                                                        <span
                                                                                                            style="font-size:20px;padding-bottom: 1rem;">{{ $no }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                                                            id='spot{{ $no }}'>0</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    @endif
                                                                                @else
                                                                                    <td class="No"
                                                                                        style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                                                        id="{{ $no }}">
                                                                                        <table style="padding:0;">
                                                                                            <tr>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    <span
                                                                                                        style="font-size:20px;padding-bottom: 1rem; color:#fff">{{ $no }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><span
                                                                                                        style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                                                        id='spot{{ $no }}'>0</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                @endif


                                                                                @php
                                                                                    if ($no <= 37) {
                                                                                        $no++;
                                                                                    }
                                                                                @endphp
                                                                            @endfor
                                                                            @if ($no == 37)
                                                                                <td class="No"
                                                                                    style="padding:0rem 0rem !important;color:green;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                                                    id="00">
                                                                                    <table style="padding:0;">
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                <span
                                                                                                    style="font-size:20px;padding-bottom: 1rem; color:#fff">00</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span
                                                                                                    style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:#000;background-color:#3cff00;"
                                                                                                    id='spot00'>0</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            @endif
                                                                        </tr>
                                                                    @endfor
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>  --}}
                                    <table style="border:2px solid #ffffff;" class="text-center table table-responsive-md">
                                        <tbody style="border:2px solid #ffffff;">

                                            <tr class="text-center" style="border:2px solid #FFFFFF;">
                                                <td class="No"
                                                    style="padding:0rem 0rem;color:green;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                    id="0">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td class="No" style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">0</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:#000;background-color:#3cff00; color:#fff"
                                                                        id="spot0">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="No"
                                                    style="padding:0rem 0rem;color:green;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center"
                                                    id="00">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td class="No" style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">00</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:#000;background-color:#3cff00;"
                                                                        id='spot37'>0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>

                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="1">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">1</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot1">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="2">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">2</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot2">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="3">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">3</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot3">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="4">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">4</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot4">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="5">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">5</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot5">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="6">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">6</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot6">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="7">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">7</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot7">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="8">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">8</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot8">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>





                                            </tr>

                                            <tr class="text-center" style="border:2px solid #FFFFFF;">
                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="9">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">9</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot9">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="10">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">10</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot10">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="11">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">11</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot11">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="12">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">12</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot12">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="13">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">13</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot13">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="14">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">14</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot14">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="15">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">15</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot15">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="16">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">16</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot16">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="17">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">17</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot17">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="18">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:20px;padding-bottom: 1rem;">18</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:15px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot18">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>





                                            </tr>
                                            <tr class="text-center" style="border:2px solid #FFFFFF;">
                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="19">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">19</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot19">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="20">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">20</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot20">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="21">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">21</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot21">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="22">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">22</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot22">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="23">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">23</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot23">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="24">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">24</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot24">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="25">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">25</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot25">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="26">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">26</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot26">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="27">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">27</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot27">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="28">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">28</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot28">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>




                                            </tr>
                                            <tr class="text-center" style="border:2px solid #FFFFFF;">

                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="29">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">29</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot29">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="30">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">30</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot30">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="31">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">31</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot31">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="32">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">32</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot32">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="33">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">33</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot33">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="34">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">34</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000; color:#fff"
                                                                        id="spot34">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center color:#fff"
                                                    id="35">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem; color:#fff">35</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#000000;"
                                                                        id="spot35">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>


                                                <td class="No"
                                                    style="padding:0rem 0rem !important;color:red; line-height:1.2rem;cursor: pointer;vertical-align: unset;text-align: center; color:#fff"
                                                    id="36">
                                                    <table style="padding:0;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    <span
                                                                        style="font-size:15px;padding-bottom: 1rem;">36</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="font-size:20px;border:1px solid #fff;padding:1px 5px;color:rgb(255, 255, 255);background-color:#ff0000;  color:#fff"
                                                                        id="spot36">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <p id="GameStatus" style="font-weight: bold; font-size:25px">Game Timer:</p>
                                <span id="countdown" style="font-size: 32px">00</span>
                                <p>Total Expected Payment<span id="if_selected"></span>: <span id="totalPayment"></span>
                                </p>

                                <div class="mt-2 mb-3 d-flex">
                                    <input type="number" class="form-control mr-2" name="SelectedCard"
                                        id="SelectedCard" style="width:100px" readonly />
                                    <input type="hidden" class="form-control mr-2" name="SelectedCardNumber"
                                        id="SelectedCardNumber" style="width:100px" readonly />
                                    <a class="btn btn-success" id="btnSave" name="btnSave">SAVE</a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade" role="alert" id="alertId">
                                </div>
                                <div class="alert alert-danger alert-dismissible fade" role="alert" id="alertIdR">
                                </div>
                                <span id="idRes">Daily Collection & Results</span>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td>TOTAL Game Balance: </td>
                                        <td align="right"><span id="tDayCollection"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL COLLECTION: </td>
                                        <td align="right"><span id="totalCollection"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL PAYMENT :</td>
                                        <td align="right"><span id="totalPayPoint"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BALANCE :</td>
                                        <td align="right"><span id="Balance"></span>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.js"></script>
@endpush

@push('custom-scripts')
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.0/socket.io.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function() {
            const socket = io.connect('ws://143.244.140.74:9000');
            console.log(socket + "Hello Socket Connected");

            socket.on('connect', function() {
                const user = {
                    adminId: "603388bb7d20e50a81217277",
                    gameName: "funroulette",
                };
                $('.No').on('click', function() {
                    var result = this.id;
                    console.log('hello, I am clicked');

                    $('.No').css('background-color', '#00000000');
                    if (this.id == 0 || this.id == 00) {
                        $('#' + this.id).css('background-color',
                            'green'); // Set the clicked element to green
                    } else {
                        $('#' + this.id).css('background-color',
                            'red'); // Set the clicked element to green

                    } // Reset all elements

                    var boosterIds = $('#boosterId').val();
                    $('#SelectedCard').val(result);

                    if (this.id == 00) {
                        $('#totalPayment').html((parseFloat($('#spot37').html()) * 36).toFixed(
                            2));
                    } else {

                        $('#totalPayment').html((parseFloat($('#spot' + this.id).html()) * 36)
                            .toFixed(
                                2));
                    }

                    $('#boosterId').val(boosterIds);
                });
                socket.emit('joinAdmin', user);

                var cardNumber = 0;
                var y = 1;
                var gameName = "funroulette";

                function removeAlert() {
                    setInterval(function() {
                        $('#alertId').removeClass('show');
                    }, 5000);
                }
                $('#btnSave').on('click', function() {
                    var boosterId = $('#boosterId').val();
                    var card = $('#SelectedCard').val();
                    cardNumber = parseInt(card);
                    y = parseInt(boosterId);
                    if (cardNumber != "" && y != "") {
                        $('#alertId').addClass('show');
                        $('#alertId').html("Success");
                        removeAlert();
                        console.log({
                            cardNumber,
                            gameName
                        });
                        socket.emit('winByAdmin', {
                            cardNumber,
                            gameName
                        });
                    }
                });

                socket.on('resAdmin', (res) => {
                    console.log(res);
                    if (res.gameName == "funroulette") {
                        console.log(res);
                        if (res.time >= 0) {
                            var seconds = parseInt(Math.abs(res.time) - 60);
                            seconds = Math.abs(seconds);
                            var countdownTimer = setInterval(function() {
                                if (seconds <= 0) {
                                    window.location.reload();
                                    gameres.forEach(function(item) {
                                        Object.keys(item).forEach(function(
                                            key) {
                                            $('#c' + key).val(0);
                                            $('#c' + key).css(
                                                "background-color",
                                                "transparent"
                                            );
                                        });
                                    });
                                    $('input[type="radio"]').prop("checked", false);
                                    $('#alertId').removeClass('show');
                                    $('#SelectedCard').val('');
                                    $('#SelectedCardNumber').val('');
                                    $('#TCollection').html('');
                                    $('#totalPayment').html('');
                                    clearInterval(countdownTimer);
                                    window.location.reload();
                                }
                                document.getElementById('countdown').innerHTML =
                                    seconds;
                                seconds -= 1;
                            }, 1024);
                        }

                        {{--  collection data  --}}

                        let balance = res.data.adminBalance;
                        let totalCollection = 0;
                        let totalPayment = 0;

                        for (let i = 0; i < res.dataAdmin.length; i++) {
                            totalCollection += res.dataAdmin[i].totalCollection;
                            totalPayment += res.dataAdmin[i].totalPayment;
                        }

                        let totalBalance = totalCollection - totalPayment;

                        document.getElementById('totalCollection').innerHTML = totalCollection;
                        document.getElementById('totalPayPoint').innerHTML = totalPayment;
                        document.getElementById('Balance').innerHTML = balance.toFixed(2);
                        document.getElementById('tDayCollection').innerHTML = totalBalance;
                        var resAdminData = res.data.position;

                        for (var key in resAdminData) {
                            if (resAdminData.hasOwnProperty(key)) {
                                var id = key;
                                var value = parseFloat(resAdminData[key]).toFixed(2);
                                var element = document.getElementById('spot' + id);

                                if (element) {
                                    element.textContent = id === '00' ? '37' : value;
                                }
                            }
                        }


                    }
                });

                socket.on('resAdminBetData', (res) => {

                    if (res.gameName === "funroulette") {
                        {{--  console.log("Hello Iam " + "" + JSON.stringify(res.data));  --}}

                        var resAdminData = res.data;
                        for (var key in resAdminData) {
                            if (resAdminData.hasOwnProperty(key)) {
                                var id = key;
                                var value = parseFloat(resAdminData[key]).toFixed(2);
                                var element = document.getElementById('spot' + id);

                                if (element) {
                                    element.textContent = id === '00' ? '37' : value;

                                    // Add this line to set the font-size to 20px
                                }
                            }
                        }

                    }
                });

            });
        });
    </script>



    {{--  <script>
        var result = '';
        var gameid = '';
        var card = ["AH", "AS", "AD", "AC", "KH", "KS", "KD", "KC", "QH", "QS", "QD", "QC", "JH", "JS", "JD", "JC"];
        var gameres = [{
            "l-11": 0.0,
            "l-12": 0.0,
            "l-13": 0.0,
            "k-11": 0.0,
            "k-12": 0.0,
            "k-13": 0.0,
            "c-11": 0.0,
            "c-12": 0.0,
            "c-13": 0.0,
            "f-11": 0.0,
            "f-12": 0.0,
            "f-13": 0.0,
        }];
        var cardsNum = {
            "HJ": 1,
            "SJ": 2,
            "DJ": 3,
            "CJ": 4,
            "HQ": 5,
            "SQ": 6,
            "DQ": 7,
            "CQ": 8,
            "HK": 9,
            "SK": 10,
            "DK": 11,
            "CK": 12,
        };
        $('.No').on('click', function() {
            result = this.id;
            {{--  console.log('hello i am clicked');  --}}
    {{-- for (var i = 0; i < 37; i++) {
                $('#' + i).css('background-color', '#00000000');
                $('#00').css('background-color', '#00000000');
            }
            if (this.id == 00) {
                $('#' + this.id).css('background-color', 'green');
            } else {
                $('#' + this.id).css('background-color', 'red');
            }
            // console.log(result);
            var boosterIds = $('#boosterId').val();
            $('#SelectedCard').val(result);
            $('#totalPayment').html($('#spot' + this.id).html() * 36);
            $('#boosterId').val($('#boosterId').val());
        });

        function removeAlert() {
            setInterval(function() {
                $('#alertId').removeClass('show');
                $('#alertIdR').removeClass('show');
            }, 5000);
        }
        $('#btnSave').on('click', function() {
            var card = $('#SelectedCard').val();
            if (card >= 0 && card <= 36 || card == 00) {
                console.log($('#SelectedCard').val());
                console.log($('#boosterId').val());
                $.ajax({
                    type: "POST",
                    url: "funroulette",
                    data: {
                        card: $('#SelectedCard').val(),
                        boosterId: $('#boosterId').val(),
                        gametype: 'roulette',
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(result) {
                        $('#SelectedCard').val('');
                        $('#SelectedCardNumber').val('');
                        $('#alertId').addClass('show');
                        $('#alertId').html("Success");
                        removeAlert();
                        $('#setNo').val('');
                        $('input[type="radio"]').prop("checked", false);
                        $('#boosterId').val(0);
                    },
                    error: function(result) {
                        $('#alertIdR').addClass('show');
                        $('#alertIdR').html(result.responseJSON.errors.card[0]);
                        removeAlert();
                    }
                });
            }
        });
        $('#reset').on('click', function() {
            $.ajax({
                type: "POST",
                url: "game_configs",
                data: {
                    gamename: "funroulette",
                    _token: $('input[name="_token"]').val()
                },
                success: function(result) {
                    // console.log("vijay");
                    window.location.reload();
                },
                error: function(result) {
                    console.log(result);
                }
            });
        });
    </script>  --}}
@endpush
