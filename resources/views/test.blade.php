   @php
       echo $detail;
       
   @endphp

   @foreach ($detail as $r)
       {{ $r->iotModel->kelembapan }}
   @endforeach
