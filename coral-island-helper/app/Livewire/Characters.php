<?php

namespace App\Livewire;

use Livewire\Component;
use MeiliSearch\Client;

class Characters extends Component 
{
    public $npcs;
    public $query = '';
    public $results = [];

    public function mount() {
        $this->npcs = json_decode(file_get_contents(storage_path() . "/data/npcs.json"), true);
    
        $this->updateMeilisearchIndex();

        // Viser alle characters når siden er mounted
        $this->search();
    }

    // Funktion der opretter meilisearch index med characters
    public function updateMeilisearchIndex() {
        $client = new Client(env('MEILISEARCH_HOST'), env('MEILISEARCH_KEY'));
        $data = json_decode(file_get_contents(storage_path() . "/data/gift-preferences.json"), true);

        // Opretter index med navn 'characters', hvor primaryKey ved hver character er 'name'
        $index = $client->createIndex('characters', [
            'primaryKey' => 'name',
        ]);

        // Indsætter dataen i index 'characters'
        $client->index('characters')->addDocuments($data);
    }

    // Funktion der håndterer når der søges efter characters
    public function search() {
        $client = new Client(env('MEILISEARCH_HOST'), env('MEILISEARCH_KEY'));
        $index = $client->index('characters');
    
        // Søger efter characters
        $searchResults = $index->search($this->query, [
            'limit' => 58,
        ]);
        
        // Lægger søgeresultater ind i results variablen
        $this->results = $searchResults->getHits();
    }
    
    public function render() {
        return view('livewire.characters');
    }
}
