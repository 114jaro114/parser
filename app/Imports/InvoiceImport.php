<?php

namespace App\Imports;

use App\Models\Invoices;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;
// use Maatwebsite\Excel\Concerns\Importable;

class InvoiceImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading

{
  // use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoices([
          'datum' => (Date::excelToDateTimeObject($row[0])->format('d-m-Y')),
          'cislo' => $row[1],
          'predmet' => $row[2],
          'suma' => $row[3],
          'dodavatel' => $row[4],
          'ico' => $row[5],
          'adresa' => $row[6]
        ]);

        // return new Invoices([
        //   // 'datum' =>  \Carbon\Carbon::createFromFormat('m-d-Y', $row['datum']),
        //   // 'datum' => \PhpOffice\PhpSpreadsheet\Shared\Date::dateTimeToExcel($row['datum']),
        //   // 'datum' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['datum']),
        //   // 'datum' => $row['datum'],
        //   // 'datum' => $this->transformDate($row['datum']),
    }

    public function batchSize(): int {
        return 1000;
    }

    public function chunkSize(): int {
        return 1000;
    }
    public function startRow (): int {
      return 2;
    }
}
