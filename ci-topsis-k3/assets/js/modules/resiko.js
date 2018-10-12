$(document).ready(function(){



        
        oTable=$('#datatables').dataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": false,
            "bDeferRender": true,
            "bSortClasses": false,
            "bScrollCollapse": true,    
            "bStateSave": true,
            "responsive": true,
            "aoColumns": [
                { "sClass": "id_resiko","sName": "id_resiko","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "nama_resiko", "sName": "nama_resiko", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "keterangan", "sName": "keterangan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "resiko", "sName": "resiko", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   
// $('document').ajaxComplete(function( event,request, settings ) {
// // $( "#msg" ).append( "<li>Request Complete.</li>" );
//     $('#outside').find('.panel-title').append('Selesai');
// });
//kendalikan select box/repopulate selection option with ajax
       /* $.fn.checkit=function(){
            return this.each(function(){
                if($(this).val()==($('#id_kriteria').val())){
                     $(this).attr('selected','selected');
                }
            });
        }*/


  