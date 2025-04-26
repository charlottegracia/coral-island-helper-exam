<?php

namespace App\Livewire;

use Livewire\Component;
use MeiliSearch\Client;

class Recipes extends Component {
    public $recipes;
    public $query = '';
    public $results = [];
    public $randomRecipe;

    public function mount() {

        $this->updateMeilisearchIndex();

        // Viser 50 opskrifter når siden er mounted
        $this->search();
    }
    
    // Funktion der opretter meilisearch index med opskrifter
    public function updateMeilisearchIndex() {
        $client = new Client(env('MEILISEARCH_HOST'), env('MEILISEARCH_KEY'));
        $data = json_decode(file_get_contents(storage_path() . "/data/cooking-recipes.json"), true);
        
        // Opretter index med navn 'recipes', hvor primaryKey ved hver opskrift er 'cookingKey'
        $index = $client->createIndex('recipes', [
            'primaryKey' => 'cookingKey',
        ]);

        $documents = []; // Opretter et tomt array til documents

        // Foreach loops til at komme ind til opskrifterne i json filen
        foreach ($data as $utensils) {
            foreach ($utensils as $utensil => $recipes) {
                foreach ($recipes as $recipe) {
                    $documents[] = $recipe; // Indsætter hver opskrift i documents array
                }
            }
        }

        // Tilføjer documents til meilisearch 'recipes' index
        $client->index('recipes')->addDocuments($documents);
    }


    // Funktion der håndterer når der søges efter opskrifter
    public function search() {
        $client = new Client(env('MEILISEARCH_HOST'), env('MEILISEARCH_KEY'));
        $index = $client->index('recipes');
    
        // Søger efter opskrifter
        $searchResults = $index->search($this->query, [
            'limit' => 50, // Viser max 50 af gangen
        ]);
        
        // Lægger søgeresultater ind i results variablen
        $this->results = $searchResults->getHits();
    }

    // Funktion der finder en tilfældig opskrift
    public function findRandomRecipe() {
        $this->query = '';
        $this->search();

        $client = new Client(env('MEILISEARCH_HOST'), env('MEILISEARCH_KEY'));
        $index = $client->index('recipes');

        // Henter alle opskrifter fra index 'recipes'
        $searchResults = $index->search($this->query, [
            'limit' => 105,
        ]);

        // Opretter et tilfældigt nummer og bruger det til at finde en tilfældig opskrift
        $randomNumber = rand(0, count($searchResults->getHits()) - 1);
        $this->randomRecipe = $searchResults->getHits()[$randomNumber];
    }
    
    public function render() {
        return view('livewire.recipes');
    }
}

