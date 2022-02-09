<?php

namespace Dzorogh\ExcelDataUpdate\Http\Controllers;

use Dzorogh\ExcelDataUpdate\ExportHandler;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadController
{
    public function __invoke(ExportHandler $exportHandler): BinaryFileResponse
    {
        return Excel::download($exportHandler->getExport(), 'users.xlsx');
    }
}
