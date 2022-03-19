<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Mapping Entity to database to get data as Eloquent model
 * @property int id
 * @property string name
 * @property string phone
 **/
class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['name', 'phone'];
}
