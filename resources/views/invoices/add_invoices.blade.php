@extends('layouts.app')

@section('pageName') Create Invoices
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('store.invoices')}}" class="mt-5">
    @csrf

    <div class="form-group">
      <label for="exampleInputEmail1" style="margin-left: 20vh">Product</label>
      <input style="width: 90vh; margin-left: 20vh" name="product[]" type="text" class="form-control" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <label style="margin-left: 20vh" for="exampleInputPassword1">Quantity</label>
      <input style="width: 90vh; margin-left: 20vh" name="quantity[]" type="text" class="form-control" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
        <label style="margin-left: 20vh" for="exampleInputPassword1">Price</label>
        <input style="width: 90vh; margin-left: 20vh" name="price[]" type="text" class="form-control" aria-describedby="emailHelp">

      </div>

      <div class="col-md-2" style="padding-top: 25px;">
        <span class="btn btn-success addeventmore"><i
                class="fa fa-plus-circle"></i> </span>
    </div>

    <button style="margin-left: 90vh;margin-top: 10vh" type="submit" class="btn btn-success">Submit</button>
  </form>


  <div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">

                <div class="form-group">
                    <label for="exampleInputEmail1" style="margin-left: 20vh">Product</label>
                    <input style="width: 90vh; margin-left: 20vh" name="product[]" type="text" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 20vh" for="exampleInputPassword1">Quantity</label>
                    <input style="width: 90vh; margin-left: 20vh" name="quantity[]" type="text" class="form-control" >
                  </div>

                  <div class="form-group">
                      <label style="margin-left: 20vh" for="exampleInputPassword1">Price</label>
                      <input style="width: 90vh; margin-left: 20vh" name="price[]" type="text" class="form-control" >

                    </div>

                <div class="col-md-2" style="padding-top: 25px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                </div><!-- End col-md-2 -->




            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", '.removeeventmore', function(event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });
    });
</script>
@endsection
