<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crm_details extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'agent_name',
      'call_type',
      'phone_number',
      'name',
      'query_type',
      'gender',
      'call_remarks',
      'alt_phone_number',
      'address',
      'verbatim',
     ];
}
