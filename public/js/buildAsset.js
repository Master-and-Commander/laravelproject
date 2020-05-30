let article = new Array();
let sectionCounter = 0;
let data = new Array();

$(".togglebuildsteps").on("click change",function (e) {
   
    let next = $(this).attr("setnext");
    let newprevious = $(this).closest(".buildobject").attr("step");
    // set the next step
    $(this).closest(".buildobject").find("." + newprevious).attr("next", next);
    
    // make sure the next step knows what the previous step was
    $(this).closest(".buildobject").find("." + next).attr("previous", newprevious);
    
});
$(".arthropodiac-required").on("click change", function(e) {
    // check if required fields are finished before un - disabling
    let current = $(this).closest(".buildobject").attr("step");
    let disable = true;

    $(this).closest(".buildobject").find("." + current).children(".arthropodiac-required").each(function() {
        
        switch($(this).attr("mode")) {
            case("check") :
            let ready = false;
            $(this).children(".custom-control").each(function() {
                if ($(this).find("input").prop("checked")) {ready = true;}
            });
            if (!ready) {
                disable = false;
            }
            break;
            case("fill") :
              if ($(this).find("input").val().length < 5) {
                  disable = false;
              }
            break;
            case("amount") :
            break;
            case("database") :
            break;
            case("article") :
              if(article.length < 3) {
                  disable = false;
                  
              }
            break;
        }
    });

    // make sure current step is marked as ready and next button is not 
    
    if(disable) {
        $(this).closest(".buildobject").find("." + current).attr("ready", "true");
        $(this).closest(".buildobject").find(".arthropodiac-build-step-next").removeClass("disabled");
    }

    // if not make sure next step is marked not ready and next button is disabled
    else {
        $(this).closest(".buildobject").find("." + current).attr("ready", "false");
        $(this).closest(".buildobject").find(".arthropodiac-build-step-next").addClass("disabled");
    }

});

function fetchStep(classString) {
   var startingIndex = classString.search('arthropodiac-step-');
   var returnString = classString.substring(startingIndex);
   var returnString = returnString.trim();
   return returnString;
}

$(".arthropodiac-build-step-next, .arthropodiac-build-step-previous").click(function(e) {
    
   e.preventDefault();
   if($(this).hasClass("disabled")) {
    return;
  }
   let lastStep = false;
   let current = $(this).closest(".buildobject").attr("step");
   let currentElement = $(this).closest(".buildobject").find("."+current);
   let inputClass = "";
   let entry = "";
   let next = 0;    
   
   if ( $(this).closest(".buildobject").find("." + ( $(this).closest(".buildobject").attr("step"))).hasClass("last-step") && ($(this).hasClass("arthropodiac-build-step-next"))) 
   {
    console.log("this was the last step");
    lastStep = true;
    $("input").each(function(){
        inputClass = fetchStep("" + $(this).closest(".arthropodiac-build-step").attr("class"));
        entry = {class: inputClass, value: $(this).val(), id: $(this).attr("id") };
        data.push(entry);
        console.log("entry " + entry);
 
    });
   }   
        
    if ($(this).hasClass("arthropodiac-build-step-next")&& (!lastStep)) {
        next = $(this).closest(".buildobject").children("." + current).attr("next");
        $(this).closest(".arthropodiac-build-step-controller").find(".arthropodiac-build-step-previous").removeClass("disabled");
        
        // if next step is not ready then disable next button
        if("true" != $(this).closest(".buildobject").find("." + next).attr("ready")) {
            $(this).closest(".arthropodiac-build-step-controller").find(".arthropodiac-build-step-next").addClass("disabled");
        }
    }
    else if ($(this).hasClass("arthropodiac-build-step-previous")) {
        next = $(this).closest(".buildobject").children("." + current).attr("previous");
        // make sure that next is not disabled
        $(this).closest(".arthropodiac-build-step-controller").find(".arthropodiac-build-step-next").removeClass("disabled");
    }
    if(lastStep) {
        submitForm();
    }
    else {
        $(this).closest(".buildobject").children(".arthropodiac-build-step").each(function(){
            if($(this).hasClass(next)) {$(this).attr("style", "display: block");}
            else {$(this).attr("style", "display: none");}
        });
        $(this).closest(".buildobject").attr("step", next);
        if ($(this).closest(".buildobject").attr("step") == "arthropodiac-step-1" ) {
            $(this).closest(".arthropodiac-build-step-controller").find(".arthropodiac-build-step-previous").addClass("disabled");
        }  
    }
    
    
});

$(".article-builder").click(function (e) {
    let articleControllerNode = $(this).closest(".arthropodiac-step-7").find(".article-controller");
    let currentSelection = parseInt(articleControllerNode.attr('section-selected'));
    let preview = "";
    let editingSection = false;
    let entry = "";
    article.forEach(function(item, index) {
        if(item.counter == currentSelection) {editingSection = true;}         
      });
    // if title add title to preview and make display  none and now show the section option
    if (currentSelection == 0) {entry = {type:"title", counter: 0, header:$("#article-title").val(), content:$("#article-introduction").val()};}
    else {
        entry = {type:"section",  counter: currentSelection, header:$("#section-header").val(), content:$("#section-content").val()};
        $("#section-header").val("");
        $("#section-content").val("");
      }
    // treat edited section differently
    if(editingSection) {article[currentSelection] = entry;}
    else {article.push(entry);}
    // update preview
    article.forEach(function(item, index) {
        if(item.type == "title") {
            preview += "<h1 class='article-title'>"+ item.header+"</h1>" + "<div class='row'> <p class='article-intro-content'>"+ item.content + "</p>";
            preview +=  "<button type='button' class='btn btn-secondary edit-section-button' onclick='editSection("+ item.counter +")' > Edit Title </button> </div>";
         }
         else {
            preview += "<h2 class='article-section-title'>"+ item.header+"</h2>" +"<div class='row'> <p class='article-section-content'>"+ item.content + "</p>";
            preview +=  "<button type='button' class='btn btn-secondary edit-section-button' onclick='editSection("+ item.counter +")' > Edit Section </button> </div>";
         }
      });
      $(".article-preview").empty().append(preview);
      $(".initial-article").attr("style", "display:none");
      $(".next-section").attr("style", "display:block");
     // update next step if need be    
     if(!editingSection) {sectionCounter++;}
     articleControllerNode.attr('section-selected', sectionCounter);
    });

function editSection(sectionStep) {
  $(".arthropodiac-step-7").find(".article-controller").attr('section-selected', ""+sectionStep);
  if(sectionStep == 0) {
      $(".initial-article").attr("style", "display:block");
      $(".next-section").attr("style", "display:none");
  }
  else {
      $("#section-header").val(article[sectionStep].header);
      $("#section-content").val(article[sectionStep].content);
  }
}

function submitForm() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/ajax/buildspecific",
        method: 'post',
        data: {
           intent: $("input[name='addingoptions']:checked").attr("id"),
           article: article,
           data: data
        },
        success: function(result){
            console.log('received ' + result['debug']);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            console.log("textStatus: " + textStatus + " error: " + errorThrown + " etc: " + JSON.stringify(XMLHttpRequest));
        }     
    });
    console.log("submitting the form  " );
}