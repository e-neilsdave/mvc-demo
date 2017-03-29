$(document).ready(function() {


   var $calendar = $('#calendar');
   var id = 10;

   $calendar.weekCalendar({
      timeslotsPerHour : 12,
      allowCalEventOverlap : true,
      overlapEventsSeparate: true,
      firstDayOfWeek : 1,
      businessHours :{start: 0, end: 24, limitDisplay: true },
      daysToShow : 7,
      height : function($calendar) {
         return $(window).height() - $("h1").outerHeight() - 1;
      },
      eventRender : function(calEvent, $event) {
         if (calEvent.end.getTime() < new Date().getTime()) {
            $event.css("backgroundColor", "#aaa");
            $event.find(".wc-time").css({
               "backgroundColor" : "#999",
               "border" : "1px solid #888"
            });
         }
      },
      draggable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      resizable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      eventNew : function(calEvent, $event) {
         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']");
         var recompenseField = $dialogContent.find("input[name='recompense']");
         var commentairesField = $dialogContent.find("textarea[name='commentaires']");
         var nbptsField = $dialogContent.find("input[name='nbpts']");


         $dialogContent.dialog({
            modal: true,
            title: "Nouvelle Offre",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
               "Enregistrer" : function() {
                  calEvent.id = id;
                  id++;
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.recompense = recompenseField.val();
                  calEvent.commentaires = commentairesField.val();
                  calEvent.nbpts = nbptsField.val();

                  $calendar.weekCalendar("removeUnsavedEvents");
                  $calendar.weekCalendar("updateEvent", calEvent);
                  
                  if ((calEvent.title!='')&&(calEvent.recompense!='')&&(calEvent.nbpts!=''))
                  {
                	  
                	  var start_date = calEvent.start.getDate();
                	  var start_month = calEvent.start.getMonth();
                	  start_month++;  
                	  var start_year = calEvent.start.getFullYear();
                	  
                	  var start_hour = calEvent.start.getHours();
                	  var start_minutes = calEvent.start.getMinutes();
                	  var formattedStart = start_date + "-" + start_month + "-" + start_year + " " + start_hour + ":" + start_minutes + ":00";
                	  
                	  var end_date = calEvent.end.getDate();
                	  var end_month = calEvent.end.getMonth();
                	  end_month++;  
                	  var end_year = calEvent.end.getFullYear();
                	  
                	  var end_hour = calEvent.end.getHours();
                	  var end_minutes = calEvent.end.getMinutes();
                	  var formattedEnd = end_date + "-" + end_month + "-" + end_year + " " + end_hour + ":" + end_minutes + ":00";
         
                	  $.ajax({
                    	  type: "POST",
                    	  url: Routing.generate('add_offres'),
                    	  data: { start: formattedStart, end: formattedEnd, title: calEvent.title, recompense: calEvent.recompense, nbpts: calEvent.nbpts, commentaires: calEvent.commentaires },
    	                  success: function(data, textStatus, xhr) {
    	                	  calEvent.id = data.id;
//    	                	  alert(calEvent.id);
    	                  },
    	                  error: function(xhr, textStatus, errorThrown) {
//    	                   alert("nooo");
    	                  }
                      });
                	  $dialogContent.dialog("close");
                  }
                  
               },
               cancel : function() {
                  $dialogContent.dialog("close");
               }
            }
         }).show();

         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));

      },
      eventDrop : function(calEvent, $event) {
      },
      eventResize : function(calEvent, $event) {
      },
      eventClick : function(calEvent, $event) {

         if (calEvent.readOnly) {
            return;
         }

         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
         var recompenseField = $dialogContent.find("input[name='recompense']").val(calEvent.recompense);
         var commentairesField = $dialogContent.find("textarea[name='commentaires']");
         var nbptsField = $dialogContent.find("input[name='nbpts']").val(calEvent.nbpts);
         commentairesField.val(calEvent.commentaires);

         $dialogContent.dialog({
            modal: true,
            title: "Edit - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
               "Modifier" : function() {

                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.recompense = recompenseField.val();
                  calEvent.commentaires = commentairesField.val();
                  calEvent.nbpts = nbptsField.val();

                  $calendar.weekCalendar("updateEvent", calEvent);
                  if ((calEvent.title!='')&&(calEvent.recompense!='')&&(calEvent.nbpts!=''))
                  {
                	  
                	  var start_date = calEvent.start.getDate();
                	  var start_month = calEvent.start.getMonth();
                	  start_month++;  
                	  var start_year = calEvent.start.getFullYear();
                	  
                	  var start_hour = calEvent.start.getHours();
                	  var start_minutes = calEvent.start.getMinutes();
                	  var formattedStart = start_date + "-" + start_month + "-" + start_year + " " + start_hour + ":" + start_minutes + ":00";
                	  
                	  var end_date = calEvent.end.getDate();
                	  var end_month = calEvent.end.getMonth();
                	  end_month++;  
                	  var end_year = calEvent.end.getFullYear();
                	  
                	  var end_hour = calEvent.end.getHours();
                	  var end_minutes = calEvent.end.getMinutes();
                	  var formattedEnd = end_date + "-" + end_month + "-" + end_year + " " + end_hour + ":" + end_minutes + ":00";
         
                	  $.ajax({
                    	  type: "POST",
                    	  url: Routing.generate('update_offres'),
                    	  data: { id: calEvent.id, start: formattedStart, end: formattedEnd, title: calEvent.title, recompense: calEvent.recompense, nbpts: calEvent.nbpts, commentaires: calEvent.commentaires },
    	                  success: function(data, textStatus, xhr) {
//    	               	   alert(calEvent.start);
    	                  },
    	                  error: function(xhr, textStatus, errorThrown) {
//    	                   alert("nooo");
    	                  }
                      });
                	  
                	  $dialogContent.dialog("close");
                  }
               },
               "Supprimer" : function() {
                  $calendar.weekCalendar("removeEvent", calEvent.id);
            	  $.ajax({
                	  type: "POST",
                	  url: Routing.generate('delete_offres'),
                	  data: { id: calEvent.id },
	                  success: function(data, textStatus, xhr) {
//	               	   alert(calEvent.start);
	                  },
	                  error: function(xhr, textStatus, errorThrown) {
//	                   alert("nooo");
	                  }
                  });
                  $dialogContent.dialog("close");
               },
               "Annuler" : function() {
                  $dialogContent.dialog("close");
               }
            }
         }).show();

         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
         $(window).resize().resize(); //fixes a bug in modal overlay size ??

      },
      eventMouseover : function(calEvent, $event) {
      },
      eventMouseout : function(calEvent, $event) {
      },
      noEvents : function() {

      },
      data : function(start, end, callback) {
         callback(getEventData());
      }
   });

   function resetForm($dialogContent) {
      $dialogContent.find("input").val("");
   }

   function getEventData() {

	   $.ajax({
           url: Routing.generate('retrieve_offres'),
           type: 'POST',
           async: false,
           success: function(data, textStatus, xhr) {
        	   events = data;
        	   
        	   $.each(events, function(i, item) {
        		   item["start"]=new Date(item.startyear, item.startmonth-1, item.startday, item.starthour, item.startminute);
        		   item["end"]=new Date(item.endyear, item.endmonth-1, item.endday, item.endhour, item.endminute);
//        		   console.log(events);
        		 });
        	   
           },
           error: function(xhr, textStatus, errorThrown) {
        	   alert("Erreur durant le chargement des offres! Try again later!");
           }
       });
	   
	   return (events) ;

   }


   /*
    * Sets up the start and end time fields in the calendar event
    * form for editing based on the calendar event being edited
    */
   function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {

      for (var i = 0; i < timeslotTimes.length; i++) {
         var startTime = timeslotTimes[i].start;
         var endTime = timeslotTimes[i].end;
         var startSelected = "";
         if (startTime.getTime() === calEvent.start.getTime()) {
            startSelected = "selected=\"selected\"";
         }
         var endSelected = "";
         if (endTime.getTime() === calEvent.end.getTime()) {
            endSelected = "selected=\"selected\"";
         }
         $startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
         $endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");

      }
      $endTimeOptions = $endTimeField.find("option");
      $startTimeField.trigger("change");
   }

   var $endTimeField = $("select[name='end']");
   var $endTimeOptions = $endTimeField.find("option");

   //reduces the end time options to be only after the start time options.
   $("select[name='start']").change(function() {
      var startTime = $(this).find(":selected").val();
      var currentEndTime = $endTimeField.find("option:selected").val();
      $endTimeField.html(
            $endTimeOptions.filter(function() {
               return startTime < $(this).val();
            })
            );

      var endTimeSelected = false;
      $endTimeField.find("option").each(function() {
         if ($(this).val() === currentEndTime) {
            $(this).attr("selected", "selected");
            endTimeSelected = true;
            return false;
         }
      });

      if (!endTimeSelected) {
         //automatically select an end date 2 slots away.
         $endTimeField.find("option:eq(1)").attr("selected", "selected");
      }

   });


   var $about = $("#about");

   $("#about_button").click(function() {
      $about.dialog({
         title: "About this calendar demo",
         width: 600,
         close: function() {
            $about.dialog("destroy");
            $about.hide();
         },
         buttons: {
            close : function() {
               $about.dialog("close");
            }
         }
      }).show();
   });


});