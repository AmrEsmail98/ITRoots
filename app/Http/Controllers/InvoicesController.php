<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index(){
        $invoices=Invoices::all();
        return view('invoices.index_invoices', compact('invoices'));
    }

    public function create_invoices(){
        return view('invoices.add_invoices');
    }

    public function store_invoices(Request $request){

        $invoice = count($request->invoice_id);
        if ($invoice != Null) {

            for ($i = 0; $i < $invoice; $i++) {

                $invoice = new Invoices();
                $invoice->invoice_id = $request->invoice_id;
                $invoice->product = $request->product[$i];
                $invoice->quantity = $request->quantity[$i];
                $invoice->price = $request->price[$i];
                $invoice->save();
            } // End For

        }  //End For
        $notification = array(
            'message' => 'Invoices Saved Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('invoices')->with($notification);
    }
}
