<?php

namespace App\Http\Controllers\User\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\PDF;

class DownloadController extends Controller
{
    public $products;

    public function __construct()
    {
        $this->products = Products::select('products.id', 'products.name', 'products.stock', 'categories.name AS category_name', 'products.expired_at')
            ->join('categories', 'categories.id', 'products.category_id')
            ->get();
    }

    /** handle download file PDF
     * @return mixed
     */
    public function downloadPDF()
    {
        $products = $this->products;
        if ($products->isEmpty()) {
            session()->flash("errorDownload", "Không có sản phẩm nào !");
        }
        $pdf = app(PDF::class);
        $pdf->loadView('user.Products.products-pdf', compact('products'));
        return $pdf->stream('danh_sach_san_pham.pdf');
    }

    /** handle download file csv
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadCSV()
    {
        $products = $this->products;
        if ($products->isEmpty()) {
            session()->flash("errorDownload", "Không có sản phẩm nào !");
        }
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="products.csv"',
        ];
        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Name', 'Stock', 'Category Name', 'Expiration at']);
            foreach ($products as $product) {
                fputcsv($file, [$product->id, $product->name, $product->stock, $product->category_name, $product->expired_at]);
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

}
