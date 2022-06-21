<?php

namespace App\Http\Livewire;

use App\Models\ContentDocument;
use Livewire\Component;
use MeiliSearch\Client;

class Search extends Component
{
    public ?string $search = null;
    /** @var ContentDocument[] */
    public array $hits = [];
    protected ?Client $client = null;
    protected ?string $index_name = null;

    public function getSearch()
    {
        $this->clear();
        if (! empty($this->search)) {
            $this->searchEngine();
        } else {
            $this->clear();
        }

        return $this->hits;
    }

    public function searchEngine()
    {
        $mode = config('scout.driver');
        $item = new ContentDocument();

        if ('collection' === $mode) {
            $whereLike = $item->toSearchableArray();
            $hits = ContentDocument::whereLike(array_keys($whereLike), $this->search)
                ->get()
            ;
            foreach ($hits as $hit) {
                array_push($this->hits, (object) $hit);
            }
        } else {
            $this->index_name = $item->searchableAs();
            $this->client = new Client(config('scout.meilisearch.host'), config('scout.meilisearch.key'));

            $index = $this->client->index($this->index_name);
            $hits = $index->search($this->search)->getHits();
            foreach ($hits as $hit) {
                array_push($this->hits, (object) $hit);
            }
        }
    }

    public function mount()
    {
        $this->clear();
    }

    public function doSearch()
    {
        if (! empty($this->search)) {
            $this->getSearch();
        } else {
            $this->clear();
        }
    }

    public function clear()
    {
        $this->hits = [];
    }

    public function render()
    {
        $this->clear();
        $hits = $this->getSearch();

        return view('livewire.search', compact('hits'));
    }
}
