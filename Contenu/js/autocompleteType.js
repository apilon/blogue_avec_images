$(function() {
    
    //autocomplete
    $("#auto").autocomplete({
        source: "index.php?controleur=Types&action=index",
        minLength: 1
    });                

});



