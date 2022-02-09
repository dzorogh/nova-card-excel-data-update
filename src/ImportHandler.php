<?php

namespace Dzorogh\ExcelDataUpdate;

class ImportHandler
{
    public object $import;

    public function setImport(object $import) {
        $this->import = $import;
    }

    public function getImport(): object
    {
        return $this->import;
    }
}
