<?php

namespace App\Imports;

use App\Models\Organization;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements
    ToModel,
    WithHeadingRow,
    WithChunkReading,
    WithBatchInserts,
    ShouldQueue,
    SkipsOnFailure,
    SkipsEmptyRows,
    SkipsOnError,
    WithValidation,
    WithUpserts,
    WithProgressBar
{
    use Importable, SkipsFailures, SkipsErrors;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
        ];
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'gtin';
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $brand = new Organization(['name' => $row['brands'] ? explode(",", $row['brands']) : null]);
        return new Product([
            'name' => $row['name'] ?? $row['product_name'],
            'gtin' => $row['gtin'] ?? $row['code'],
            'size' => $row['size'] ?? $row['quantity'],
            'created_at' => $row['created_at'] ?? $row['created_t'],
            'updated_at' => $row['updated_at'] ?? $row['last_modified_t'],

            'brand' => $brand,
        ]);
    }

    public function batchSize(): int
    {
        return 1;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function prepareForValidation($data, $index)
    {
        $data['name'] = $data['name'] ?? $data['product_name'];
        $data['gtin'] = $data['gtin'] ?? $data['code'];

        return $data;
    }
}
