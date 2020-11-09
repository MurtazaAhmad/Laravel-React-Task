<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
      <!-- <div class="container">
        <div class="card" style="margin-top:15px;">
          <div class="card-header">
            Items Management System
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-md-6">
            <form class="" action="{{url('/add-data')}}" method="post">
            @csrf
            <input type="text" name="item" value="" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary" name="button">Submit</button>
            </form>
            <br>
            </div>
            </div>

            <div class="row" style="margin-top:15px;">
              <div class="col-md-5">
                <form class="" action="{{url('/shift-data1')}}" method="post">
                  @csrf
                  <select class="form-control" name="item">
                    @if($table1->count() == 0)
                    <option value="" > No Item Present </option>
                    @else
                    <option value="" > Select Item </option>
                  @foreach($table1 as $row)
                  <option value="{{$row->item}}">{{$row->item}}</option>
                  @endforeach
                  @endif
                  </select>
                </div>
                <div class="col-md-2 text-center">
                  <button class="btn btn-dark" type="submit" name="table1totable2"> &#62; </button>
                </form>
                  <br/>
                  <form class="" action="{{url('/shift-data2')}}" method="post">
                    @csrf
                  <button class="btn btn-dark" name="table2totable1" type="submit"> &#60; </button>
                </div>
                <div class="col-md-5">
                  <select  class="form-control" name="item">
                    @if($table2->count() == 0)
                    <option value="" > No Item Present </option>
                    @else
                    <option value="" > Select Item </option>
                    @foreach($table2 as $row1)
                    <option value="{{$row1->item}}">{{$row1->item}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div> -->

      <!-- <div id="user"></div> -->
        <div data-text="{{$table1}}" id="table1_data">
        </div>
        <div data-text="{{$table2}}" id="table2_data">
        </div>
       <div id="index"></div>
      <!-- <div class="" id="table1"></div>
      <div class="" id="table2"></div> -->
      <!-- React root DOM -->

     <!-- <div id="index2"></div> -->
     <!-- <div id="example"></div> -->
     <!-- React JS -->
     <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
