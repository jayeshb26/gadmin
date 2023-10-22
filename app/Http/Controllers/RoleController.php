<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Retailer;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // public function showRetailerDetails($id)
    // {
    //     // Retrieve retailer details based on $id and pass them to the 'retailer.blade.php' view
    //     $retailer = Retailer::find($id);
    //     return view('userView', compact('retailer'));
    // }

    // public function showDistributorDetails($id)
    // {
    //     // Retrieve distributor details based on $id and pass them to the 'distributor.blade.php' view
    //     $distributor = Distributor::find($id);
    //     return view('distributor', compact('distributor'));
    // }

    // public function showSuperDistributorDetails($id)
    // {
    //     // Retrieve super distributor details based on $id and pass them to the 'super_distributor.blade.php' view
    //     $superDistributor = SuperDistributor::find($id);
    //     return view('super_distributor', compact('superDistributor'));
    // }
    public function getPlayerData()
    {
        // Retrieve retailer data using the User model.
        $retailerData = User::where('role', 'player')->get();

        // Pass the data to the retailer view and display it.
        return view('playerUserView', ['data' => $retailerData]);
    }

    public function getDistributorData()
    {
        // Retrieve distributor data based on the $id parameter using the User model.
        $distributorData = User::where('role', 'distributor')->get();

        // Pass the data to the distributor view and display it.
        return view('distributorUserView', ['data' => $distributorData]);
    }

    public function getSuperDistributorData()
    {
        // Retrieve super distributor data based on the $id parameter using the User model.
        $superDistributorData = User::where('role', 'super_distributor')->get();

        // Pass the data to the super_distributor view and display it.
        return view('superDistributorUserView', ['data' => $superDistributorData]);
    }
}
