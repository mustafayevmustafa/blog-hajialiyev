$(document).ready(function(){

    $(window).scroll(()=>{

        
        if( $(window).scrollTop()>5000 ){
            $('.scroll_bottom_message').css({'transform':'translateX(0%) translateY(-60%)'});
        }

    })

    $('.close_message_btn').on('click',function(){
        $('.scroll_bottom_message').css({'transform':'translateX(-100%) translateY(-60%)',});

        setTimeout(()=>{
            $('.scroll_bottom_message').css({'display':'none'})
        },400)

    })



});