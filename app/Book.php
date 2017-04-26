<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Book extends Model
{
    protected $fillable = ['state','available', 'book_reference_id'];

    public function getActualisedPriceAttribute() {
        return $this->book_reference->initial_price * (1 - ($this->state-1)/10);
    }

    public function getStateTextAttribute() {
        switch ($this->state) {
            default:
                return 'Text';
                break;
        }
    }

    public function order() {
        return $this->belongsToMany('App\Order');
    }

    public function book_reference() {
        return $this->belongsTo('App\BookReference');
    }

    public static function getAvailableBooksList() {
        $book_references = BookReference::all();

        $available_books = new Collection();

        foreach ($book_references as $book_reference) {
            if ($book_reference->available_books_amount > 0)
                $available_books->push($book_reference);
        }

        return $available_books;
    }
}
