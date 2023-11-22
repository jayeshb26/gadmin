<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use App\Bets;
use App\generatepoints;
use App\Payments;
use App\pointrequests;
use App\adminGenratedPoint;


use View;

use Carbon\Carbon;
use Illuminate\Http\Request;
use MongoDB\BSON\UTCDateTime;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckAuth');
    }

    public function index()
    {
        $dash = [];
        $chart_f = "";
        $chart_a = "";
        $chart_w = "";
        $chart_p = "";
        if (
            Session::get('role') == 'Admin' ||
            Session::get('role') == 'subadmin'
        ) {
            if (Session::get('is_f') == "false") {
                $dash['users'] = User::where('userName', '!=', "Admin")->where('role', '!=', "subadmin")->where('role', '!=', 'player')->count();
                $dash['distributor'] = User::where('role', 'distributor')->count();
                $dash['player'] = User::where('userName', '!=', "superadminA")->where('role', '!=', "subadmin")->where('role', 'player')->count();
                $dash['blockplayer'] = User::where('userName', '!=', "superadminA")->where('role', '!=', "subadmin")->where('role', 'player')->where('isActive', false)->count();
                $dash['generatedPoint'] = adminGenratedPoint::where('is_f', false)->sum('generateBalance');
                $dash['online'] = User::where('isLogin', 'true')->count();

                $chart_a = array(
                    User::where('role', 'super_distributor')->count(),
                    User::where('role', 'distributor')->count(),
                    User::where('role', 'player')->count(),
                );
                $chart_a = implode(', ', array_values($chart_a));
            } else {
                $dash['SuperDistributor'] = User::where('userName', '!=', "Admin")->where('role', '!=', "subadmin")->where('role', '!=', 'player')->count();
                $dash['player'] = User::where('userName', '!=', "Admin")->where('role', '!=', "subadmin")->where('role', 'player')->count();
                $dash['blockplayer'] = User::where('userName', '!=', "Admin")->where('role', '!=', "subadmin")->where('role', 'player')->where('isActive', false)->count();
                $dash['generatedPoint'] = adminGenratedPoint::where('is_f', true)->sum('generateBalance');
                $dash['generatedPoint'] = adminGenratedPoint::where('is_f', true)->sum('generateBalance');
                $dash['online'] = User::where('isLogin', true)->count();
                $TotalTransferdata =

                    $distributedPoint =  Session::get('creditPoint')  - $dash['generatedPoint'];
                $dash['DistributedPoint'] = $distributedPoint;

                $today = Carbon::today();

                $todayUTCDateTime = new UTCDateTime($today->timestamp * 1000);

                $todayPlayPoint = Bets::where('createdAt', '>=', $todayUTCDateTime)->sum('bet');
                $todayWinPoint = Bets::where('createdAt', '>=', $todayUTCDateTime)->sum('won');

                // dd($total['totalPlayPoints']);
                // dd($total['TotalWinPoints']);
                // dd($total['EndPoint']);
                $dash['tPlayPoint'] = $todayPlayPoint;
                $dash['tWinPoint'] = $todayWinPoint;
                $dash['tEndPoint'] = $todayPlayPoint - $todayWinPoint;

                $dash['distributor'] = User::where('role', 'distributor')->count();
                $dash['SuperDistributor'] = User::where('role', 'super_distributor')->count();
                // dd($dash['distributor']);
                $fm = date('m', strtotime('Yesterday'));
                $fd = date('d', strtotime('Yesterday'));
                $fY = date('Y', strtotime('Yesterday'));
                $tm = date('m');
                $td = date('d');
                $tY = date('Y');
                $th = date('h');
                $ti = date('i');
                $ts = date('s');

                $dash['newReg'] = User::where('role', 'player')
                    ->whereBetween(
                        'createdAt',
                        array(
                            Carbon::create($fY, $fm, $fd, $th, $ti, $ts),
                            Carbon::create($tY, $tm, $td, $th, $ti, $ts),
                        )
                    )
                    ->count();

                $player_id = User::where('userName', '!=', "superadminF")->where('role', '!=', "subadmin")->where('role', 'player')->get()->pluck('_id');

                foreach ($player_id as $key => $value) {
                    $player_id[$key] = new \MongoDB\BSON\ObjectID($value);
                }

                $dash['playPoint'] = Bets::whereIn('playerId', $player_id)->sum('bet');
                $dash['wonPoint'] = Bets::whereIn('playerId', $player_id)->sum('won');
                $dash['endPoint'] = $dash['playPoint'] - $dash['wonPoint'];
                $chart_f = array(
                    User::where('role', 'super_distributor')->count(),
                    User::where('role', 'distributor')->count(),
                    User::where('role', 'player')->count(),
                );
                $chart_f = implode(', ', array_values($chart_f));
            }
            $chart_w = array(
                Bets::where('game', 'funroulette')->sum('won'),
                Bets::where('game', 'funtarget')->sum('won'),
                // Bets::where('game', 'dragontiger')->sum('won'),
                // Bets::where('game', 'animal')->sum('won'),
            );
            $chart_p = array(
                Bets::where('game', 'funtarget')->sum('bet'),
                Bets::where('game', 'funroulette')->sum('bet'),
                // Bets::where('game', 'dragontiger')->sum('won'),
                // Bets::where('game', 'animal')->sum('won'),
            );
            $chart_w = implode(', ', array_values($chart_w));
            $chart_p = implode(', ', array_values($chart_p));
        } else {
            $dash['users'] = User::where('_id', '!=', new \MongoDB\BSON\ObjectID(Session::get('id')))->where('role', '!=', "subadmin")->where('userName', '!=', "Admin")->count();
            $dash['SuperDistributor'] = User::where('role', 'super_distributor')->count();
            $dash['player'] = User::where('userName', '!=', "superadminA")->where('role', '!=', "subadmin")->where('role', 'player')->count();
            $dash['blockplayer'] = User::where('userName', '!=', "superadminA")->where('role', '!=', "subadmin")->where('role', 'player')->where('isActive', false)->count();

            // profile card data:-
            $today = Carbon::today();
            $todayUTCDateTime = new UTCDateTime($today->timestamp * 1000);
            if (Session::get('role') == 'Admin') {
                $todayPlayPoint = Bets::where('createdAt', '>=', $todayUTCDateTime)->sum('bet');
                $todayWinPoint = Bets::where('createdAt', '>=', $todayUTCDateTime)->sum('won');
                $dash['tPlayPoint'] = $todayPlayPoint;
                $dash['tWinPoint'] = $todayWinPoint;
                $dash['tEndPoint'] = $todayPlayPoint - $todayWinPoint;
            }

            $executive = User::where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
            // dd($executive);

            if (Session::get('role') == 'super_distributor') {
                $exe = [];
                $players = [];
                foreach ($executive as $exe_user) {
                    $exe[] = new \MongoDB\BSON\ObjectID($exe_user['_id']);
                }

                $classic = User::whereIn('referralId', $exe)->get();
                foreach ($classic as $cal_user) {
                    $players[] = new \MongoDB\BSON\ObjectID($cal_user['_id']);
                }

                $play = Bets::whereIn('playerId', $players)
                    ->where('createdAt', '>=', $todayUTCDateTime)
                    ->sum('bet');
                $won = Bets::whereIn('playerId', $players)
                    ->where('createdAt', '>=', $todayUTCDateTime)
                    ->sum('won');

                $dash['tPlayPoint'] = $play;
                $dash['tWinPoint'] = $won;
                $dash['tEndPoint'] = $play - $won;
            } elseif (Session::get('role') == 'distributor') {
                $executive = User::where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->get()->toArray();
                $playerIds = array_column($executive, '_id');
                $betSums = [];

                foreach ($playerIds as $playerId) {
                    $betSumBet = Bets::where('playerId', new \MongoDB\BSON\ObjectID($playerId))
                        ->where('createdAt', '>=', $todayUTCDateTime)
                        ->sum('bet');

                    $betSumWon = Bets::where('playerId', new \MongoDB\BSON\ObjectID($playerId))
                        ->where('createdAt', '>=', $todayUTCDateTime)
                        ->sum('won');

                    $betSums[] = [
                        'playerId' => $playerId,
                        'bet' => $betSumBet,
                        'won' => $betSumWon,
                    ];
                }



                // Now, separate 'bet' and 'won' points into different arrays
                $betPoints = [];
                $wonPoints = [];

                // foreach ($betSums as $betSum) {
                //     $betPoints[$betSum['playerId']] >= $betSum['bet'];
                //     $wonPoints[$betSum['playerId']] >= $betSum['won'];
                // }

                $betPointsSum = array_sum($betPoints);
                $wonPointsSum = array_sum($wonPoints);

                $tEndPoint = [];

                foreach ($betPoints as $playerId => $betPoint) {
                    // Check if the player has corresponding 'wonPoint', otherwise assume it's 0
                    $wonPoint = $wonPoints[$playerId] ?? 0;

                    // Calculate the 'tEndPoint' for the current player
                    $tEndPoint[$playerId] = $betPoint - $wonPoint;
                }

                $dash['tPlayPoint'] = $betPointsSum;
                $dash['tWinPoint'] = $wonPointsSum;
                $dash['tEndPoint'] = $betPointsSum - $wonPointsSum;
            }

            // dd($Betssuper);


            //     // if (count($classic) == 0)  {
            //     //     foreach ($classic as $cal_user) {
            //     //         $players[] = new \MongoDB\BSON\ObjectID($cal_user['_id']);
            //     //     }
            //     //     if (count($players) == 0) {
            //     //         $total = [];
            //     //         $total['totalStartPoint'] = $totalStartPoint;
            //     //         $total['totalPlayPoints'] = $totalPlayPoints;
            //     //         $total['TotalWinPoints'] = $TotalWinPoints;
            //     //         $total['EndPoint'] = $EndPoint;
            //     //         $total['Margin'] = $margin;
            //     //         $total['NetProfit'] = $netprofit;
            //     //         $total['SuperDistributedProfit'] = $SuperDistributedProfit;
            //     //         $total['PL'] = count($players);
            //     //         $data = [];
            //     //         return view('turnOver', ['data' => $data, 'total' => $total]);
            //     //     } else {
            //     //         // echo "<pre>";
            //     //         // print_r($players);
            //     //         // die;
            //     //         if ($type == 1 || $type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 8) {
            //     //             $td = date('j', strtotime($_GET['to']));
            //     //             $groups[$premium['_id']] = Bets::select('bet', 'won',  'playerCommission', 'classicCommission', 'ExecutiveCommission', 'premiumCommission', 'agentCommission')
            //     //                 ->whereIn('playerId', $players)
            //     //                 ->whereBetween(
            //     //                     'createdAt',
            //     //                     array(
            //     //                         Carbon::create($fY, $fm, $fd, 00, 00, 00),
            //     //                         Carbon::create($tY, $tm, $td, 23, 59, 59),
            //     //                     )
            //     //                 )->get()->toArray();
            //     //         } elseif ($type == 7 || $type == 6) {
            //     //             $to = date('n-j-Y', strtotime($_GET['to']));
            //     //             $groups[$premium['_id']] = Bets::select('bet', 'won',  'playerCommission', 'classicCommission', 'ExecutiveCommission', 'premiumCommission', 'agentCommission')
            //     //                 ->whereIn('playerId', $players)->where('DrDate', $to)->get()->toArray();
            //     //         }

            //     //         // echo "<Pre>";
            //     //         // print_r($groups);
            //     //         // die;
            //     //         $commission = [];
            //     //         foreach ($groups as $key => $get) {
            //     //             $PlayPoints = 0;
            //     //             $WinPoints = 0;
            //     //             $EndPoint = 0;
            //     //             $RetailerCommission = 0;
            //     //             $DistributerCommission = 0;
            //     //             $SuperDistributerCommission = 0;
            //     //             $commission[$key]['_id'] = $premium['_id'];
            //     //             $commission[$key]['userName'] = $premium['userName'];
            //     //             $commission[$key]['role'] = $premium['role'];
            //     //             $commission[$key]['name'] = $premium['name'];
            //     //             $commission[$key]['commission'] = $premium['commissionPercentage'];
            //     //             foreach ($get as $player) {
            //     //                 $PlayPoints += $player['bet'];
            //     //                 $WinPoints += $player['won'];
            //     //                 $EndPoint = $PlayPoints - $WinPoints;
            //     //             }
            //     //             $commission[$key]['playPoint'] = $PlayPoints;
            //     //             $commission[$key]['wonPoint'] = $WinPoints;
            //     //             $commission[$key]['endPoint'] = $EndPoint;
            //     //             $commission[$key]['SuperDistributedProfit'] = 0;
            //     //         }
            //     //         // echo "<pre>";
            //     //         // print_r($commission);die;
            //     //         foreach ($commission as $play) {
            //     //             $totalPlayPoints += $play['playPoint'];
            //     //             $TotalWinPoints += $play['wonPoint'];
            //     //             $EndPoint = $totalPlayPoints - $TotalWinPoints;
            //     //         }
            //     //         $total = [];
            //     //         $total['totalPlayPoints'] = $totalPlayPoints;
            //     //         $total['TotalWinPoints'] = $TotalWinPoints;
            //     //         $total['EndPoint'] = $EndPoint;
            //     //         $total['Margin'] = $margin;
            //     //         $total['NetProfit'] = $netprofit;
            //     //         $total['SuperDistributedProfit'] = $SuperDistributedProfit;
            //     //         $total['PL'] = count($players);
            //     //         // echo "<pre>";
            //     //         // print_r($total);die();
            //     //         // return vi}ew('turnOver', ['data' => $commission, 'total' => $total, 'user' => $users]);
            //     //     }
            //     // }
            // }





























            if (Session::get('role') == 'super_distributor') {
                $dis = User::where('role', 'distributor')->where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
                if (count($dis) == 0) {
                    $dis_id = [];
                } else {
                    foreach ($dis as $d) {
                        $dis_id[] = new \MongoDB\BSON\ObjectID($d['_id']);
                    }
                }

                $playerCount = User::where('role', 'player')->whereIn('referralId', $dis_id)->where('isLogin', true)->count();


                $dash['online'] = $playerCount;
            } else {

                $referralID = new \MongoDB\BSON\ObjectID(Session::get('id'));
                $onlinePlayerCount = User::where('referralId', $referralID)
                    ->where('role', 'player')
                    ->where('isLogin', true)
                    ->count();

                $dash['online'] = $onlinePlayerCount;
            }
        }

        return view('dashboard', ['data' => $dash, 'chart_f' => $chart_f, 'chart_a' => $chart_a, 'chart_w' => $chart_w, 'chart_p' => $chart_p]);
    }

    // public function point_file(Request $request)
    // {
    //     if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //         $users = User::where('role', '!=', 'Admin')->where('is_franchise', (Session::get('is_f') == "true") ? true : false)->get();
    //     } else {
    //         $users = User::where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->where('is_franchise', (Session::get('is_f') == "true") ? true : false)->get();
    //     }
    //     $user = User::where('_id', Session::get('id'))->get();
    //     $to = date('Y-m-d');

    //     $payment = [];
    //     if (isset($_GET['from']) && isset($_GET['to']) && empty($_GET['username']) && !empty($_GET['from']) && !empty($_GET['to'])) {
    //         // echo "not user";
    //         // die;
    //         $fm = date('m', strtotime($_GET['from']));
    //         $fd = date('d', strtotime($_GET['from']));
    //         $fY = date('Y', strtotime($_GET['from']));

    //         $tm = date('m', strtotime($_GET['to']));
    //         $td = date('d', strtotime($_GET['to']));
    //         $tY = date('Y', strtotime($_GET['to']));
    //         if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //             $payment = Payments::whereBetween(
    //                 'createdAt',
    //                 array(
    //                     Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                     Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                 )
    //             )->where('is_f', (Session::get('is_f') == "true") ? true : false)->orderBy('createdAt', 'DESC')->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         } elseif (Session::get('role') == "agent" || Session::get('role') == "super_distributor" || Session::get('role') == "distributor" || Session::get('role') == "retailer") {
    //             $payment = Payments::where('toId', Session::get('id'))->orderBy('createdAt', 'DESC')
    //                 ->whereBetween(
    //                     'createdAt',
    //                     array(
    //                         Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                         Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                     )
    //                 )->where('is_f', (Session::get('is_f') == "true") ? true : false)->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";print_r($users);die();
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         }
    //     } elseif (empty($_GET['from']) && empty($_GET['to']) && isset($_GET['username'])) {
    //         $payment = Payments::orderBy('createdAt', 'DESC')
    //             ->where('toId', $_GET['username'])
    //             ->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //             ->get();
    //         foreach ($payment as $key => $pay) {
    //             $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //             // echo "<pre>";print_r($users);die();
    //             // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //             $payment[$key]['userName'] = $refer['userName'];
    //         }
    //     } elseif (isset($_GET['from']) && isset($_GET['to']) && isset($_GET['username'])) {
    //         $fm = date('m', strtotime($_GET['from']));
    //         $fd = date('d', strtotime($_GET['from']));
    //         $fY = date('Y', strtotime($_GET['from']));
    //         $tm = date('m', strtotime($_GET['to']));
    //         $td = date('d', strtotime($_GET['to']));
    //         $tY = date('Y', strtotime($_GET['to']));

    //         if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //             $payment = Payments::whereBetween(
    //                 'createdAt',
    //                 array(
    //                     Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                     Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                 )
    //             )->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //                 ->where('toId', $_GET['username'])
    //                 ->orderBy('createdAt', 'DESC')->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //             // print_r($payment->toArray());
    //             // die;
    //         } elseif (Session::get('role') == "agent" || Session::get('role') == "super_distributor" || Session::get('role') == "distributor" || Session::get('role') == "retailer") {
    //             $payment = Payments::where('toId', Session::get('id'))
    //                 ->orderBy('createdAt', 'DESC')
    //                 ->whereBetween(
    //                     'createdAt',
    //                     array(
    //                         Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                         Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                     )
    //                 )->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //                 ->where('toId', $_GET['username'])
    //                 ->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";print_r($users);die();
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         }
    //     }
    //     return view('pointfile', ['data' => $users, 'payment' => $payment, 'user' => $user]);
    // }

    // public function points_in()
    // {
    //     if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //         $users = User::where('role', '!=', 'Admin')->where('is_franchise', (Session::get('is_f') == "true") ? true : false)->get();
    //     } else {
    //         $users = User::where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->where('is_franchise', (Session::get('is_f') == "true") ? true : false)->get();
    //     }
    //     $user = User::where('_id', Session::get('id'))->get();
    //     $to = date('Y-m-d');
    //     $payment = [];
    //     if (isset($_GET['from']) && isset($_GET['to']) && empty($_GET['username']) && !empty($_GET['from']) && !empty($_GET['to'])) {
    //         // echo "not user";
    //         // die;
    //         $fm = date('m', strtotime($_GET['from']));
    //         $fd = date('d', strtotime($_GET['from']));
    //         $fY = date('Y', strtotime($_GET['from']));

    //         $tm = date('m', strtotime($_GET['to']));
    //         $td = date('d', strtotime($_GET['to']));
    //         $tY = date('Y', strtotime($_GET['to']));
    //         if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //             $payment = Payments::whereBetween(
    //                 'createdAt',
    //                 array(
    //                     Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                     Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                 )
    //             )->where('is_f', (Session::get('is_f') == "true") ? true : false)->orderBy('createdAt', 'DESC')->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //             // print_r($payment->toArray());
    //             // die;
    //         } elseif (Session::get('role') == "agent" || Session::get('role') == "super_distributor" || Session::get('role') == "distributor" || Session::get('role') == "retailer") {
    //             $payment = Payments::where('toId', Session::get('id'))->orderBy('createdAt', 'DESC')
    //                 ->whereBetween(
    //                     'createdAt',
    //                     array(
    //                         Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                         Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                     )
    //                 )->where('is_f', (Session::get('is_f') == "true") ? true : false)->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";print_r($users);die();
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         }
    //     } elseif (empty($_GET['from']) && empty($_GET['to']) && isset($_GET['username'])) {
    //         $payment = Payments::orderBy('createdAt', 'DESC')
    //             ->where('toId', $_GET['username'])
    //             ->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //             ->get();
    //         foreach ($payment as $key => $pay) {
    //             $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //             // echo "<pre>";print_r($users);die();
    //             // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //             $payment[$key]['userName'] = $refer['userName'];
    //         }
    //     } elseif (isset($_GET['from']) && isset($_GET['to']) && isset($_GET['username'])) {
    //         $fm = date('m', strtotime($_GET['from']));
    //         $fd = date('d', strtotime($_GET['from']));
    //         $fY = date('Y', strtotime($_GET['from']));
    //         $tm = date('m', strtotime($_GET['to']));
    //         $td = date('d', strtotime($_GET['to']));
    //         $tY = date('Y', strtotime($_GET['to']));

    //         if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //             $payment = Payments::whereBetween(
    //                 'createdAt',
    //                 array(
    //                     Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                     Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                 )
    //             )->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //                 ->where('toId', $_GET['username'])
    //                 ->orderBy('createdAt', 'DESC')->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //             // print_r($payment->toArray());
    //             // die;
    //         } elseif (Session::get('role') == "agent" || Session::get('role') == "super_distributor" || Session::get('role') == "distributor" || Session::get('role') == "retailer") {
    //             $payment = Payments::where('toId', Session::get('id'))
    //                 ->orderBy('createdAt', 'DESC')
    //                 ->whereBetween(
    //                     'createdAt',
    //                     array(
    //                         Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                         Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                     )
    //                 )->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //                 ->where('toId', $_GET['username'])
    //                 ->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";print_r($users);die();
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         }
    //     }
    //     return view('InPoint', ['data' => $users, 'payment' => $payment, 'user' => $user]);
    // }

    // public function points_out(Request $request)
    // {
    //     if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //         $users = User::where('role', '!=', 'Admin')->where('is_franchise', (Session::get('is_f') == "true") ? true : false)->get();
    //     } else {
    //         $users = User::where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->where('is_franchise', (Session::get('is_f') == "true") ? true : false)->get();
    //     }
    //     $user = User::where('_id', Session::get('id'))->get();
    //     $to = date('Y-m-d');
    //     $payment = [];
    //     if (isset($_GET['from']) && isset($_GET['to']) && empty($_GET['username']) && !empty($_GET['from']) && !empty($_GET['to'])) {
    //         // echo "not user";
    //         // die;
    //         $fm = date('m', strtotime($_GET['from']));
    //         $fd = date('d', strtotime($_GET['from']));
    //         $fY = date('Y', strtotime($_GET['from']));

    //         $tm = date('m', strtotime($_GET['to']));
    //         $td = date('d', strtotime($_GET['to']));
    //         $tY = date('Y', strtotime($_GET['to']));
    //         if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //             $payment = Payments::whereBetween(
    //                 'createdAt',
    //                 array(
    //                     Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                     Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                 )
    //             )->where('is_f', (Session::get('is_f') == "true") ? true : false)->orderBy('createdAt', 'DESC')->get();
    //             // echo "<pre>";
    //             // print_r($payment->toArray());
    //             // die;
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         } elseif (Session::get('role') == "agent" || Session::get('role') == "super_distributor" || Session::get('role') == "distributor" || Session::get('role') == "retailer") {
    //             $payment = Payments::where('toId', Session::get('id'))->orderBy('createdAt', 'DESC')
    //                 ->whereBetween(
    //                     'createdAt',
    //                     array(
    //                         Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                         Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                     )
    //                 )->where('is_f', (Session::get('is_f') == "true") ? true : false)->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";print_r($users);die();
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         }
    //     } elseif (empty($_GET['from']) && empty($_GET['to']) && isset($_GET['username'])) {
    //         $payment = Payments::orderBy('createdAt', 'DESC')
    //             ->where('toId', $_GET['username'])
    //             ->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //             ->get();
    //         foreach ($payment as $key => $pay) {
    //             $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //             // echo "<pre>";print_r($users);die();
    //             // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //             $payment[$key]['userName'] = $refer['userName'];
    //         }
    //     } elseif (isset($_GET['from']) && isset($_GET['to']) && isset($_GET['username'])) {
    //         $fm = date('m', strtotime($_GET['from']));
    //         $fd = date('d', strtotime($_GET['from']));
    //         $fY = date('Y', strtotime($_GET['from']));
    //         $tm = date('m', strtotime($_GET['to']));
    //         $td = date('d', strtotime($_GET['to']));
    //         $tY = date('Y', strtotime($_GET['to']));

    //         if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //             $payment = Payments::whereBetween(
    //                 'createdAt',
    //                 array(
    //                     Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                     Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                 )
    //             )->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //                 ->where('toId', $_GET['username'])
    //                 ->orderBy('createdAt', 'DESC')->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //             // print_r($payment->toArray());
    //             // die;
    //         } elseif (Session::get('role') == "agent" || Session::get('role') == "super_distributor" || Session::get('role') == "distributor" || Session::get('role') == "retailer") {
    //             $payment = Payments::where('toId', Session::get('id'))
    //                 ->orderBy('createdAt', 'DESC')
    //                 ->whereBetween(
    //                     'createdAt',
    //                     array(
    //                         Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                         Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                     )
    //                 )->where('is_f', (Session::get('is_f') == "true") ? true : false)
    //                 ->where('toId', $_GET['username'])
    //                 ->get();
    //             foreach ($payment as $key => $pay) {
    //                 $refer = User::where('_id', new \MongoDB\BSON\ObjectID($pay['fromId']))->first();
    //                 // echo "<pre>";print_r($users);die();
    //                 // $payment[$key]['createdAt'] = Carbon::parse( $pay['createdAt'] )->toDayDateTimeString();
    //                 $payment[$key]['userName'] = $refer['userName'];
    //             }
    //         }
    //     }
    //     return view('OutReport', ['data' => $users, 'payment' => $payment, 'user' => $user]);
    // }

    // public function verify_pointFile(Request $request)
    // {
    //     $user = User::orderBy('userName', 'ASC')
    //         ->where('is_franchise', (Session::get('is_f') == "true") ? true : false)
    //         ->where('userName', "!=", "superadminA")
    //         ->where('userName', '!=', "superadminF")->where('role', '!=', "subadmin")->get()->pluck('_id');
    //     foreach ($user as $key => $u) {
    //         $user[$key] = new \MongoDB\BSON\ObjectID($u);
    //     }
    //     if (Session::get('role') == "Admin" || Session::get('role') == "subadmin") {
    //         $data = pointrequests::orderBy('createdAt', 'DESC')->whereIn('playerId', $user)->where('status', 'Success')->get();
    //     } elseif (Session::get('role') == "agent" || Session::get('role') == "super_distributor" || Session::get('role') == "distributor" || Session::get('role') == "retailer") {
    //         $data = pointrequests::orderBy('createdAt', 'DESC')->where('playerId', new \MongoDB\BSON\ObjectID(Session::get('id')))->where('status', 'Success')->get();
    //     }

    //     return view('verifyPoint', [
    //         'data' => $data,
    //     ]);
    // }
}
