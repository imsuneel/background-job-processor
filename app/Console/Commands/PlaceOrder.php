<?php

namespace App\Console\Commands;

use App\Jobs\OrderProcessing;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Facades\Validator;

class PlaceOrder extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:place {email : email of the user} {amount : amount of this order}';

    /**
     * The console command using for placing order.
     *
     * @var string
     */
    protected $description = 'Placing a Order with email and order amount';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->validateOptions();

        $userEmail = $this->argument('email');
        $orderAmount = $this->argument('amount');

        $order = Order::create(
            [
                'email' => $userEmail,
                'order_amount' => $orderAmount,
            ]
        );

        if ($order) {
            OrderProcessing::dispatch($order);

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }

    protected function validateOptions(): ?array
    {
        $validator = Validator::make($this->argument(), [
            'email' => ['required', 'email'],
            'amount' => ['required', 'decimal:2'],
        ]);

        if ($validator->fails()) {
            $this->error('Whoops! The given options are invalid.');

            collect($validator->errors()->all())
                ->each(fn ($error) => $this->line($error));
            exit;
        }

        return $validator->validated();
    }
}
