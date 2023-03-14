<?php

namespace App\Console\Commands;

use App\Mail\CustomerMail;
use App\Mail\ProductMail;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ProductsCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:products-customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $lastMonth = Carbon::now()->subMonth();

        $totalAmount = Orders::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('total');
        $totalProducts = Orders::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('quantity');

        $emails = Users::pluck('email')->toArray();
        foreach ($emails as $email) {
            Mail::to($email)->send(new CustomerMail($totalAmount,$totalProducts));
        }
    }
}
