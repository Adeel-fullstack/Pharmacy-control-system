<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockExport implements FromCollection, WithHeadings
{
    /**
     * Return stock data for Excel export
     */
    public function collection()
    {
        return Stock::with('distributor')
            ->get()
            ->map(function ($stock) {
                return [
                    $stock->medicineName,
                    $stock->sale_price_each,
                    $stock->number_of_boxes,
                    $stock->purchase_price_box,
                    $stock->total_items,
                    $stock->distributor->distributor_name ?? '',
                ];
            });
    }

    /**
     * Excel column headings
     */
    public function headings(): array
    {
        return [
            'Medicine Name',
            'Price Per Tablet',
            'Number of Boxes',
            'Box Price',
            'Total Quantity',
            'Distributor',
        ];
    }
}
