<?php

namespace App\Http\Controllers;

use App\BetList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Winresults;
use App\User;

use Carbon\Carbon;
use Session;
use App\Bets;

class GameController extends Controller
{
    public function index($id)
    {
        // rouletteMini
        // funroulette
        // roulette
        // funtarget
        // tripleChance

        if ($id == 1) {
            $bets = Winresults::where('gameName', "playToWin")->orderBy('createdAt', 'DESC')->paginate(10);
            $game = "FunTarget";
        }
        // elseif ($id == 2) {
        //     $bets = Winresults::where('gameName', "funtarget")->orderBy('createdAt', 'DESC')->paginate(10);
        //     $game = "FunTarget";
        // }
        return view('gameDraw', ['data' => $bets, 'game' => $game]);
    }






    // public function gameProfit()
    // {
    //     $type = $_GET['type'];
    //     $resArray = array();
    //     $totalStartPoint = 0;
    //     $totalPlayPoints = 0;
    //     $TotalWinPoints = 0;
    //     $EndPoint = 0;
    //     $TotalCommission = 0;
    //     $today = date_create(date("Y-m-d"));
    //     $users = User::where('role', '=', 'retailer')->get();

    //     $fm = date('m', strtotime($_GET['from']));
    //     $fd = date('j', strtotime($_GET['from']));
    //     $fY = date('Y', strtotime($_GET['from']));
    //     $tm = date('m', strtotime($_GET['to']));
    //     $tY = date('Y', strtotime($_GET['to']));

    //     if (Session::get('role') == "Admin") {
    //         if (Session::get('is_f') == "false") {
    //             $agent = User::where('role', 'agent')->where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
    //             // echo "<pre>";
    //             // print_r($superdistributer->toArray());die;
    //             $admin = User::where('_id', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
    //             if (count($agent) == 0) {
    //                 $game = array();
    //                 $game['funroulette'] = 0;
    //                 $game['funtarget'] = 0;
    //                 $game['playToWin'] = 0;
    //                 $game['roulette'] = 0;
    //                 $game['spinToWin'] = 0;
    //                 return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //             } else {
    //                 foreach ($agent as $super) {
    //                     $agents[] = new \MongoDB\BSON\ObjectID($super['_id']);
    //                 }
    //                 $premium = User::whereIn('referralId', $agents)->get();
    //                 if (count($premium) == 0) {

    //                     $game = array();
    //                     $game['funroulette'] = 0;
    //                     $game['funtarget'] = 0;
    //                     $game['playToWin'] = 0;
    //                     $game['roulette'] = 0;
    //                     $game['spinToWin'] = 0;
    //                     return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //                 } else {
    //                     foreach ($premium as $pre_user) {
    //                         $pre[] = new \MongoDB\BSON\ObjectID($pre_user['_id']);
    //                     }
    //                     $executive = User::whereIn('referralId', $pre)->get();
    //                     if (count($executive) == 0) {

    //                         $game = array();
    //                         $game['funroulette'] = 0;
    //                         $game['funtarget'] = 0;
    //                         $game['playToWin'] = 0;
    //                         $game['roulette'] = 0;
    //                         $game['spinToWin'] = 0;
    //                         return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //                     } else {
    //                         foreach ($executive as $exe_user) {
    //                             $exe[] = new \MongoDB\BSON\ObjectID($exe_user['_id']);
    //                         }
    //                         $classic = User::whereIn('referralId', $exe)->get();
    //                         if (count($classic) == 0) {

    //                             $game = array();
    //                             $game['funroulette'] = 0;
    //                             $game['funtarget'] = 0;
    //                             $game['playToWin'] = 0;
    //                             $game['roulette'] = 0;
    //                             $game['spinToWin'] = 0;
    //                             return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //                         } else {
    //                             foreach ($classic as $cal_user) {
    //                                 $cal[] = new \MongoDB\BSON\ObjectID($cal_user['_id']);
    //                             }
    //                             $player = User::whereIn('referralId', $cal)->get();
    //                             foreach ($player as $player_user) {
    //                                 $players[] = new \MongoDB\BSON\ObjectID($player_user['_id']);
    //                             }
    //                             if (count($players) == 0) {

    //                                 $game = array();
    //                                 $game['funroulette'] = 0;
    //                                 $game['funtarget'] = 0;
    //                                 $game['playToWin'] = 0;
    //                                 $game['roulette'] = 0;
    //                                 $game['spinToWin'] = 0;
    //                                 return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //                             } else {
    //                                 if ($type == 1 || $type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 8) {
    //                                     $td = date('j', strtotime($_GET['to']));
    //                                     $playPoints = Bets::whereIn('playerId', $players)
    //                                         ->whereBetween(
    //                                             'createdAt',
    //                                             array(
    //                                                 Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                                                 Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                                             )
    //                                         )->get()
    //                                         ->groupBy(function ($val) {
    //                                             return $val->game;
    //                                         });
    //                                 } elseif ($type == 7 || $type == 6) {
    //                                     $to = date('n-j-Y', strtotime($_GET['to']));
    //                                     $playPoints = Bets::whereIn('playerId', $players)
    //                                         ->where('DrDate', $to)->get()->groupBy(function ($val) {
    //                                             return $val->game;
    //                                         });;
    //                                 }

    //                                 // echo "<pre>";
    //                                 // print_r($playPoints->toArray());
    //                                 // die;
    //                                 $game = array();

    //                                 $game['funroulette'] = 0;
    //                                 $game['funtarget'] = 0;
    //                                 $game['playToWin'] = 0;
    //                                 $game['roulette'] = 0;
    //                                 $game['spinToWin'] = 0;

    //                                 // echo "<pre>";
    //                                 // print_r($game);
    //                                 // die;

    //                                 $total = [];
    //                                 foreach ($playPoints as $key => $play) {
    //                                     $totalPlayPoints = 0;
    //                                     $TotalWinPoints = 0;
    //                                     foreach ($play as $pl) {
    //                                         $totalPlayPoints += $pl['bet'];
    //                                         $TotalWinPoints += $pl['won'];
    //                                     }
    //                                     $total[$key]['totalPlayPoints'] = $totalPlayPoints;
    //                                     $total[$key]['TotalWinPoints'] = $TotalWinPoints;
    //                                 }
    //                                 // echo "<pre>";
    //                                 // print_r($total);
    //                                 // die;
    //                                 // $profit = [];
    //                                 foreach ($total as $key => $to) {
    //                                     if (array_key_exists($key, $game)) {
    //                                         $game[$key] = intval($to['totalPlayPoints'] - $to['TotalWinPoints']);
    //                                     }
    //                                 }

    //                                 // $total['EndPoint'] =
    //                                 // echo "<pre>";
    //                                 // print_r($game);
    //                                 // die;
    //                                 return view('gameProfit', ['data' => $admin, 'total' => $game]);
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         } else {
    //             $premium = User::where('role', 'super_distributor')->where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
    //             // echo "<pre>";
    //             // print_r($premium->toArray());
    //             // die;
    //             $admin = User::where('_id', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
    //             if (count($premium) == 0) {
    //                 $game = array();
    //                 $game['funroulette'] = 0;
    //                 $game['funtarget'] = 0;
    //                 $game['playToWin'] = 0;
    //                 $game['roulette'] = 0;
    //                 $game['spinToWin'] = 0;
    //                 return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //             } else {
    //                 foreach ($premium as $pre_user) {
    //                     $pre[] = new \MongoDB\BSON\ObjectID($pre_user['_id']);
    //                 }
    //                 $executive = User::whereIn('referralId', $pre)->get();
    //                 if (count($executive) == 0) {

    //                     $game = array();
    //                     $game['funroulette'] = 0;
    //                     $game['funtarget'] = 0;
    //                     $game['playToWin'] = 0;
    //                     $game['roulette'] = 0;
    //                     $game['spinToWin'] = 0;
    //                     return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //                 } else {
    //                     foreach ($executive as $exe_user) {
    //                         $exe[] = new \MongoDB\BSON\ObjectID($exe_user['_id']);
    //                     }
    //                     $classic = User::whereIn('referralId', $exe)->get();
    //                     if (count($classic) == 0) {

    //                         $game = array();
    //                         $game['funroulette'] = 0;
    //                         $game['funtarget'] = 0;
    //                         $game['playToWin'] = 0;
    //                         $game['roulette'] = 0;
    //                         $game['spinToWin'] = 0;
    //                         return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //                     } else {
    //                         foreach ($classic as $cal_user) {
    //                             $cal[] = new \MongoDB\BSON\ObjectID($cal_user['_id']);
    //                         }
    //                         $player = User::whereIn('_id', $cal)->get();
    //                         foreach ($player as $player_user) {
    //                             $players[] = new \MongoDB\BSON\ObjectID($player_user['_id']);
    //                         }
    //                         if (count($players) == 0) {
    //                             $game = array();
    //                             $game['funroulette'] = 0;
    //                             $game['funtarget'] = 0;
    //                             $game['playToWin'] = 0;
    //                             $game['roulette'] = 0;
    //                             $game['spinToWin'] = 0;
    //                             return view('gameProfit', ['data' => $admin,  'total' => $game]);
    //                         } else {
    //                             if ($type == 1 || $type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 8) {
    //                                 $td = date('j', strtotime($_GET['to']));
    //                                 $playPoints = Bets::whereIn('retailerId', $players)
    //                                     ->whereBetween(
    //                                         'createdAt',
    //                                         array(
    //                                             Carbon::create($fY, $fm, $fd, 00, 00, 00),
    //                                             Carbon::create($tY, $tm, $td, 23, 59, 59),
    //                                         )
    //                                     )->get()
    //                                     ->groupBy(function ($val) {
    //                                         return $val->game;
    //                                     });
    //                             } elseif ($type == 7 || $type == 6) {
    //                                 $to = date('Y-n-j', strtotime($_GET['to']));
    //                                 // dd($to);
    //                                 $playPoints = Bets::whereIn('retailerId', $players)
    //                                     ->where('DrDate', $to)
    //                                     ->get()->groupBy(function ($val) {
    //                                         return $val->game;
    //                                     });;
    //                             }

    //                             // echo "<pre>";
    //                             // print_r($playPoints->toArray());
    //                             // die;
    //                             $game = array();

    //                             $game['funroulette'] = 0;
    //                             $game['funtarget'] = 0;
    //                             $game['playToWin'] = 0;
    //                             $game['roulette'] = 0;
    //                             $game['spinToWin'] = 0;

    //                             // echo "<pre>";
    //                             // print_r($game);
    //                             // die;

    //                             $total = [];
    //                             foreach ($playPoints as $key => $play) {
    //                                 $totalPlayPoints = 0;
    //                                 $TotalWinPoints = 0;
    //                                 foreach ($play as $pl) {
    //                                     $totalPlayPoints += $pl['bet'];
    //                                     $TotalWinPoints += $pl['won'];
    //                                 }
    //                                 $total[$key]['totalPlayPoints'] = $totalPlayPoints;
    //                                 $total[$key]['TotalWinPoints'] = $TotalWinPoints;
    //                             }
    //                             // echo "<pre>";
    //                             // print_r($total);
    //                             // die;
    //                             // $profit = [];
    //                             foreach ($total as $key => $to) {
    //                                 if (array_key_exists($key, $game)) {
    //                                     $game[$key] = intval($to['totalPlayPoints'] - $to['TotalWinPoints']);
    //                                 }
    //                             }

    //                             // $total['EndPoint'] =
    //                             // echo "<pre>";
    //                             // print_r($game);
    //                             // die;
    //                             return view('gameProfit', ['data' => $admin, 'total' => $game]);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }

    public function gameProfit()
    {
        $type = $_GET['type'];
        $resArray = array();
        $totalStartPoint = 0;
        $totalPlayPoints = 0;
        $TotalWinPoints = 0;
        $EndPoint = 0;
        $TotalCommission = 0;
        $today = date_create(date("Y-m-d"));
        $users = User::where('role', '=', 'distributor')->get();

        $fm = date('m', strtotime($_GET['from']));
        $fd = date('j', strtotime($_GET['from']));
        $fY = date('Y', strtotime($_GET['from']));
        $tm = date('m', strtotime($_GET['to']));
        $tY = date('Y', strtotime($_GET['to']));

        if (Session::get('role') == "Admin") {
            if (Session::get('is_f') == "false") {
                $agent = User::where('role', 'Admin')->where('referralId', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
                // echo "<pre>";
                // print_r($superdistributer->toArray());
                // die;
                $admin = User::where('_id', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
                if (count($agent) == 0) {
                    $game = array();
                    $game['playToWin'] = 0;
                    return view('gameProfit', ['data' => $admin,  'total' => $game]);
                } else {

                    foreach ($agent as $super) {
                        $agents[] = new \MongoDB\BSON\ObjectID($super['_id']);
                    }
                    $super_distributor = User::whereIn('referralId', $agents)->get();
                    if (count($super_distributor) == 0) {

                        $game = array();
                        $game['funroulette'] = 0;
                        $game['funtarget'] = 0;
                        $game['playToWin'] = 0;
                        return view('gameProfit', ['data' => $admin,  'total' => $game]);
                    } else {
                        foreach ($super_distributor as $pre_user) {
                            $pre[] = new \MongoDB\BSON\ObjectID($pre_user['_id']);
                        }
                        $distributor = User::whereIn('referralId', $pre)->get();
                        if (count($distributor) == 0) {

                            $game = array();
                            $game['funroulette'] = 0;
                            $game['funtarget'] = 0;
                            $game['playToWin'] = 0;
                            return view('gameProfit', ['data' => $admin,  'total' => $game]);
                        } else {
                            foreach ($distributor as $exe_user) {
                                $exe[] = new \MongoDB\BSON\ObjectID($exe_user['_id']);
                            }
                            $retailer = User::whereIn('referralId', $exe)->get();
                            if (count($retailer) == 0) {

                                $game = array();
                                $game['funroulette'] = 0;
                                $game['funtarget'] = 0;
                                $game['playToWin'] = 0;

                                return view('gameProfit', ['data' => $admin,  'total' => $game]);
                            } else {
                                foreach ($retailer as $cal_user) {
                                    $cal[] = new \MongoDB\BSON\ObjectID($cal_user['_id']);
                                }
                                $player = User::whereIn('referralId', $cal)->get();
                                foreach ($player as $player_user) {
                                    $players[] = new \MongoDB\BSON\ObjectID($player_user['_id']);
                                }
                                if (count($players) == 0) {

                                    $game = array();
                                    $game['funroulette'] = 0;
                                    $game['funtarget'] = 0;
                                    $game['playToWin'] = 0;

                                    return view('gameProfit', ['data' => $admin,  'total' => $game]);
                                } else {
                                    if ($type == 1 || $type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 8) {
                                        $td = date('j', strtotime($_GET['to']));
                                        $playPoints = Bets::whereIn('playerId', $players)
                                            ->whereBetween(
                                                'createdAt',
                                                array(
                                                    Carbon::create($fY, $fm, $fd, 00, 00, 00),
                                                    Carbon::create($tY, $tm, $td, 23, 59, 59),
                                                )
                                            )->get()
                                            ->groupBy(function ($val) {
                                                return $val->game;
                                            });
                                    } elseif ($type == 7 || $type == 6) {
                                        $to = date('n-j-Y', strtotime($_GET['to']));
                                        $playPoints = Bets::whereIn('playerId', $players)
                                            ->where('DrDate', $to)->get()->groupBy(function ($val) {
                                                return $val->game;
                                            });;
                                    }

                                    // echo "<pre>";
                                    // print_r($playPoints->toArray());
                                    // die;
                                    $game = array();

                                    $game['funroulette'] = 0;
                                    $game['funtarget'] = 0;
                                    $game['playToWin'] = 0;


                                    // echo "<pre>";
                                    // print_r($game);
                                    // die;

                                    $total = [];
                                    foreach ($playPoints as $key => $play) {
                                        $totalPlayPoints = 0;
                                        $TotalWinPoints = 0;
                                        foreach ($play as $pl) {
                                            $totalPlayPoints += $pl['bet'];
                                            $TotalWinPoints += $pl['won'];
                                        }
                                        $total[$key]['totalPlayPoints'] = $totalPlayPoints;
                                        $total[$key]['TotalWinPoints'] = $TotalWinPoints;
                                    }
                                    // echo "<pre>";
                                    // print_r($total);
                                    // die;
                                    // $profit = [];
                                    foreach ($total as $key => $to) {
                                        if (array_key_exists($key, $game)) {
                                            $game[$key] = intval($to['totalPlayPoints'] - $to['TotalWinPoints']);
                                        }
                                    }

                                    // $total['EndPoint'] =
                                    // echo "<pre>";
                                    // print_r($game);
                                    // die;
                                    return view('gameProfit', ['data' => $admin, 'total' => $game]);
                                }
                            }
                        }
                    }
                }
            } else {
                // dd('hello');

                $super_distributor = User::where('role', 'distributor')->get();
                // echo "<pre>";
                // print_r($super_distributor->toArray());
                // die;
                $admin = User::where('_id', new \MongoDB\BSON\ObjectID(Session::get('id')))->get();
                if (count($super_distributor) == 0) {
                    $game = array();
                    $game['funroulette'] = 0;
                    $game['funtarget'] = 0;
                    $game['playToWin'] = 0;

                    return view('gameProfit', ['data' => $admin,  'total' => $game]);
                } else {
                    $player = User::where('role', 'retailer')->get();
                    // dd($player);
                    foreach ($player as $player_user) {
                        $players[] = new \MongoDB\BSON\ObjectID($player_user['_id']);
                    }

                    // dd($players);
                    // $test = Bets::where('retailerId', MongoDB\BSON\ObjectID($players))->first();
                    // dd($test);
                    if (count($player) == 0) {
                        $game = array();
                        // $game['funroulette'] = 0;
                        // $game['funtarget'] = 0;
                        $game['playToWin'] = 0;

                        return view('gameProfit', ['data' => $admin,  'total' => $game]);
                    } else {
                        if ($type == 1 || $type == 2 || $type == 3 || $type == 4 || $type == 5 || $type == 8) {
                            $td = date('j', strtotime($_GET['to']));
                            // dd($td);
                            $playPoints = Bets::whereIn('retailerId', $players)
                                ->whereBetween(
                                    'createdAt',
                                    array(
                                        Carbon::create($fY, $fm, $fd, 00, 00, 00),
                                        Carbon::create($tY, $tm, $td, 23, 59, 59),
                                    )
                                )->get()
                                ->groupBy(function ($val) {
                                    return $val->game;
                                });
                                // dd($playPoints);
                        } elseif ($type == 7 || $type == 6) {
                            $to = date('Y-n-j', strtotime($_GET['to']));
                            // dd($to);
                            $playPoints = Bets::whereIn('retailerId', $players)
                                ->where('DrDate', $to)
                                ->get()
                                ->groupBy(function ($val) {
                                    return $val->game;
                                });
                        }

                        // echo "<pre>";
                        // print_r($playPoints->toArray());
                        // die;



                        $game = array();
                        $game['playToWin'] = 0;

                        $total = [];

                        foreach ($playPoints as $key => $play) {
                            $stringKey = strval($key); // Convert key to string
                            $totalPlayPoints = 0;
                            $TotalWinPoints = 0;

                            foreach ($play as $pl) {
                                $totalPlayPoints += $pl['bet'];
                                $TotalWinPoints += $pl['won'];
                            }

                            $total[$stringKey]['totalPlayPoints'] = $totalPlayPoints;
                            $total[$stringKey]['TotalWinPoints'] = $TotalWinPoints;
                        }

                        foreach ($total as $key => $to) {
                            if (array_key_exists($key, $game)) {
                                $game[$key] = intval($to['totalPlayPoints'] - $to['TotalWinPoints']);
                            }
                        }

                        $game = intval($total['']['totalPlayPoints'] - $total['']['TotalWinPoints']);

                        // $total['EndPoint'] =
                        // echo "<pre>";
                        // die;
                        return view('gameProfit', ['data' => $admin, 'total' => $game]);
                    }
                }
            }
        }
    }
}
