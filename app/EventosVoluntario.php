<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class EventosVoluntario extends Model
{

    use HasApiTokens,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date_at', 'user_id', 'codigo_evento', 'name'];

}
