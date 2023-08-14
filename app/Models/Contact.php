<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['name',  'phone', 'email', 'address', 'created_at', 'updated_at'];


    // Dates
    public $timestamps = false;
    protected $dateFormat = 'U';


    function geAllContacts()
    {
        return $this->paginate(5);
    }

    function storeData($name, $phone, $email,  $address)
    {

        return $this::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    function updateData($id, $name,  $email, $phone, $address)
    {

        return $this::where('id', $id)->update([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'updated_at' => Carbon::now(),
        ]);
    }
}
