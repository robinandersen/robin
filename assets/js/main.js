$(document).ready(function(){
    
    var timeout = 1;
    $('tr.project').hover(function() {
        $(this).stop(true, true).addClass('artHovered').fadeTo(200,1);
        fadeOutArticles();
    }, function() {
        $(this).removeClass('artHovered');
        fadeOutArticles();
    });
    function fadeOutArticles(){
        clearTimeout(timeout);
        $('tr.project').not('.artHovered').fadeTo(200,0.2, function(){
            timeout = setTimeout(function(){
                if($('tr.project.artHovered').length==0){
                    $('tr.project').stop(true, true).fadeTo(10, 1);
                }
            }, 0);
        });     
    }  


});