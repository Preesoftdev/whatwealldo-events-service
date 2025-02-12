<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function getLogs(Request $request)
    {
        // Validate request parameters
        $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
        ]);

        $logPath = storage_path('logs');
        $logFiles = scandir($logPath);
        $filteredLogs = [];

        foreach ($logFiles as $file) {
            // Check if the file is "laravel.log" (default log file)
            if ($file === 'laravel.log') {
                $logContent = file_get_contents($logPath . '/' . $file);
                $infoLogs = $this->extractInfoLogs($logContent);
                
                if (!empty($infoLogs)) {
                    $filteredLogs[] = [
                        'file_name' => $file,
                        'file_date' => 'N/A', // No specific date
                        'logs'      => $infoLogs
                    ];
                }
                continue;
            }

            // Extract date from the filename (for daily logs)
            if (preg_match('/laravel-(\d{4}-\d{2}-\d{2})\.log/', $file, $matches)) {
                $fileDate = Carbon::parse($matches[1]);

                if ($fileDate->between(Carbon::parse($request->start_date), Carbon::parse($request->end_date))) {
                    $logContent = file_get_contents($logPath . '/' . $file);
                    $infoLogs = $this->extractInfoLogs($logContent);
                    
                    if (!empty($infoLogs)) {
                        $filteredLogs[] = [
                            'file_name' => $file,
                            'file_date' => $fileDate->toDateString(),
                            'logs'      => $infoLogs
                        ];
                    }
                }
            }
        }

        // Sort logs in descending order by file_date (newest first)
        usort($filteredLogs, function ($a, $b) {
            return strcmp($b['file_date'], $a['file_date']);
        });

        return response()->json([
            'status'  => 'success',
            'message' => count($filteredLogs) > 0 ? 'Info logs retrieved successfully' : 'No info logs found in the specified date range',
            'logs'    => $filteredLogs
        ]);
    }

    /**
     * Extracts only Log::info() entries from a log file content.
     *
     * @param string $logContent
     * @return array
     */
    private function extractInfoLogs($logContent)
{
    $lines = explode("\n", $logContent);
    $infoLogs = [];

    foreach ($lines as $line) {
        if (preg_match('/\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\] .*?\.INFO:/', $line)) {
            $infoLogs[] = trim($line);
        }
    }

    // Debug: Log how many info logs are found
    \Log::debug('Extracted ' . count($infoLogs) . ' INFO logs.');

    return $infoLogs;
}

}
