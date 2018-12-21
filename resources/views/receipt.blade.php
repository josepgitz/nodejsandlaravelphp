<!DOCTYPE html>
<style>
td 
{
    width: 50px;
}

#cssTable td 
{
    text-align: center; 
    vertical-align: middle;
}
</style>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered table-striped" >
<tr>
    <td width="24%" rowspan="2" style="width: 0%">
    <img  src="dist/img/school.png" width="155" style="height: 100px"></td>
     <td>
     <tr>
    <tr>
      <td  width="100%" rowspan="1" style="width: 0%"><b>
      {{_('J.P international school')}}
      </b>  </td>
    </tr>
    <tr>
      <td padding-right="250px" width="100%" rowspan="1" style="width: 0%"><b>
      {{_('P.o Box 151,')}}
      </b>  </td>
    </tr>
    <tr>
      <td  width="100%" rowspan="1" style="width: 0%"><b>
      {{_('Nairobi,')}}
      </b> </td>
    </tr>
    <tr>
      <td  width="100%" rowspan="1" style="width: 0%"><b>
      {{_('School Fee Receipt,')}}
      </b> </td>
    </tr>
    @foreach($feeCollection as $FeeCollections)
      <tr>
      
        <td width="100%" rowspan="1" style="width: 0%">
          {{$FeeCollections->Admission_number}}
        </td>
        <td width="100%" rowspan="1" style="width: 0%">
          {{$FeeCollections->Amount}}
        </td>
     
        <td width="100%" rowspan="1" style="width: 0%">
          {{$FeeCollections->year}}
        </td>
        <td width="100%" rowspan="1" style="width: 0%">
          {{$FeeCollections->term}}
        </td>
        <td width="100%" rowspan="1" style="width: 0%">
          {{$FeeCollections->class}}
        </td>
      </tr>
      @endforeach
    </table>
  </body>
</html>