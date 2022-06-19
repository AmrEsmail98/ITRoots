<div class="text-center ">
    <a href="{{ route('create.invoices') }}" class="mt-4 btn btn-dark">Create Invoice</a>
</div>
<table class="table mt-4 ml-5" style="width: 180vh">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Product</th>
        <th scope="col">Quantity</th>
        <th scope="col">price</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($invoices as $invoice)

        <tr>
          <td>{{$invoice->id}}</td>
          <td>{{$invoice->product}}</td>
          <td>{{$invoice->quantity}}</td>
          <td>{{$invoice->price}}</td>
          <td>


          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
