;(function($) {
    $.preloadImages = function(images, func) {        
        var i = 0;
        var cache = [];
        var loaded = 0;
        var num = images.length;
        
        for ( ; i < num; i++ ) (function(i) {
            var new_image = $('<images/>').attr('src', images[i]).load(function(){
                loaded++;
                
                if(loaded == num)
                {                                                
                    func();                   
                }
            });						
            cache.push(new_image);
        })(i);
        
        return true;
    };
    
    $.fn.imgSlider = function(images) {        
        if (!$(this).length || $(this).length>1) {            
            return this;
        }
        
        var direction = 'right';
        var e = this;
        var timeout_id = 0;
        var in_progress = false
        var i = 0;
        var num_slides = $(e).find('.holder > li').length;
        var slide_widths = $(e).find('.holder > li:first').width();
        var speed = 200;
        var current=0;
        
        for ( ; i < num_slides; i++ ) (function(i) {            
            $(e).find('.holder > li').eq(i).css('background', 'url('+images[i]+') no-repeat');
        })(i);
        
        function slider_animate(to)
        {
            clearTimeout(timeout_id);
            timeout_id = setTimeout(auto_animate, 5000);
            in_progress = true;            
           
            var toMove = $(e).find('.holder');
            current = to;
            
            $(toMove).animate({'margin-left':'-'+(slide_widths*to)+'px'}, speed, null, function(){                
                in_progress = false;
            });          
        }
        
        $(e).find('.holder > li').hover(function(){
            clearTimeout(timeout_id);            
            $(this).find('.caption').stop().fadeTo(500, 0.8);            
        },function(){
            $(this).find('.caption').stop().fadeTo(500, 0);            
            timeout_id = setTimeout(auto_animate, 3000);            
        });
        
        function auto_animate()
        {
            if(direction == 'right')
            {
                var to = current+1;
                if(to<num_slides)
                {
                    slider_animate(to);
                }
                else
                {
                    slider_animate(0);
                    direction = 'left';
                }
            }
            else
            {
                var to = current-1;
                if(to>=0)
                {
                    slider_animate(to);
                }
                else
                {
                    slider_animate(num_slides-1);
                    direction = 'right';
                }
            }
        }
        
        $(e).find('.next').click(function(){
            if(!in_progress)
            {
                var to = current+1;
                
                if(to<num_slides)
                {
                    slider_animate(to);
                }
                else
                {
                    slider_animate(0);
                }
            }
            
            return false;
        });
        
        $(e).find('.prev').click(function(){
            if(!in_progress)
            {
                var to = current-1;
                
                if(to>=0)
                {
                    slider_animate(to);
                }
                else
                {
                    slider_animate(num_slides-1);
                }
            }
            
            return false;
        });
        
        timeout_id = setTimeout(auto_animate, 3000);
      
        return true;
    };
})(jQuery);