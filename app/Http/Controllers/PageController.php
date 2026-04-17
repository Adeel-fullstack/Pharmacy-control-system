<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salebilling;
use Barryvdh\DomPDF\Facade\Pdf; // Use full namespace for safety

class PageController extends Controller
{
    public function downloadPdf($order_id)
    {
        // Retrieve sales for the current order
        $sales = Salebilling::with(['stock'])
            ->where('order_id', $order_id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($sales->isEmpty()) {
            return redirect()->back()->with('error', 'No sales found for this order.');
        }

        // Sanitize and encode medicine names to UTF-8
        $sales->transform(function ($sale) {
            if (isset($sale->stock->medicineName)) {
                $sale->stock->medicineName = mb_convert_encoding($sale->stock->medicineName, 'UTF-8', 'auto');
            }
            return $sale;
        });

        // Calculate the total bill for the current order
        $total_bill = $sales->sum('total_price');

        // Load the PDF view
        $pdf = Pdf::loadView('livewire.receipt-pdf', [
            'sales' => $sales,
            'total_bill' => $total_bill,
            'order_id' => $order_id,
        ]);

        // Optional: set paper size and encoding
        $pdf->setPaper([0, 0, 220, 310], 'portrait');
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        $pdf->setOption('encoding', 'UTF-8');

        // Return the PDF for download
        return $pdf->download('receipt_' . $order_id . '.pdf');
    }
}
