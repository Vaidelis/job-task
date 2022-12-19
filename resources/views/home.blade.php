<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Task</title>
    </head>
    <body>
        <div>
            <pre>{{ print_r($data, true) }}</pre>

        </div>
    </body>
    <div style="float:left">
<table>
    <thead>
    <th>Expenses/driver</th>
    </thead>
    <tbody>
    @foreach($data as $k => $v)
        <tr>
            <td>{{$k}}</td>
        </tr>
    @endforeach
    <td>Total:</td>
    </tbody>
</table>
    </div>
    <div style="float:left; width: 49%">
<table>
    <thead>
    <th>Amount</th>
    <th><?php foreach ($data as $key);echo $key['name1']?></th>
    <th><?php foreach ($data as $key);echo $key['name2']?></th>
    </thead>
       @foreach($data as $key)
           <tbody>
           <tr>
        <td><?php echo $key['key1'] + $key['key2'] ?></td>
        <td>{{$key['key1']}}</td>
        <td>{{$key['key2']}}</td>
    </tr>

    @endforeach
    <tr>
        <td><?php $v = 0; foreach ($data as $key){$v = $v + $key['key1'] + $key['key2'];} echo $v ?></td>
        <td><?php $v = 0; foreach ($data as $key){$v = $v + $key['key1'];} echo $v ?></td>
        <td><?php $v = 0; foreach ($data as $key){$v = $v + $key['key2'];} echo $v ?></td>
    </tr>
    </tbody>
</table>
    </div>
<table>

</table>

</html>
