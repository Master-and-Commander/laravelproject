$(".item-carousel-btn-left").click(function(e){
    e.preventDefault();
               $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
    $.ajax({
        url: "/ajax/carousel",
        method: 'post',
        data: {
           offset: $('.item-carousel').attr('offset'),
           items: 3,
           direction: "left"
        },
        success: function(result){
            console.log('received ' + result['offset']);
          $('.animal-carousel').empty();
          let carousel = '<div class = "row item-carousel" offset = "'+parseInt(result['offset'])+'">';
          for (var i = 0; i < parseInt(result['offset']) + 1; i++) {
              carousel += '<div class="card" style="width: 18rem;"><div class="card-body"> <h5 class="card-title">hello</h5>';
              carousel += '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>';
              carousel += '<a  class="btn btn-primary">More</a> </div> </div>';        
                       
          }
          carousel += '</div>';
          $('.animal-carousel').append(carousel);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            console.log("textStatus: " + textStatus + " error: " + errorThrown + " etc: " + JSON.stringify(XMLHttpRequest));
        }     
    });
    console.log("moving to the left  " );
  }); 
  
  $(".cntrl-right, .cntrl-left, .carousel-dot ").click(function(e) {
      //$(this).closest('.alternate-carousel').attr("style", "background-color: brown; color: red");
    e.preventDefault();
    let offset = parseInt($(this).closest('.alternate-carousel').find('.alternate-item-carousel').attr('offset'));
    console.log("offset is " + offset);
    if($(this).hasClass("cntrl-right")) {
        offset = offset + 1;
    }
    else if ($(this).hasClass("carousel-dot")) {
       offset = parseInt($(this).attr("item"));
    }
    else {
        offset = offset - 1;
    }
    let counter = 0;
    $(this).closest('.alternate-carousel').find('.alternate-item-carousel').children(".alternate-item").each(function() {
       if(counter <= offset * 3 + 2 && counter >= offset * 3 ) {      
        $(this).attr("style","width: 18rem; display: block");
       }
       else {
        $(this).attr("style","width: 18rem; display: none");
       }
       counter++;
    });
    counter = 0;
    $(this).closest('.alternate-carousel').find('.item-carousel-controller').children(".carousel-dot").each(function() {
        if(counter == offset) {
            $(this).attr("src","/images/selectedbar.png");
        }
        else {
            $(this).attr("src","/images/unselectedbar.png");
        }
        
           counter++;

    });
    $(this).closest('.alternate-carousel').children('.alternate-item-carousel').attr('offset', offset);
      
  });

  $(".searchform").submit(function(e){
      e.preventDefault();
      let search = $(this).children(".searchbar").val();
      window.location.replace("/search/" + search);     
  });

  $(".arthropodiac-tab-selector").click(function(e) {
    e.preventDefault();
    console.log($(this).attr("value"));
    $(this).closest('.arthropodiac-tab-selectors').children(".arthropodiac-tab-selector").each(function() {
         $(this).removeClass("btn-primary");
         $(this).addClass("btn-secondary");
    });
    $(this).removeClass("btn-secondary");
    $(this).addClass("btn-primary");
    let classSelected = "" + $(this).attr("value");
    console.log("class selected: " + classSelected);
    $(this).closest('.arthropodiac-tab-manager').attr("selectedtab", classSelected );

    $(this).closest('.arthropodiac-tab-manager').children(".arthropodiac-tab").each(function() {
        $(this).attr("style", "display: none");
    });

    $(this).closest('.arthropodiac-tab-manager').find("."+classSelected).attr("style", "display:block");

  });