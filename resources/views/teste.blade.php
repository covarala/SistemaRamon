<!DOCTYPE html>
<html>
<body>



<button id="getCoordenadas" onclick="getLocation()">Clique Aqui</button>
<script type="text/javascript">

var x=document.getElementById("getCoordenadas");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(getPosition);
    }
  else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
  }
function getPosition(position)
  {

  var posicaoLat = position.coords.latitude
  var posicaoLon = position.coords.longitude
  x.innerHTML=
  '<form class="hidden" id="formLocalizacao" action="{{ route('formulario.localizacao') }}" method="post">'+
    '{{ csrf_field() }}'+
    '<input type="hidden" name="posicaoLon"  value="'+ posicaoLon +'">'+
    '<input type="hidden" name="posicaoLat"  value="'+ posicaoLat +'">' +
  '</form>';

  document.getElementById("formLocalizacao").submit();
  }
</script>

</body>
</html>
