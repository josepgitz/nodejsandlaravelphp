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
    <img  src="dist/img/photo4.jpg" width="155" style="height: 51px"></td>
     <td>
     <tr>
    <tr>
      <td  width="50%" rowspan="1" style="width: 0%"><b>
      {{_('Church Blaze Group')}}
      </b>  </td>
    </tr>
    <tr>
      <td padding-right="250px" width="50%" rowspan="1" style="width: 0%"><b>
      {{_('P.o Box 151,')}}
      </b>  </td>
    </tr>
    <tr>
      <td  width="50%" rowspan="1" style="width: 0%"><b>
      {{_('Nairobi,')}}
      </b> </td>
    </tr>
    <tr>
      <td  width="50%" rowspan="1" style="width: 0%"><b>
      {{_('CATEGORY REPORT,')}}
      </b> </td>
    </tr>
    @foreach($category as $categories)
      <tr>
    
        <td width="20%" rowspan="1" style="width: 0%">
          {{$categories->catname}}
        </td>
        <td width="20%" rowspan="1" style="width: 0%">
          {{$categories->catcode}}
        </td>
     
        <td width="20%" rowspan="1" style="width: 0%">
          {{$categories->catdescription}}
        </td>
        <td width="20%" rowspan="1" style="width: 0%">
          {{$categories->catstatus}}
        </td>
      </tr>
      @endforeach
    </table>
  </body>
</html>