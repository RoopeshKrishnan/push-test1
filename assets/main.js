$(document).ready(function(){

    var base_url = $('#base').val();




$('#customer').click(function(){

    var drop1 = $('#customer').val();
    console.log(drop1)

    $.ajax({
        url : base_url + "main/fetch_rent_item",
        type: "post",
        data: {
            drop1:drop1
        },
        success: function(data){

            // console.log(data)
            var question_order_view = document.getElementById("item");

            question_order_view.innerHTML = data;
        }
    })
})


//// finding the end date of rent /////////

$('#rent_sdate').change(function(){

    var rent_sdate = $('#rent_sdate').val();
    var unit_type =  $('#unit_type').val();
    var duration =  $('#duration').val();

    $.ajax({ 
        url : base_url + "main/fetch_end_date",
        type: "post",
        data: {
            rent_sdate:rent_sdate,unit_type:unit_type,duration:duration
        },
        success: function(data){
            $('#rent_edate').val(data);
        }
    })
})


///////// find next rent date
$('#rent_assign').change(function(){

    var rent_assign = $('#rent_assign').val();
    var unit_type =  $('#unit_type').val();

    $.ajax({ 
        url : base_url + "main/fetch_nextrent_date",
        type: "post",
        data: {
            rent_assign:rent_assign,unit_type:unit_type
        },
        success: function(data){
            $('#next_rent').val(data);
        }
    })
})




    // end of document ready
})


