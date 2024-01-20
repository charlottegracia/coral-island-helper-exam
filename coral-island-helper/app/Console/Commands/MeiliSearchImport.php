<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MeiliSearchImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meilisearch:import {indexName} {filePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data into a MiliSearch index from a JSON file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $indexName = $this->argument('indexName');
        $filePath = $this->argument('filePath');

        $meilisearch = new Client(env('MEILISEARCH_HOST'), env('MEILISEARCH_KEY'));

        // Create MeiliSearch index
        $index = $meilisearch->index($indexName);
        $index->create();

        // Import data from JSON file
        $data = json_decode(file_get_contents($filePath), true);
        $index->addDocuments($data);

        $this->info("Imported data into MeiliSearch index '{$indexName}' from '{$filePath}'");
    }
}
