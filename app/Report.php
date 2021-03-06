<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Report extends Model
{
  use Searchable;

  protected $fillable = [
      'title', 'address', 'street_number'
  ];

  public function searchableAs() {
    return 'address';
  }

  // Definizione delle relazioni

  // Un report è fatto da UN solo utente
  // Uno a uno
  public function user() {
    return $this->belongsTo('App\User');
  }

  // UN report può avere UN solo codice
  // Uno a uno
  public function code() {
    return $this->belongsTo('App\Code');
  }

  // UN report può avere UNA sola zona
  // Uno a uno
  public function zone() {
    return $this->belongsTo('App\Zone');
  }

  // UN report può avere UNA sola chat
  // public function chat() {
  //   return $this->hasOne('App\Chat');
  // }

  // Un utente può fare più segnalazioni
  // Uno a molti
  public function messages()
  {
    return $this->hasMany('App\Messages');
  }
}
