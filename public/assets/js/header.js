$(document).ready(function(){


            $('.aside_submenu').on('click',function(){
                if($('#collapse1').css('display')=='none'){
                    $(this).find('.fa-angle-right').css({'transform':'rotateZ(90deg)'});
                }   
                else{
                    $(this).find('.fa-angle-right').css({'transform':'rotateZ(0deg)'});
                }            
            })


            function openAside(){

                $('.aside').addClass('show');
                $('body').css({'overflow':'hidden'});
                setTimeout(function(){
                    $('.aside').css({'transform':'translateX(0%)'});
                },100)

            };

            $('.open_aside').on('click',function(){
                openAside();
            });



            $('*').on('click',function(e){

                if(!$(e.target).is('.open_aside') &&  
                !$(e.target).is('.open_aside *') &&  
                !$(e.target).is('.aside_in') && 
                !$(e.target).is('.aside_in * ') ){

                    $('.aside').css({'transform':'translateX(-100%)'});
                    $('body').css({'overflow':'scroll'});
                    setTimeout(()=>{
                        $('.aside').removeClass('show');
                    },300)
                };
                
        
            });



            $('.open_search').on('click',()=>{
                $('.search_area').css({'transform':'translateY(0%)'});
                $('.search_area_list li').addClass('visible');
                $('.search_area_title').addClass('visible');
            })


            $('.close_btn').on('click',()=>{

                $('.search_area').css({'transform':'translateY(-100%)'});
                $('.search_area_list li').removeClass('visible');
                $('.search_area_title').removeClass('visible');


            });


            $(window).scroll(()=>{
                

                if($(window).scrollTop()>=150 ){

                    $('.header').addClass('sticky');
                    $('.header_top').addClass('hidden');
                    $('.header_bottom_container').addClass('hidden');
                    $('.header_sticky').addClass('my_show'); 
                    
                   

                }

                

            })

            $(window).scroll(()=>{
                if($(window).scrollTop()<150  ){
                    
                        $('.header').removeClass('sticky');                        
                        $('.header_top').removeClass('hidden');
                        $('.header_bottom_container').removeClass('hidden');
                        $('.header_sticky').removeClass('my_show'); 
    
                    
                }
            })

            $(window).resize(()=>{
                
                if($(window).innerWidth <840 ){
                    $('.header_sticky').removeClass('my_show'); 
                }

            })

            /* Hero page sehifesinin headeri ucun istifade olunan kodlar */


            $(window).scroll(()=>{
                var a = $(window).height() + 250;
                if($(window).scrollTop()>a){
                    $('.hero_header_top  .my_btn').css({'color':'black'})
                    $('.header_top_left_logo').css({'display':'block'});
                    $('.header_top_middle').css({'display':'none '});
                }
                else{
                    $('.hero_header_top  .my_btn').css({'color':'white'})
                    $('.header_top_left_logo').css({'display':'none'});
                    $('.header_top_middle').css({'display':'block'})
                }
            })

            

})