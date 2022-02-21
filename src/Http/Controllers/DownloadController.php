<?php

namespace Dzorogh\ExcelDataUpdate\Http\Controllers;

use Dzorogh\ExcelDataUpdate\ExportHandler;
use Maatwebsite\Excel\Facades\Excel;

class DownloadController
{
    public function __invoke(ExportHandler $exportHandler): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download($exportHandler->getExport(), 'export.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
