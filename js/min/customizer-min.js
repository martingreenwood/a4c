!function($){wp.customize("blogname",function(t){t.bind(function(t){$(".site-title a").text(t)})}),wp.customize("blogdescription",function(t){t.bind(function(t){$(".site-description").text(t)})}),wp.customize("header_textcolor",function(t){t.bind(function(t){"blank"===t?$(".site-title a, .site-description").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):$(".site-title a, .site-description").css({clip:"auto",color:t,position:"relative"})})})}(jQuery);