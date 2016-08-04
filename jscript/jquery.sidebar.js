(function($){
    $.fn.extend({
        sidebar : function(options){
            var defaults = {
                text	: "Follow",
                html	: "",
                size	: "25px",
                length	: "100px",
				margin	: "130px",
				position: "left",
				fadding : "0.2",
				openURL : "",
				img		: ""
            };
            
			var options = $.extend(defaults, options);		
			return this.each(function() {

				var obj = $(this);
				
				var text	 = options.text
				var html	 = options.html
				var size	 = options.size
				var length	 = options.length
				var position = options.position
				var margin	 = options.margin
				var fadding  = options.fadding
				var onClickFn= options.onClick
				var openURL  = options.openURL
				var img		 = options.img
				var words,eachword
				
				$("<div class='sidebar'>"+text+"</div>").prependTo($("body")).fadeTo("fast",fadding);

				if(position == "left"){
					$(".sidebar").css("left","0px")
					.css("top",margin)
					.css("height",length)
					.css("width",size)
					.css("-moz-border-radius-topleft","0px")
					.css("-moz-border-radius-bottomleft","0px")
					.css("text-align","center")
					.css("border-left","0px");
				}
				else if(position == "right"){
					$(".sidebar").css("right","0px")
					.css("height",length)
					.css("top",margin)
					.css("-moz-border-radius-topright","0px")
					.css("-moz-border-radius-bottomright","0px")
					.css("border-right","0px")
					.css("text-align","center")
					.css("width",size);
				}
				else if(position == "bottom"){
					$(".sidebar").css("bottom","0px")
					.css("margin-left",margin)
					.css("width",length)
					.css("height",size)
					.css("-moz-border-radius-bottomleft","0px")
					.css("-moz-border-radius-bottomright","0px")
					//.css("padding-top",parseInt($(".sidebar").height() / 8))
					.css("border-bottom","0px");
				}
				else if(position == "top"){
					$(".sidebar").css("top","0px")
					.css("margin-left",margin)
					.css("width",length)
					.css("height",size)
					.css("-moz-border-radius-topleft","0px")
					.css("-moz-border-radius-topright","0px")
					.css("border-top","0px");
				}
	
				if(position == "left" || position == "right"){
					// check if image provided or not
					if(html !== ""){
						// if html provided, insert it directly
						$(".sidebar").html('<span class="sidebar-words">'+html+'</span>');
          }else if(img == ""){
						$(".sidebar").html($("<ul class='sidebar-words'></ul>"));
						for(i=1;i<=text.length;i++)
							{
								eachword = text.substring((i - 1), i);
								//alert(eachword);
								if(eachword == " ") eachword = "&nbsp;"
								$(".sidebar-words").append($("<li>"+eachword+"</ul>"));
							}
					}else{
						// if image provided then put image directly
						$(".sidebar").html('<span class="sidebar-words"><img src="'+img+'"></span>');
					}
				  // if position is other than left or right
				  }else{
						$(".sidebar").html('<span class="sidebar-words">'+text+'</span>').css("display","table");
						$(".sidebar-words").css("display","table-cell")
						.css("vertical-align","middle");
;
				}

				$(".sidebar").mouseenter(function(){
					if($(this).css("opacity") == fadding)
						$(this).fadeTo("fast","1");
				});
				$(".sidebar").mouseleave(function(){
					if($(this).css("opacity") == "1")
						$(this).fadeTo("fast",fadding);
				});
				$(".sidebar").click(function(){
					if(openURL.length && openURL != "")
					{
						var regUrl = /^(((ht|f){1}(tp:[/][/]){1})|((www.){1}))[-a-zA-Z0-9@:%_\+.~#?&//=]+$/;
						if(regUrl.test(openURL) == false)
							alert("Invalid URL format");
						else
						{
							// check if there is "http://" if not them add it mannually
							openURL.indexOf('http://') == -1 ? openURL = "http://"+openURL : openURL = openURL;
							window.open(openURL,"", "");
						}
					}
				});
			});
		}
    });	
}) (jQuery);