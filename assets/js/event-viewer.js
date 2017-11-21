
/*
Receive events in json format and print out grid. 
*/

var events_json; 

function loadEvents(event_json){
    //set global events json file
    events_json = event_json;
}

function showListOfPaginatedQuestions(event_json) {
    alert('pagED RAN!');
    alert(event_json);
    console.log(event_json);
    var table = '<table width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">Category</th><th scope="col">Type</th><th scope="col">Question</th><th scope="col">Question Description</th><th scope="col"></th></tr></thead><tbody>';

    $.each( event_json, function( index, user){     
        table += '<tr>';
        table += '<td class="edit" field="qcat_id" user_id="'+user.quest_id+'">'+user.qcat_name+'</td>';
});

$( document ).ready(function(){
    events_json = <?php echo $events_json?>;
    $('div#events').html(table);
    
});