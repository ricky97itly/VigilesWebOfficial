<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public function report()
    {
      $this->belogsTo('App\Report');
    }

    public function sender()
    {
      $this->belogsTo('App\User', 'sender_id', 'id');
    }

    public function receiver()
    {
      $this->belogsTo('App\User', 'receiver_id', 'id');
    }
}
