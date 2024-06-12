<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function getData()
    {
        $filePath = public_path('data/malaysia_muslim_population_extended.csv');
        $data = array_map('str_getcsv', file($filePath));
        $header = array_shift($data);
        $formattedData = [];
        
        foreach ($data as $row) {
            $formattedData[] = array_combine($header, $row);
        }

        return response()->json($formattedData);
    }
}
