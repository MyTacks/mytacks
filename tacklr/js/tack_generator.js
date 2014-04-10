function make_new_tack(){
//$('#do_new_tack').click(function(){

    console.log("called new tack");
    // make the title div
    var title = $( "<div/>", {
        "class":"tack_title",
        text: "Tack Title: " + 'extitle',
        id: "ex_tack_title"
    });

    var frame = $( "<iframe/>", {
        "class":"tack_content",
        text: "Tack Title: " + 'extitle',
        id: "ex_tack_title"
    });

//var frame = "<?php $this->widget(ext.Yiitube', array('v'=>'NM4Rph7eeP4')); ?>";

var feedback = $( "<div/>", {
    "class":"tack_feedback",
    text: 'feedback',
    id: "ex_tack_feedback"
    });

var new_tack = $("<div/>", {
    "class":"board_tack",
    id: 'extack'
    }).append(title).append(frame).append(feedback);

$("#boards").append(new_tack);
$(".board_tack").resizable();
$(".board_tack").draggable();

}