<?php

namespace Dzorogh\ExcelDataUpdate;

class ExportHandler
{
    public $export;

    public function setExport($export) {
        $this->export = $export;
    }

    public function getExport()
    {
        return $this->export;
    }
}
