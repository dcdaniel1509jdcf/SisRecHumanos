$(document).ready(function(){

    $('#btn-table-excel').on('click',requestDescargar);
    function requestDescargar (){
      tableExport('testTable', 'W3C Example Table');
    }
      
 
});
