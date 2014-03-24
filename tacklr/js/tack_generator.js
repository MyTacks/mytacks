function make_new_tack(_div, _title,_content, _feedback){

    document.write("called");
    // make the title div
    var title = $( "<div/>", {
    "class":"tack_title",
    text: "Tack Title: " + _title,
    id: "ex_tack_title"
    });

var frame = $( "<iframe />", {
    "class":"tack_content",
    source:"http://www.youtube.com/embed/NM4Rph7eeP4",
    id: "ex_tack_content"
    });

var feedback = $( "<div/>", {
    "class":"tack_feedback",
    text: _feedback,
    id: "ex_tack_feedback"
    });

var new_tack = $("<div/>", {
    "class":"board_tack",
    id: _title
    }).append(title).append(frame).append(feedback);

document.write(($('#boards').attr('id')));
$('#boards').prepend(_title+_content+_div);

document.write(("should be appended"));

$(".board_tack").draggable();
$(".board_tack").resizable();

};