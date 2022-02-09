<?php

namespace Dzorogh\ExcelDataUpdate;

use Illuminate\Support\Facades\App;
use Laravel\Nova\Card;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToCollection;

//use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelDataUpdate extends Card
{

    public function __construct(FromCollection $export, ToCollection $import)
    {
        parent::__construct($this->component());

        App::call(function (ExportHandler $exportHandler) use ($export) {
            $exportHandler->setExport($export);
        });

        App::call(function (ImportHandler $importHandler) use ($import) {
            $importHandler->setImport($import);
        });
    }

    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/2';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'excel-data-update';
    }
}
