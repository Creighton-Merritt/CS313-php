function addToCart (id) {
    var button = id;
    var original = document.getElementById(button).innerHTML;
    var changed = "Item Added";
    console.log(original, changed);
    document.getElementById(button).innerHTML = changed;
    setTimeout(function() {document.getElementById(button).innerHTML = original}, 2000); 
}


