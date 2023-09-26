<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }
    public function dashboard(){
        // Get the available space on the C:\ drive
        $freeSpace = disk_free_space('C:/xampp');
        $totalSpace = disk_total_space('C:/xampp');
        $usedSpace = $totalSpace - $freeSpace;
        // Convert the size to a more readable format
        $freeSpaceFormatted = round($freeSpace / 1024 / 1024 / 1024, 2) . ' GB';
        $totalSpaceFormatted = round($totalSpace / 1024 / 1024 / 1024, 2) . ' GB';
        $usedSpaceFormatted = round($usedSpace / 1024 / 1024 / 1024, 2) . ' GB';
        // Calculate the percentage of free space
        $freeSpacePercent = round(($freeSpace / $totalSpace) * 100, 2);
        $usedSpacePercent = 100 - $freeSpacePercent;

        $incoming = Document::where('status', 'incoming')->count();
        $outgoing = Document::where('status', 'outgoing')->count();
        $incomingCategories = Category::where('status', 'incoming')->count();
        $outgoingCategories = Category::where('status', 'outgoing')->count();

        


        // Pass the free space value to the view
        return view('dashboard', compact('freeSpaceFormatted', 'totalSpaceFormatted', 'freeSpacePercent', 'usedSpacePercent', 'usedSpace', 'usedSpaceFormatted', 'incoming', 'outgoing', 'incomingCategories', 'outgoingCategories')); 
    }

    public function exportDatabase() {
        $databaseName = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        
        // Set the name of the export file
        $filename = 'backup-' . date('Y-m-d-H-i-s') . '.sql';

        // Set the path of the export file
        $path = "C:/Users/HI/$filename";

        // Execute the mysqldump command
        exec("mysqldump --user=$username --password=$password --host=$host $databaseName > $path", $output, $returnVar);

        if ($returnVar === 0) {
            return response()->download($path)->deleteFileAfterSend();
        } else {
            return "Export failed.";
        }
    }

    public function importDatabase(Request $request) {
        // Get the file from the request
        $file = $request->file('file');
    
        // Set the path of the import file
        $path = $file->getPathname();
    
        // Get database credentials
        $databaseName = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
    
        // Execute the mysql command to import the file
        exec("mysql --user=$username --password=$password --host=$host $databaseName < $path", $output, $returnVar);
    
        if ($returnVar === 0) {
            return redirect()->back()->with('success', 'Import Success!');
        } else {
            return redirect()->back()->with('failed', 'Import Failed!');
        }
    }
    
}
