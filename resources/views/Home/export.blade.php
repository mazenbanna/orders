@extends('layouts.layout')
@section('content')
<table style="visibility: hidden;">
    
    <tr>
        <td>orderID</td>
        <td>orderDate</td>
        <td>orderItemID</td>
        <td>orderItemName</td>
        <td>orderItemQuantity</td>
        <td>orderItemPrice</td>
        <td>customerFirstName</td>
        <td>customerLastName</td>
        <td>customerAddress</td>
        <td>customerCity</td>
        <td>customerZipCode</td>
        <td>customerEmail</td>
    </tr>

    @foreach($OrderList as $key=>$value)
        <tr>
            <td>{{$value["order"]["id"]}}</td>
            <td>{{$value["order"]["createdAt"]}}</td>
            <td>{{$value["id"]}}</td>
            <td>{{$value["name"]}}</td>
            <td>{{$value["quantity"]}}</td>
            <td>{{$value["basePrice"]}}</td>
            <td>{{$value["customer"]["firstName"]}}</td>
            <td>{{$value["customer"]["lastName"]}}</td>
            <td>{{$value["customer"]["addresses"][1]["address"]}}</td>
            <td>{{$value["customer"]["addresses"][1]["city"]}}</td>
            <td>{{$value["customer"]["addresses"][1]["zip"]}}</td>
            <td>{{$value["customer"]["email"]}}</td>
        </tr>
    @endforeach
</table>

<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
   

    function exportReportToExcel() {
        let table = document.getElementsByTagName("table");
        //console.log(table[0]);
        TableToExcel.convert(table[0], {
            name: `orders.csv`,
            sheet: {
                name: 'SalesReport'
            }
        });
        setTimeout(function (e) {
            window.close();
        }, 1000);
    }
    $(document).ready(function (e) {
        exportReportToExcel();
    });
</script>

@endsection
