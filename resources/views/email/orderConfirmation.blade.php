<h2>Bedankt voor jouw bestelling!</h2>
<br>
<b>Beste {{ Auth::user()->firstname  }},</b>
<br>
We hopen dat je het leuk vond om bij ons te shoppen! We sturen jou een mail zodra je bestelling verzonden is.
<br><br>
<table class="table" style="width:100%">
    <tr>
        <td><b>Afleveradres</b></td>
        <td style="text-align: right"><b>Bestelnummer</b></td>
    </tr>
    <tr>
        @if(Auth::user()->suffix != "")
            <td>{{Auth::user()->firstname}} {{Auth::user()->suffix}} {{Auth::user()->lastname}}</td>
        @else
            <td>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</td>
        @endif
        <td style="text-decoration: underline;text-align: right"><b>{{$order->order_id}}</b></td>
    </tr>
    <tr>
        <td>{{ Auth::user()->street." ".Auth::user()->house_number}}</td>
        @if(Auth::user()->house_number_suffix == null)
            <td style="text-align: right"><b>Besteldatum</b></td>
        @endif
    </tr>
    <tr>
        <td>{{ Auth::user()->house_number_suffix }}</td>
        @if(Auth::user()->house_number_suffix != null)
            <td style="text-align: right"><b>Besteldatum</b></td>
        @endif
    </tr>
    <tr>
        <td>{{ Auth::user()->zipcode." ".Auth::user()->city }}</td>
        <td style="text-align: right"><b>{{Carbon\Carbon::now()->format('d-M-Y')}}</b></td>
    </tr>
</table>

<p><b>Artikelen</b></p>
<hr>
<p>TODO</p>

@foreach($products as $product)
<!-- <img src="{{asset('storage/'.$product[0]->first_resized_image)}}" alt="img" style="width: 125px; height: 200px;"> -->
<b>{{ $product[0]->title }}</b>
<p style="float: right"><b>€{{$product[0]->price}},-</b></p>
<br>
<img src="<?php echo $message->embed('storage/'.$product[0]->first_resized_image); ?>" alt="img" width="140" height="57">
<span style="vertical-align: top">Aantal: {{ $order->quantity }}</span>
<br><br>
@endforeach

<hr>
<table style="width: 100%">
    <tr>
        <td>Betalingswijze</td>
        <td style="text-align: right">IDEAL</td>
    </tr>
    <tr>
        <td>Subtotaal</td>
        <td style="text-align: right">€{{$total}},-</td>
    </tr>
    <tr>
        <td>Verzending</td>
        <td style="text-align: right">TODO</td>
    </tr>
    <tr>
        <td><b>Totaal</b></td>
        <td style="text-align: right"><b>€{{$total}},-</b></td>
    </tr>
</table>
