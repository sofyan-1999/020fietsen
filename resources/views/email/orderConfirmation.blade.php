
<h2>Bedankt voor jouw bestelling!</h2>
<br>
Beste {{ \Illuminate\Support\Facades\Auth::user()->firstname  }} ,
We hopen dat je het leuk vond om bij ons te shoppen! We sturen jou een mail zodra je bestelling verzonden is.
<br><br>
Afleveradres
<br><br>
    {{ \Illuminate\Support\Facades\Auth::user()->firstname." ".\Illuminate\Support\Facades\Auth::user()->suffix." ".\Illuminate\Support\Facades\Auth::user()->lastname }}
<br>
    {{ \Illuminate\Support\Facades\Auth::user()->street." ".\Illuminate\Support\Facades\Auth::user()->house_number. " ".\Illuminate\Support\Facades\Auth::user()->house_number_suffix }}
<br>
    {{ \Illuminate\Support\Facades\Auth::user()->zipcode." ".\Illuminate\Support\Facades\Auth::user()->city }}
<br><br>
Besteldatum: {{ \Carbon\Carbon::now()->format('d-M-Y') }}
<br><br>

<p><b>Artikelen</b></p>
{{--@foreach($products as $product)--}}
<img src="http://127.0.0.1:8000/storage/{{ $product->image->first_resized_image }}" alt="img" style="width: 125px; height: 200px;">
<br>
Productnaam: {{ $product->title }}
<br>
Aantal: {{ $order->quantity }}
<br>
Prijs: €{{ $product->price }}
<br>
<hr>
{{--@endforeach--}}
<br>
Betalingswijze: pp
<br>
Verzenden: gratis
<br>
Totaal: €{{ $order->price }}

