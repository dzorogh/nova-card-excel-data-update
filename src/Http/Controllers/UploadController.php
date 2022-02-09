<?php

namespace Dzorogh\ExcelDataUpdate\Http\Controllers;

use Dzorogh\ExcelDataUpdate\ExportHandler;
use Dzorogh\ExcelDataUpdate\ImportHandler;
use Maatwebsite\Excel\Facades\Excel;

class UploadController
{
    public function __invoke(ImportHandler $importHandler)
    {
        Excel::import($importHandler->getImport(), request()->file('file'));

        return '1';
    }
}
