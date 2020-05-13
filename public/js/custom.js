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
  
  $(".cntrl-right, .cntrl-left").click(function(e) {
      console.log("control right");
    e.preventDefault();
    let offset = parseInt($('.alternate-item-carousel').attr('offset'));
    if($(this).hasClass("cntrl-right")) {
        offset = offset + 1;
    }
    else {
        offset = offset - 1;
    }
    let counter = 0;
    $(".alternate-item").each(function() {
       if(counter <= offset * 3 + 2 && counter >= offset * 3 ) {      
        $(this).attr("style","width: 18rem; display: block");
       }
       else {
        $(this).attr("style","width: 18rem; display: none");
       }
       counter++;
    });
    $('.alternate-item-carousel').attr('offset', offset);
      
  });
