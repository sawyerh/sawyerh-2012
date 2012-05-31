/*
 * throttledresize: special jQuery event that happens at a reduced rate compared to "resize"
 *
 * latest version and complete README available on Github:
 * https://github.com/louisremi/jquery-smartresize
 *
 * Copyright 2012 @louis_remi
 * Licensed under the MIT license.
 *
 * This saved you an hour of work? 
 * Send me music http://www.amazon.co.uk/wishlist/HNTU0468LQON
 */(function(a){var b=a.event,c,d={_:0},e=0,f,g;c=b.special.throttledresize={setup:function(){a(this).on("resize",c.handler)},teardown:function(){a(this).off("resize",c.handler)},handler:function(h,i){var j=this,k=arguments;f=!0;if(!g){a(d).animate(d,{duration:Infinity,step:function(){e++;if(e>c.threshold&&f||i){h.type="throttledresize";b.dispatch.apply(j,k);f=!1;e=0}if(e>9){a(d).stop();g=!1;e=0}}});g=!0}},threshold:0}})(jQuery);