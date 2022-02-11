<?php

namespace Dzorogh\ExcelDataUpdate\Http\Controllers;

use Dzorogh\ExcelDataUpdate\ExportHandler;
use Dzorogh\ExcelDataUpdate\ImportHandler;
use Maatwebsite\Excel\Facades\Excel;

class UploadController
{
    public function __invoke(ImportHandler $importHandler)
    {
        $import = $importHandler->getImport();
        Excel::import($import, request()->file('file'));
    }
}
