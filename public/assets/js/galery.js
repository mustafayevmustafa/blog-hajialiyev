$('#close_galery').on('click',()=>{

    $('.pop_up_galery').css({'display':'none '});


});



$(window).load(()=>{
    var a = $('.slick-track  #slider_elem').length;
    var count=0 ;
    for(i=1;i<=a;i++){
        if($('#slider_elem').hasClass('slick-cloned')==false){
            count=count+1;    
        }
    }
    console.log(count);
   
})