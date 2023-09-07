<?php

namespace DDD\Infrastructure\Kafka\Commands;

use DDD\Application\IntegrationClients\KafkaClient;
use Illuminate\Console\Command;

class KafkaConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kafka consumer';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $kafkaConsumer = KafkaClient::make();

        while (true) {
            $kafkaConsumer->subscribe(['default']);

            $message = $kafkaConsumer->consume(120 * 1000);

            dd($message);
        }
    }
}
