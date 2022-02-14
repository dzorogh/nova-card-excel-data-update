# Excel Data Update Card for Laravel Nova

<img width="896" alt="image" src="https://user-images.githubusercontent.com/1428839/153859002-d3daea04-0d9d-4545-90d1-3b52c3ecb287.png">

Useful card for Laravel Nova, when you need data editing interface with a lot of mass update actions. 
In this situation, import/export to xlsx files is good option. This card provides two simple actions:
1) Run excel export script and download file
2) Upload file and run import file

# Installation
`composer require dzorogh/nova-card-excel-data-update`

Also, you must have imports and exports from popular package Laravel Excel:

`composer require maatwebsite/excel`

More docs:
https://docs.laravel-excel.com/3.1/getting-started/installation.html

# Usage

It can be used everywhere in Laravel Nova where any other **card** can be used.

For example, in `app/Nova/NovaServiceProvider.php` to show card at dashboard:
```PHP
    use Dzorogh\ExcelDataUpdate\ExcelDataUpdate;
    
    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new ExcelDataUpdate(new ExportClass, new ImportClass)
        ];
    }
```

ExportClass and ImportClass are described here: https://docs.laravel-excel.com/

## Todo
* English translation
* Uploading results
* Percents on upload and edit
* Instructions how to use with queues
* Export/Import errors
