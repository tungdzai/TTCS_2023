<?php

namespace App\Console\Commands;

use App\Models\Products;
use App\Models\Users;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductMail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

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
        $products = Products::select('id', 'name', 'sku', 'stock', 'expired_at')->where('stock', '<', 10)->get();
        $emails = Users::pluck('email')->toArray();
        foreach ($emails as $email) {
            Mail::to($email)->send(new ProductMail($products));
        }
        $this->info('Product notification sent to all users.');
    }
}
