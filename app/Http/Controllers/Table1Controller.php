<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table1;
use App\Models\Table2;

class Table1Controller extends Controller
{
  function index(){

        $table1 = Table1::all();
        $table2 = Table2::all();
        //, ['table1' => Table1::all(), 'table2' => Table2::all()]
        return view('welcome', ['table1' => Table1::all('item'), 'table2' => Table2::all('item')]);

  }

  function create(Request $request){
    // dd($request);
    // return $request->name;
    // return response()->json([$request->all()]);
    // return 1;
    $table_search = Table1::where('item', $request->name)->count();
    if ($table_search) {
      //Already Exists
      // return redirect('/');
      return $request;

    }

    $table1 = new Table1;
    $table1->item = $request->name;

    if ($table1->save()) {

      // return redirect('/');
      // return 'Success';
      return $request;

    }
  }

  function action1(Request $request){
    $status = '';

    // return response()->json([$request->all()]);
    if (!($request->value1)) {
      //Hasn't selected any item
      $status = 'Data Not available';

      return $status;

    }

    if(Table1::where('item', $request->value1)->delete())
    {

      if (Table2::where('item', $request->value1)->count() == 0) {

      $table2 = new Table2;
      $table2->item = $request->value1;

      if($table2->save()) {

        $status = 'Everything Success!';
        return $status;

      }

      $status = 'Something went wrong!';
      return $status;

    }

    $status = 'Data not saved';
    return $status;

    }

  }

  function action2(Request $request){

    $status = '';
        // return response()->json([$request->all()]);

    if (!($request->value2)) {
      //Hasn't selected any item
      // return redirect('/');

      $status = 'Data Not available';
      return $status;

    }

    if(Table2::where('item', $request->value2)->delete())
    {
        if (Table1::where('item', $request->value1)->count() == 0) {

    $table1 = new Table1;
    $table1->item = $request->value2;

    if ($table1->save()) {
      $status = 'Everything Success!';
      return $status;

    }

    $status = 'Data not saved';
      return $status;
    }

    $status = 'Something Went wrong!';
      return $status;
  }

  }

}
