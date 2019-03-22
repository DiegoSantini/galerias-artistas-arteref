/*
var myAjax = ajax();
function ajax() {
        var ajax = null;
        if (window.XMLHttpRequest) {
                try {
                        ajax = new XMLHttpRequest();
                }
                catch(e) {}
        }
        else if (window.ActiveXObject) {
                try {
                        ajax = new ActiveXObject("Msxm12.XMLHTTP");
                }
                catch (e){
                        try{
                                ajax = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        catch (e) {}
                }
        }
        return ajax;
}
function request(str) {
    //Don't forget to modify the path according to your theme
        myAjax.open("POST", "wp-content/themes/openbook-fr/galerias.php");
        myAjax.onreadystatechange = result;
        myAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        myAjax.send("search="+str);
}
function result() {
        if (myAjax.readyState == 4) {
                var liste = myAjax.responseText;
                var cible = document.getElementById('tag_update').innerHTML = liste;
                document.getElementById('tag_update').style.display = "block";
        }
}
function selected(choice){
        var cible = document.getElementById('s');
        cible.value = choice;
        document.getElementById('tag_update').style.display = "none";
}*/

jQuery(document).ready(function($) {

                $.ajax({
                        type: "POST",
                        url: load.ajax_url,
                        dataType: "json",
                        data: {
                                action: "galeria_artistas_load_ajax",
                                teste: "Oi!!"
                        },
                        success: function(data) {
                                console.log(data);
                        },
                        error: function(data){
                                console.log(data);
                        } 
                });
        
});
