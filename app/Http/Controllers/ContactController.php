<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Contact $contact)
    {
        try {
            return response()->json([
                'message' => 'success',
                'code' => '200',
                'result' => $contact->geAllContacts()
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' =>  $th->getMessage()], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contact $contact)
    {

        // validate

        $validate = $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:contacts',
            'address' => 'required|string',
        ]);

        //   post data
        try {
            $store = $contact->storeData($request->name,  $request->phone, $request->email, $request->address);
            return response()->json([
                'message' => 'created',
                'code' => 201,
                'result' => $store
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to create contacts', $th], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact, $id)
    {
        try {

            $dt = $contact->find($id);
            if (!$dt->count()) {
                return;
            }
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'result' => $dt
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Contact not found', 'code' => 404], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:contacts,email,' .  $id . 'id',
            'address' => 'required|string',
        ]);
        try {
            $store = $contact->updateData($id, $request->name,  $request->phone, $request->email, $request->address);
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Contact successfully updated'
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to update contacts', 'code' => 409], 409);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, $id)
    {
        try {

            $deletedData = $contact->findOrFail($id)->delete();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => "data successfully deleted",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to delete contact', 'code' => 409], 409);
        }
    }
}
