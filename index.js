$().ready(function () {

  setTimeout(function () {
    // after 1000 ms we add the class animated to the login/register card
    $('.card').removeClass('card-hidden');
  }, 700)

  var dataTable1 = $('#level1list').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '20%' },
      { "targets": 1, width: '17.5%' },
      { "targets": 2, width: '17.5%'} ,
      { "targets": 3, width: '17.5%'} ,
      { "targets": 4, width: '17.5%'} ,
      {className: 'mdl-data-table__cell--non-numeric'},
    ],
    "responsive": true,
    "order": [[2, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "level1list.php?usersessionid="+sessionStorage.userid, // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".level1list-error").html("");
        $("#level1list").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#level1list_processing").css("display", "none");
      }
    }
  });

  var dataTable2 = $('#level2list').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '5%'},
      { "targets": 1, width: '20%'},
      { "targets": 2, width: '15%'},
      { "targets": 3, width: '10%'},
      { "targets": 4, width: "10%"} ,
      { "targets": 5, width: "10%"} ,
      {className: 'mdl-data-table__cell--non-numeric'},
    ],
    "responsive": true,
    "order": [[2, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "level2list.php?usersessionid="+sessionStorage.userid+"&userregion="+sessionStorage.region, // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".level2list-error").html("");
        $("#level2list").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#level2list_processing").css("display", "none");
      }
    }
  });

  var dataTable7 = $('#level2reportlist').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '5%' },
      { "targets": 1, width: '20%' },
      { "targets": 2, width: '15%' },
      { "targets": 3, width: '10%' },
      { "targets": 4, width: "10%" },
      { "targets": 5, width: "10%" },
      { className: 'mdl-data-table__cell--non-numeric' },
    ],
    "responsive": true,
    "order": [[2, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "level2reportlist.php?usersessionid=" + sessionStorage.userid + "&userregion=" + sessionStorage.region, // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".level2reportlist-error").html("");
        $("#level2reportlist").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#level2reportlist_processing").css("display", "none");
      }
    }
  });

  var dataTable3 = $('#level3list').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '7%'},
      { "targets": 1, width: '25%'},
      { "targets": 2, width: '15%'},
      { "targets": 3, width: '15%'},
      { "targets": 4, width: '15%'},
      { "targets": 5, width: '15%'},
      {className: 'mdl-data-table__cell--non-numeric'},
    ],
    "responsive": true,
    "order": [[2, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "level3list.php?usersessionid="+sessionStorage.userid+"&userregion="+sessionStorage.region, // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".level3list-error").html("");
        $("#level3list").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#level3list_processing").css("display", "none");
      }
    }
  });

  var level2usersdatatable = $('#level2userstable').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '15%'},
      { "targets": 1, width: '15%'},
      { "targets": 2, width: '15%'},
      { "targets": 3, width: '15%'},
      { "targets": 4, width: '15%'},
      { "targets": 5, width: '15%'},
      { className: 'mdl-data-table__cell--non-numeric' },
    ],
    "responsive": true,
    "order": [[0, "asc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "level2users.php?userregion=" + sessionStorage.region, // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".level2userstable-error").html("");
        $("#level2userstable").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#level2userstable_processing").css("display", "none");
      }
    }
  });

  var level3usersdatatable = $('#level3userstable').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '15%'},
      { "targets": 1, width: '15%'},
      { "targets": 2, width: '15%'},
      { "targets": 3, width: '15%'},
      { "targets": 4, width: '15%'},
      { "targets": 5, width: '15%'},
      { "targets": 6, width: '15%'},
      { className: 'mdl-data-table__cell--non-numeric' },
    ],
    "responsive": true,
    "order": [[0, "asc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "level3users.php?userregion=" + sessionStorage.region, // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".level3userstable-error").html("");
        $("#level3userstable").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#level3userstable_processing").css("display", "none");
      }
    }
  });

  var dataTable4 = $('#pending1list').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '20%' },
      { "targets": 1, width: '12.5%' },
      { "targets": 2, width: '12.5%' },
      { "targets": 3, width: '12.5%' },
      { "targets": 4, width: '12.5%' },
      { "targets": 5, width: '12.5%' },
      { className: 'mdl-data-table__cell--non-numeric' },
    ],
    "responsive": true,
    "order": [[2, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "level1pendinglist.php", // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".pending1list-error").html("");
        $("#pending1list").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#pending1list_processing").css("display", "none");
      }
    }
  });


  var dataTable5 = $('#eventlogslist').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '70%' },
      { "targets": 1, width: '30%' },
      { className: 'mdl-data-table__cell--non-numeric' },
    ],
    "responsive": true,
    "order": [[1, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "eventlogslist.php", // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".eventlogslist-error").html("");
        $("#eventlogslist").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#eventlogslist_processing").css("display", "none");
      }
    }
  });

  var dataTable6 = $('#userlogslist').DataTable({
    "autoWidth": false,
    "columnDefs": [
      { "targets": 0, width: '70%' },
      { "targets": 1, width: '30%' },
      { className: 'mdl-data-table__cell--non-numeric' },
    ],
    "responsive": true,
    "order": [[1, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": {
      url: "userlogslist.php", // json datasource
      type: "post",  // method  , by default get
      error: function () {  // error handling
        $(".userlogslist-error").html("");
        $("#userlogslist").append('<tbody class="sample-data-error"><tr><th class="col-sm-12">No data found in the server</th></tr></tbody>');
        $("#userlogslist_processing").css("display", "none");
      }
    }
  });

  setInterval(function () {
     dataTable1.ajax.reload(null, false); // user paging is not reset on reload
  }, 3000);

  setInterval(function () {
    dataTable2.ajax.reload(null, false); // user paging is not reset on reload
  }, 3000);

  setInterval(function () {
    dataTable3.ajax.reload(null, false); // user paging is not reset on reload
  }, 3000);

  setInterval(function () {
    dataTable4.ajax.reload(null, false); // user paging is not reset on reload
  }, 3000);

  setInterval(function () {
    dataTable5.ajax.reload(null, false); // user paging is not reset on reload
  }, 2000);

  setInterval(function () {
    dataTable6.ajax.reload(null, false); // user paging is not reset on reload
  }, 2000);

  setInterval(function () {
    level2usersdatatable.ajax.reload(null, false); // user paging is not reset on reload
  }, 3000);

  setInterval(function () {
    level3usersdatatable.ajax.reload(null, false); // user paging is not reset on reload
  }, 3000);

  setInterval(function () {
    dataTable7.ajax.reload(null, false); // user paging is not reset on reload
  }, 3000);


  $('#addnewdateselected').datetimepicker({ format: 'dddd, D MMMM Y' });
  $('#addpendingdateselected').datetimepicker({ format: 'dddd, D MMMM Y' });
  $('#penddateselected').datetimepicker({ format: 'dddd, D MMMM Y' });



  document.getElementById('verifyformdiv').appendChild="<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button><button onclick='verifier("+obj[0].report_id+","+obj[0].is_verified+")' type='button' class='btn btn-success' id='addConfirm' data-toggle='modal' data-target='#verifyEvent'>Verify</button>";

  document.getElementById('pendingverifyformdiv').appendChild = "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button><button onclick='pendingadd(" + obj[0].report_id + ")' type='button' class='btn btn-success' id='addpendingConfirm' data-toggle='modal' data-target='#verifypendingEvent'>Save</button>";

});

var pendingid;

function loginUser()
{
  event.preventDefault();
  var email = $('#useremail').val();
  var password = $('#userpassword').val();

  var theUrl="databasehandler.php?cmd=1&email="+email+"&password="+password;
  $.ajax(theUrl,
        {
          async:true,
          complete:loginUserComplete
        });
}

function loginUserComplete(xhr,status){
  var obj = JSON.parse(xhr.responseText);
  // console.log(obj);
  //localstorage and cookie creation
  localStorage.levelid = obj.userid;
  document.cookie = "userlevelid="+obj.userid;
  //sessionstorage creation
  sessionStorage.userid = obj.userid;
  sessionStorage.firstname = obj.firstname;
  sessionStorage.lastname = obj.lastname;
  sessionStorage.level = obj.level;
  sessionStorage.region = obj.region;

  // console.log(sessionStorage.userid, sessionStorage.firstname, sessionStorage.lastname, sessionStorage.level);

  if(sessionStorage.level == '1')
  {
    window.location = "level1H.html";
  } else if (sessionStorage.level == '2'){
    window.location = "level2H.html";
  }else if (sessionStorage.level == '3'){
    window.location = "level3H.html";
  }else if (sessionStorage.level == '4'){
    window.location = "dashboard.html";
  }else{

    $.notify({
       icon: "info_outline",
       message: "Failed To Log In. Please check your details and try again."

   },{
       type: 'danger',
       timer: 4000,
       placement: {
           from: 'top',
           align: 'right'
       }
   });

  }


}

function welcomeToHomeLevel1(){


  if(sessionStorage.level == "1"){
    // alert(sessionStorage.level);
  } else {
    window.location.href="404.html";
  }



    document.getElementById('logout').value="Logout"
    // _fetchMyEvents(sessionStorage.userid);


}

function welcomeToHomeLevel2(){


  if(sessionStorage.level == "2"){
    // alert(sessionStorage.level);
  } else {
    window.location.href="404.html";
  }

      document.getElementById('logout').value="Logout"
      _fetchMyEvents(sessionStorage.userid);

}

function welcomeToHomeLevel3(){


    if(sessionStorage.level == "3"){
      // alert(sessionStorage.level);
    } else {
      window.location.href="404.html";
    }

        document.getElementById('logout').value="Logout";
        fillDashRegionFigures();
        fillDashTotalEvents();
        fillDashTotalAttendees();
        fillDashCommonPlace();
        _fetchMyEvents(sessionStorage.userid);

}

function welcomeToHomeLevel4(){


      if(sessionStorage.level == "3" || sessionStorage.level == "4"){

      } else {
        window.location.href="404.html";
      }
        // alert("asd"+sessionStorage.firstname);
          $('#dashboardname').html(sessionStorage.firstname+" "+sessionStorage.lastname);
          document.getElementById('dashboardname').value=sessionStorage.firstname;

          // document.getElementById('logout').value="Logout";
          fillDashRegionFigures();
          fillDashTotalEvents();
          fillDashTotalAttendees();
          fillDashCommonPlace();
          _fetchMyEvents(sessionStorage.userid);

}

function _fetchMyEvents(userid){

    var theUrl="databasehandler.php?cmd=3";

    $.ajax(theUrl,
          {
            async:true,
            complete:_fetchMyEventsComplete
          });


}

function _fetchMyEventsComplete(xhr,status){
    // console.log(xhr);
    var obj = JSON.parse(xhr.responseText);
    // console.log(obj);
    var tabledata = "";

    function _helper(entry){
      if(entry == "0"){
        return "<td style='color: red'>Not Verified</td>";
      } else {
        return "<td style='color: green'>Verified</td>";
      }
    }

    for(var i = 0; i < obj.length; i++){
      // console.log(obj[i].report_id);

      tabledata = "<tr>"+
            "<td>"+obj[i].report_id+"</td>"+
            "<td>"+obj[i].eventtitle+"</td>"+
            "<td>"+obj[i].date_organized+"</td>"+
            "<td>"+obj[i].region+"</td>"+
            "<td>"+obj[i].town+"</td>"+
            _helper(obj[i].is_verified)+
            "<td class='text-primary'>"+
            "<button onclick='editor("+obj[i].report_id+","+obj[i].is_verified+")' class='btn btn-just-icon btn-twitter' rel='tooltip' data-placement='bottom' title='Verify Event'><i class='material-icons'>assignment</i></button>"+
            // "<button onclick='viewer("+obj[i].report_id+")' class='btn btn-just-icon btn-success' rel='tooltip' data-placement='bottom' title='View'><i class='material-icons'>visibility</i></button></td>"+
          "</tr>";
        $('#homeHolder').append(tabledata);

    }

}

function _fetchMyEventsLevel2(userid){


    var theUrl="databasehandler.php?cmd=3";

    $.ajax(theUrl,
          {
            async:true,
            complete:_fetchMyEventsCompleteLevel2
          });


}

function _fetchMyEventsCompleteLevel2(xhr,status){
    // console.log(xhr);
    var obj = JSON.parse(xhr.responseText);
    // console.log(obj);
    var tabledata = "";

                function _helper(entry){
                  // console.log(entry);
                  // console.log("ontop");
                  if(entry == "0"){
                    return "<td style='color: red'>Not approved</td>";
                  } else {
                    return "<td style='color: green'>Approved</td>";
                  }
                }

                function _decision(entry){
                  if(entry == "0"){
                    return "FALSE";
                  } else {
                    return "TRUE";
                  }
                }


    for(var i = 0; i < obj.length; i++){
      // console.log(obj[i].report_id);
      // console.log(obj[i].report_id);

      tabledata = "<tr>"+
            "<td>"+obj[i].report_id+"</td>"+
            "<td>"+obj[i].eventtitle+"</td>"+
            "<td>"+obj[i].date_organized+"</td>"+
            "<td>"+obj[i].region+"</td>"+
            "<td>"+obj[i].town+"</td>"+
            _helper(obj[i].is_approved)+
            "<td class='text-primary'>"+
            "<button onclick='approvalwindow("+obj[i].report_id+")' class='btn btn-just-icon btn-success' rel='tooltip' data-placement='bottom' title='View'><i class='material-icons'>visibility</i></button>"+
            "<button onclick='toggleapprove("+obj[i].is_approved+","+obj[i].report_id+")' class='btn btn-just-icon btn-warning' rel='tooltip' data-placement='bottom' title='Toggle Approval'><i class='material-icons'>cached</i></button>"+
            "</td>"+
          "</tr>";
        $('#homeHolder').append(tabledata);
        // console.log(_helper(obj[i].is_approved));
        // console.log("ontop");

    }
}

function editor(val){
    // console.log('modal to edit: ',val);
    var theUrl="databasehandler.php?cmd=6&eventid="+val;

    $.ajax(theUrl,
          {
            async:true,
            complete:editorComplete
          });

    // $('#modalpop').click();
}

function editorComplete(xhr, status){
    // console.log(xhr);

    var obj = JSON.parse(xhr.responseText);


    sessionStorage.pullreportid = obj[0].report_id;
    sessionStorage.pullverified = obj[0].is_verified;
    help();


    // $('#modalpop').click();
    // $('#report_id').val(obj[0].report_id);
    // $('#eventtitle').val(obj[0].eventtitle);
    // $('#date_organized').val(obj[0].date_organized);
    // $('#region').val(obj[0].region);
    // $('#town').val(obj[0].town);
    // $('#audience_category').val(obj[0].audience_category);
    // $('#audience_attendance').val(obj[0].audience_attendance);
    // $('#team_challenges').val(obj[0].team_challenges);
    // $('#complaints_raised').val(obj[0].complaints_raised);
    // $('#event_y').val(obj[0].event_summary);
    // $('#picture_paths').val(picture_paths);

    var picValues = "";
    $('#pictureContainerLevel2').html("");

    picValues = picValues + "<div class='uk-child-width-1-3@m' uk-grid uk-lightbox='animation: slide'>";

      var jsonarray = JSON.parse(obj[0].picture_paths);
      for(var i = 0; i < jsonarray.length; i++) {
        var obj2 = jsonarray[i];

        //obj2 contains picture names.
        // $('#pictureContainer').html("<img src='uploads/"+5+"_"+as+"/"+"Awesome-Dining-Room-Colors-85-In-home-design-ideas-budget-with-Dining-Room-Colors.jpg'"+"/>");

        var user_id = ""+obj[0].reporter;
        var event_header = ""+obj[0].eventtitle;
        var picture_header = ""+obj2;


        picValues = picValues + "<div>";
        picValues = picValues + "<a onclick='closemodal2()' class='uk-inline' href='uploads/"+user_id+"_"+event_header+"/"+picture_header+"' caption='Caption 1'>";
        picValues = picValues + "<img style='height: 40%; width: 40%;' src='uploads/"+user_id+"_"+event_header+"/"+picture_header+"'/>";
        picValues = picValues + "</a>";
        picValues = picValues + "</div>";


      }

    picValues = picValues + "</div>";

    var dform = new Date(obj[0].date_organized);
    console.log(obj);
    console.log(obj[0].report_id);
    console.log(obj[0].eventtitle);
    console.log(moment(dform).format('D MMMM Y'));
    console.log(obj[0].region);
    console.log(obj[0].town);
    console.log(obj[0].audience_category);
    console.log(obj[0].audience_attendance);
    console.log(obj[0].team_challenges);
    console.log(obj[0].complaints_raised);
    console.log(obj[0].event_summary);
    console.log(picValues);


    UIkit.modal('#addContact').show();
    document.getElementById('report_id').innerHTML=obj[0].report_id;
    document.getElementById('eventtitle').innerHTML=obj[0].eventtitle;
    document.getElementById('date_organized').innerHTML=moment(dform).format('D MMMM Y');
    document.getElementById('region').innerHTML=obj[0].region;
    document.getElementById('town').innerHTML=obj[0].town;
    document.getElementById('audience_category').innerHTML=obj[0].audience_category;
    document.getElementById('audience_attendance').innerHTML=obj[0].audience_attendance;
    document.getElementById('team_challenges').innerHTML=obj[0].team_challenges;
    document.getElementById('complaints_raised').innerHTML=obj[0].complaints_raised;
    document.getElementById('event_summary').innerHTML=obj[0].event_summary;
    document.getElementById('pictureContainerLevel2').innerHTML=picValues;


}

function help(){
  verifier(sessionStorage.pullreportid, sessionStorage.pullverified);
}

function verifier(id, verifyCheck){
  $('#verifyCommentor').html("<button onclick= _level2cancel() type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button><button onclick= _pullverificationcoments("+id+","+verifyCheck+") type='button' class='btn btn-success' id='addConfirm'>Verify</button>");
}

function _level2cancel(){
  window.location.href="level2H.html";
}

function _pullverificationcoments(id, verifyCheck){
  var comment = $('#verifycommentarea').val();
  // console.log(comment);


  var theUrl="databasehandler.php?cmd=5&eventid="+id+"&verify="+verifyCheck+"&verifycomments="+comment;

  $.ajax(theUrl,
        {
          async:true,

        });

  window.location.href="level2H.html";

}

function approvalwindow(id){
    // console.log('modal for viewing: ',id);
    var theUrl="databasehandler.php?cmd=6&eventid="+id;

    $.ajax(theUrl,
          {
            async:true,
            complete:approvalwindowComplete
          });
}

function approvalwindowComplete(xhr, status){
    // console.log(xhr);
    var obj = JSON.parse(xhr.responseText);

    var picValues = "";
    $('#pictureContainerLevel3').html("");


    sessionStorage.pullreportid = obj[0].report_id;
    sessionStorage.pullapproved = obj[0].is_approved;
    // helpApproval();


    // $('#viewEvent2Button').click();
    UIkit.modal('#viewEvent2').show();

    // $('#report_id').val(obj[0].report_id);
    // $('#eventtitle').val(obj[0].eventtitle);
    // $('#date_organized').val(obj[0].date_organized);
    // $('#region').val(obj[0].region);
    // $('#town').val(obj[0].town);
    // $('#audience_category').val(obj[0].audience_category);
    // $('#audience_attendance').val(obj[0].audience_attendance);
    // $('#team_challenges').val(obj[0].team_challenges);
    // $('#complaints_raised').val(obj[0].complaints_raised);
    // $('#event_summary').val(obj[0].event_summary);
    // $('#picture_paths').val(picture_paths);


    picValues = picValues + "<div class='uk-child-width-1-3@m' uk-grid uk-lightbox='animation: slide'>";

      var jsonarray = JSON.parse(obj[0].picture_paths);
      for(var i = 0; i < jsonarray.length; i++) {
        var obj2 = jsonarray[i];

        var user_id = ""+obj[0].reporter;
        var event_header = ""+obj[0].eventtitle;
        var picture_header = ""+obj2;


        picValues = picValues + "<div>";
        picValues = picValues + "<a onclick='closemodal1()' class='uk-inline' href='uploads/"+user_id+"_"+event_header+"/"+picture_header+"' caption='Caption 1'>";
        picValues = picValues + "<img style='height: 40%; width: 40%;' src='uploads/"+user_id+"_"+event_header+"/"+picture_header+"'/>";
        picValues = picValues + "</a>";
        picValues = picValues + "</div>";

      }
      picValues = picValues + "</div>";



      var dform = new Date(obj[0].date_organized);

      document.getElementById('report_id').innerHTML=obj[0].report_id;
      document.getElementById('eventtitle').innerHTML=obj[0].eventtitle;
      document.getElementById('date_organized').innerHTML=moment(dform).format('D MMMM Y');
      document.getElementById('region').innerHTML=obj[0].region;
      document.getElementById('town').innerHTML=obj[0].town;
      document.getElementById('audience_category').innerHTML=obj[0].audience_category;
      document.getElementById('audience_attendance').innerHTML=obj[0].audience_attendance;
      document.getElementById('team_challenges').innerHTML=obj[0].team_challenges;
      document.getElementById('complaints_raised').innerHTML=obj[0].complaints_raised;
      document.getElementById('event_summary').innerHTML=obj[0].event_summary;
      document.getElementById('pictureContainerLevel3').innerHTML=picValues;



    // $('#approvebuttons').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button><button onclick='toggleapprove("+obj[0].is_approved+","+obj[0].report_id+")' type='button' class='btn btn-warning' id='addConfirm' data-toggle='modal' data-target='#verifyEvent'>Toggle Approval</button>");
    // $('#approvebuttons').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button><button onclick='verifier("+obj[0].report_id+","+obj[0].is_verified+")' type='button' class='btn btn-success' id='addConfirm' data-toggle='modal' data-target='#verifyEvent'>Verify</button>");
}

function helpApproval(){
  toggleapprove(sessionStorage.pullapproved, sessionStorage.pullreportid);
}

function toggleapprove(val, id){

    var theUrl="databasehandler.php?cmd=4&eventid="+id+"&approval="+val;

    $.ajax(theUrl,
          {
            async:true,

          });

    window.location.href="level3H.html";
}

function viewer(val){
    console.log('modal to view: ',val);
}

function clearaddfield() {
  event.preventDefault();
  document.getElementById('RegisterValidationDoc').reset();
}

function clearaddpendingfield() {
  event.preventDefault();
  document.getElementById('RegisterAddPendingValidationDoc').reset();
}

function clearpendingfield() {
  event.preventDefault();
  document.getElementById('RegisterPendingValidationDoc').reset();
}

function addevent(){
  event.preventDefault();

  var userid = sessionStorage.getItem("userid");
  var eventtitle = $('#addtitle').val();
  var date = $('#adddateselected').val();
  var region = $('#addregion').val();
  var town = $('#addtown').val();
  var audiencecat = $('#addaudience').val();
  var attendance = $('#addattendance').val();
  var challenges = $('#addchallenges').val();
  var complaints = $('#addcomplaints').val();
  var summary = $('#addsummary').val();
  var approved = 0;
  var verified = 0;
  var verifiedComments = "not verified";

  var filesarray = [];
  var inp = document.getElementById('input-id');
  for (var i = 0; i < inp.files.length; ++i) {
    var name = inp.files.item(i).name;
    filesarray[i] = name;
  }
  var files = JSON.stringify(filesarray);
  var picpath = files;
  var foldname = userid + "_" + eventtitle;
  var foldpath = foldname;

  if ((eventtitle == "") || (date == "") || (region == "") || (challenges == "") || (complaints == "") || (summary == "") ){
    $.notify({
      icon: "info_outline",
      message: "Please Fill Compulsory Fields."

    }, {
        type: 'danger',
        timer: 2000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
  }else{
    document.cookie = "foldname=" + foldname;

    var theUrl = "databasehandler.php?cmd=2&eventtitle=" + eventtitle + "&date=" + date + "&region=" + region + "&town=" + town + "&audiencecat=" + audiencecat + "&attendance=" + attendance
      + "&challenges=" + challenges + "&complaints=" + complaints + "&isVerified=" + verified + "&isApproved=" + approved + "&verifiedComments=" + verifiedComments + "&summary=" + summary + "&picpath=" + picpath + "&reporter=" + userid + "&foldpath=" + foldpath;

    $.ajax(theUrl,
      {
        async: true,
        complete: addeventComplete
      });
  }

}

function addeventComplete(xhr,status){
  var obj = JSON.parse(xhr.responseText);
  console.log(obj);
  $('#input-id').fileinput('upload');
  document.getElementById('RegisterValidationDoc').reset();
  $('#input-id').fileinput('enable');
  $.notify({
     icon: "info_outline",
     message: "Event Added Successfully."

 },{
     type: 'success',
     timer: 2000,
     placement: {
         from: 'top',
         align: 'right'
     }
 });


}

function addpendingevent() {
  event.preventDefault();

  var userid = sessionStorage.getItem("userid");
  var eventtitle = $('#addpendingtitle').val();
  var date = $('#addpendingdateselected').val();
  var region = $('#addpendingregion').val();
  var town = $('#addpendingtown').val();
  var audiencecat = $('#addpendingaudience').val();

  if ((eventtitle == "") || (date == "") || (region == "")) {
    $.notify({
      icon: "info_outline",
      message: "Please Fill Compulsory Fields."

    }, {
        type: 'danger',
        timer: 2000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
  } else {

    var theUrl = "databasehandler.php?cmd=22&eventtitle=" + eventtitle + "&date=" + date + "&region=" + region + "&town=" + town + "&audiencecat=" + audiencecat + "&reporter=" + userid;

    $.ajax(theUrl,
      {
        async: true,
        complete: addpendingeventComplete
      });
  }

}

function addpendingeventComplete(xhr, status) {
  var obj = JSON.parse(xhr.responseText);
  console.log(obj);
  document.getElementById('RegisterPendingValidationDoc').reset();
  $.notify({
    icon: "info_outline",
    message: "Event Added Successfully."

  }, {
      type: 'success',
      timer: 2000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });


}

function addpendpendingevent() {
  event.preventDefault();

  var userid = sessionStorage.getItem("userid");
  pendingid = $('#pendid').val();
  var eventtitle = $('#pendtitle').val();
  var date = $('#penddateselected').val();
  var region = $('#pendregion').val();
  var town = $('#pendtown').val();
  var audiencecat = $('#pendaudience').val();
  var attendance = $('#pendattendance').val();
  var challenges = $('#pendchallenges').val();
  var complaints = $('#pendcomplaints').val();
  var summary = $('#pendsummary').val();
  var approved = 0;
  var verified = 0;
  var verifiedComments = "not verified";

  var filesarray = [];
  var inp = document.getElementById('pendinput-id');
  for (var i = 0; i < inp.files.length; ++i) {
    var name = inp.files.item(i).name;
    filesarray[i] = name;
  }
  var files = JSON.stringify(filesarray);
  var picpath = files;
  var foldname = userid + "_" + eventtitle;
  var foldpath = foldname;

  if ((eventtitle == "") || (date == "") || (region == "") || (challenges == "") || (complaints == "") || (summary == "")) {
    $.notify({
      icon: "info_outline",
      message: "Please Fill Compulsory Fields."

    }, {
        type: 'danger',
        timer: 2000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
  } else {
    document.cookie = "foldname=" + foldname;

    var theUrl = "databasehandler.php?cmd=2&eventtitle=" + eventtitle + "&date=" + date + "&region=" + region + "&town=" + town + "&audiencecat=" + audiencecat + "&attendance=" + attendance
      + "&challenges=" + challenges + "&complaints=" + complaints + "&isVerified=" + verified + "&isApproved=" + approved + "&verifiedComments=" + verifiedComments + "&summary=" + summary + "&picpath=" + picpath + "&reporter=" + userid + "&foldpath=" + foldpath;

    //var theUrl1 = "databasehandler.php?cmd=25&pendid=" + pendingid;

    $.ajax(theUrl,
      {
        async: true,
        complete: addpendpendingeventComplete
      });
  }

}

function deletependingevent(pid){
  var theUrl = "databasehandler.php?cmd=25&pendid=" + pid;
  $.ajax(theUrl,
    {
      async: true
    });
}

function addpendpendingeventComplete(xhr, status) {
  var obj = JSON.parse(xhr.responseText);
  console.log(obj);
  $('#pendinput-id').fileinput('upload');
  document.getElementById('RegisterAddPendingValidationDoc').reset();
  $('#pendinput-id').fileinput('enable');

  deletependingevent(pendingid);

  UIkit.modal('#pending-modal-overflow').hide();

  $.notify({
    icon: "info_outline",
    message: "Event Added Successfully."

  }, {
      type: 'success',
      timer: 2000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });


}

function removependpendingeventComplete(xhr, status) {
  var obj = JSON.parse(xhr.responseText);

  $.notify({
    icon: "info_outline",
    message: "Pending Event Removed Successfully."

  }, {
      type: 'success',
      timer: 2000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });
}

function clearuseraddfield() {
  event.preventDefault();
  document.getElementById('AddUserForm').reset();
}

function addlevel1user() {
  event.preventDefault();

  var info = $("#AddUserForm").serialize();
  var regionid = sessionStorage.getItem("region");
  var level = "1";
  var useraddfname = $('#useraddfname').val();
  var useraddlname = $('#useraddlname').val();
  var useraddemail = $('#useraddemail').val();
  var useraddpword = $('#useraddpword').val();

  if ((useraddfname == "") || (useraddlname == "") || (useraddemail == "") || (useraddpword == "")) {
    $.notify({
      icon: "info_outline",
      message: "Please Fill Compulsory Fields."

    }, {
        type: 'danger',
        timer: 2000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
  } else {

    var theUrl = "databasehandler.php?cmd=19&" + info + "&region=" + regionid + "&level=" + level + "&myid="+sessionStorage.userid;

    $.ajax(theUrl,
      {
        async: true,
        complete: addlevel1userComplete
      });
  }

}

function addlevel1userComplete(xhr, status) {
  var obj = JSON.parse(xhr.responseText);
  console.log(obj[0].userid);


  var theUrl = "databasehandler.php?cmd=23&acted_on_id=" + obj[0].userid +"&myid="+sessionStorage.userid;

  $.ajax(theUrl,
    {
      async: true,
    });


  document.getElementById('AddUserForm').reset();
  //level2usersdatatable.ajax.reload();
  $.notify({
    icon: "info_outline",
    message: "User Added Successfully."

  }, {
      type: 'success',
      timer: 2000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });

}

function addlevel2user() {
  event.preventDefault();

  var info = $("#AddUserForm").serialize();
  var useraddfname = $('#useraddfname').val();
  var useraddlname = $('#useraddlname').val();
  var useraddemail = $('#useraddemail').val();
  var useraddpword = $('#useraddpword').val();

  if ((useraddfname == "") || (useraddlname == "") || (useraddemail == "") || (useraddpword == "")) {
    $.notify({
      icon: "info_outline",
      message: "Please Fill Compulsory Fields."

    }, {
        type: 'danger',
        timer: 2000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
  } else {

    var theUrl = "databasehandler.php?cmd=19&" + info  + "&myid="+sessionStorage.userid;

    $.ajax(theUrl,
      {
        async: true,
        complete: addlevel2userComplete
      });
  }

}

function addlevel2userComplete(xhr, status) {
  var obj = JSON.parse(xhr.responseText);
  console.log(obj);
  document.getElementById('AddUserForm').reset();
  //level2usersdatatable.ajax.reload();

  var theUrl = "databasehandler.php?cmd=23&acted_on_id=" + obj[0].userid +"&myid="+sessionStorage.userid;

  $.ajax(theUrl,
    {
      async: true,
    });


  $.notify({
    icon: "info_outline",
    message: "User Added Successfully."

  }, {
      type: 'success',
      timer: 2000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });

}

function level1viewer(val) {
  console.log('modal to edit: ', val);
  var theUrl = "databasehandler.php?cmd=6&eventid=" + val;

  $.ajax(theUrl,
    {
      async: true,
      complete: level1viewerComplete
    });

  // $('#modalpop').click();
}

function level1viewerComplete(xhr, status) {
  console.log(xhr);
  var obj = JSON.parse(xhr.responseText);


  // console.log(typeof(obj[0].picture_paths));
  console.log(obj);

  var picValues = "";
  $('#pictureContainer').html("");
  //console.log(obj[0].report_id);
  var dform = new Date(obj[0].date_organized);
  // console.log(obj[0].eventtitle);
  // console.log(obj[0].date_organized);
  // console.log(obj[0].region);
  // console.log(obj[0].town);
  // console.log(obj[0].audience_category);
  // console.log(obj[0].audience_attendance);
  // console.log(obj[0].team_challenges);
  // console.log(obj[0].complaints_raised);
  // console.log(obj[0].event_summary);
  // console.log(obj[0].picture_paths);
  // console.log(obj[0].verification_comments);

  // $('#modalshow').click();
  UIkit.modal('#modal-overflow').show();

  //$('#report_id').val(obj[0].report_id);
  // $('#eventtitle').innerHTML(obj[0].eventtitle);
  document.getElementById('eventtitle').innerHTML=obj[0].eventtitle;
  document.getElementById('date_organized').innerHTML=moment(dform).format('D MMMM Y');
  document.getElementById('region').innerHTML=obj[0].region;
  document.getElementById('town').innerHTML=obj[0].town;
  document.getElementById('audience_category').innerHTML=obj[0].audience_category;
  document.getElementById('audience_attendance').innerHTML=obj[0].audience_attendance;
  document.getElementById('team_challenges').innerHTML=obj[0].team_challenges;
  document.getElementById('complaints_raised').innerHTML=obj[0].complaints_raised;
  document.getElementById('event_summary').innerHTML=obj[0].event_summary;
  //
  // $('#date_organized').val(moment(dform).format('D MMMM Y'));
  //
  // $('#region').val(obj[0].region);
  // $('#town').val(obj[0].town);
  // $('#audience_category').val(obj[0].audience_category);
  // $('#audience_attendance').val(obj[0].audience_attendance);
  // $('#team_challenges').val(obj[0].team_challenges);
  // $('#complaints_raised').val(obj[0].complaints_raised);
  // $('#event_summary').val(obj[0].event_summary);
  // $('#picture_paths').val(picture_paths);

  // $('#pictureContainer').html();

  picValues = picValues + "<div class='uk-child-width-expand@s uk-text-center' uk-grid uk-lightbox='animation: slide'>";

  var jsonarray = JSON.parse(obj[0].picture_paths);
  for(var i = 0; i < jsonarray.length; i++) {
    var obj2 = jsonarray[i];

    //obj2 contains picture names.
    // $('#pictureContainer').html("<img src='uploads/"+5+"_"+as+"/"+"Awesome-Dining-Room-Colors-85-In-home-design-ideas-budget-with-Dining-Room-Colors.jpg'"+"/>");

    var user_id = ""+obj[0].reporter;
    var event_header = ""+obj[0].eventtitle;
    var picture_header = ""+obj2;


    picValues = picValues + "<div>";
    picValues = picValues + "<a onclick='closemodal1()' class='uk-inline' href='uploads/"+user_id+"_"+event_header+"/"+picture_header+"' caption='Caption 1'>";
    picValues = picValues + "<img style='height: 40%; width: 40%;' src='uploads/"+user_id+"_"+event_header+"/"+picture_header+"'/>";
    picValues = picValues + "</a>";
    picValues = picValues + "</div>";


    // $('#pictureContainer').append("<div>");
    // $('#pictureContainer').append("<a class='uk-inline' href='uploads/"+user_id+"_"+event_header+"/"+picture_header+"' caption='Caption 1'>");
    // $('#pictureContainer').append("<img style='height: 40%; width: 40%;' src='uploads/"+user_id+"_"+event_header+"/"+picture_header+"'/>");
    // $('#pictureContainer').append("</a>");
    // $('#pictureContainer').append("</div>");
    // $('#pictureContainer').html("<img style='height: 30px; width: 30px' src='uploads/"+obj[0].reporter+"_"+obj[0].eventtitle+"/"+obj2+"/>");

  }
  picValues = picValues + "</div>";
  document.getElementById('pictureContainer').innerHTML=picValues;

  // $('#picture_paths').val(picture_paths);
  // $('#verifyformdiv').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>");

}

function level1pendingviewer(val) {
  console.log('modal to edit: ', val);
  var theUrl = "databasehandler.php?cmd=24&eventid=" + val;

  $.ajax(theUrl,
    {
      async: true,
      complete: level1pendingviewerComplete
    });

  // $('#modalpop').click();
}

function level1pendingviewerComplete(xhr, status) {
  console.log(xhr);
  var obj = JSON.parse(xhr.responseText);

  console.log(obj);

  //console.log(obj[0].report_id);
  var dform = new Date(obj.date);

  document.getElementById('pendid').value = obj.id;

  document.getElementById('pendtitle').value = obj.title;
  document.getElementById('penddateselected').value = moment(dform).format('dddd, D MMMM Y');
  document.getElementById('pendregion').value = obj.region;
  document.getElementById('pendtown').value = obj.town;

  // $('#modalshow').click();
  UIkit.modal('#pending-modal-overflow').show();
}

function closemodal1(){
  // $('#closebutton').click();
  console.log("im here in the close modal function");
  // $('#closebutton').click();
  $('#eventDetailView').modal('hide');
}

function closemodal2(){
  // $('#closebutton').click();
  console.log("im here in the close modal 2 function");
  // $('#closebutton').click();
  $('#addContact').modal('hide');
}

function eventviewer(val) {
  // console.log('modal to edit: ', val);
  var theUrl = "databasehandler.php?cmd=6&eventid=" + val;

  $.ajax(theUrl,
    {
      async: true,
      complete: eventviewerComplete
    });

  // $('#modalpop').click();
}

function eventviewerComplete(xhr, status) {
  // console.log(xhr);
  var obj = JSON.parse(xhr.responseText);

  var dform = new Date(obj[0].date_organized);
  // console.log(obj[0].eventtitle);
  // console.log(obj[0].region);
  // console.log(obj[0].town);
  // console.log(obj[0].audience_category);
  // console.log(obj[0].audience_attendance);
  // console.log(obj[0].event_summary);

  $('#eventmodalshow').click();

  $('#showeventtitle').val(obj[0].eventtitle);
  $('#showdate_organized').val(moment(dform).format('D MMMM Y'));
  $('#showregion').val(obj[0].region);
  $('#showtown').val(obj[0].town);
  $('#showaudience_category').val(obj[0].audience_category);
  $('#showaudience_attendance').val(obj[0].audience_attendance);
  $('#showevent_summary').val(obj[0].event_summary);

}

function fillDashRegionFigures() {

  var theUrl = "databasehandler.php?cmd=10";

  $.ajax(theUrl,
  {
    async: true,
    complete: fillDashRegionFiguresComplete
  });

}

function fillDashRegionFiguresComplete(xhr, status) {

  var obj = JSON.parse(xhr.responseText);
  // console.log("obj", obj);

  for (var i = 0; i < obj.length; i++){
    $('#dashboardtablebody').append("<tr><td></td><td>"+obj[i].regname+"</td><td class='text-right'>"+obj[i].figures+"</td><td class='text-right'>"+obj[i].percentage+"</td></tr><tr>");
  }

}

function fillDashTotalEvents() {

  var theUrl = "databasehandler.php?cmd=11";

  $.ajax(theUrl,
  {
    async: true,
    complete: fillDashTotalEventsComplete
  });

}

function fillDashTotalEventsComplete(xhr, status) {

  var obj = JSON.parse(xhr.responseText);
  // console.log("obj", obj);

  $('#totalEventsHoted').html("<p style='font-weight: bold; font-size: 1.3em;'>"+obj[0].total+"<p>");
  // document.getElementById('totalEventsHoted').value = obj.total;



}

function fillDashTotalAttendees() {

  var theUrl = "databasehandler.php?cmd=13";

  $.ajax(theUrl,
  {
    async: true,
    complete: fillDashTotalAttendeesComplete
  });

}

function fillDashTotalAttendeesComplete(xhr, status) {

  var obj = JSON.parse(xhr.responseText);
  // console.log("obj", obj);

  $('#totalAttendees').html("<p style='font-weight: bold; font-size: 1.3em;'>"+obj[0].total+"<p>");
  // document.getElementById('totalEventsHoted').value = obj.total;



}

function fillDashCommonPlace() {

  var theUrl = "databasehandler.php?cmd=14";

  $.ajax(theUrl,
  {
    async: true,
    complete: fillDashCommonPlaceComplete
  });

}

function fillDashCommonPlaceComplete(xhr, status) {

  var obj = JSON.parse(xhr.responseText);
  console.log("obj", obj);

  $('#commonAudience').html("<p style='font-weight: bold; font-size: 1.3em;'>"+obj[0].audience_category+"<p>");


}

function fillDashGraphEventData() {

  var theUrl = "databasehandler.php?cmd=15";

  $.ajax(theUrl,
    {
      async: true,
      complete: fillDashGraphEventDataComplete
    });

}

function fillDashGraphEventDataComplete(xhr, status) {

  var obj = JSON.parse(xhr.responseText);
  console.log("obj", obj);

  //$('#totalAttendees').html("<p>" + obj[0].total + "<p>");
  // document.getElementById('totalEventsHoted').value = obj.total;

}

function dashEventsDisplay(val) {
  console.log('evend it:', val);
  var theUrl = "databasehandler.php?cmd=6&eventid=" + val;

  $.ajax(theUrl,
    {
      async: true,
      complete: dashEventsDisplayComplete
    });

  // $('#modalpop').click();
}

function dashEventsDisplayComplete(xhr, status) {
  console.log(xhr);
  var obj = JSON.parse(xhr.responseText);


  // console.log(typeof(obj[0].picture_paths));
  console.log(obj);

  var picValues = "";
  $('#pictureContainer').html("");

  var dform = new Date(obj[0].date_organized);


  console.log("show dashboard events modal");
  UIkit.modal('#dasheventsdisplay').show();

    //$('#report_id').val(obj[0].report_id);
    // $('#eventtitle').innerHTML(obj[0].eventtitle);
    document.getElementById('eventtitle').innerHTML=obj[0].eventtitle;
    document.getElementById('date_organized').innerHTML=moment(dform).format('D MMMM Y');
    document.getElementById('region').innerHTML=obj[0].region;
    document.getElementById('town').innerHTML=obj[0].town;
    document.getElementById('audience_category').innerHTML=obj[0].audience_category;
    document.getElementById('audience_attendance').innerHTML=obj[0].audience_attendance;
    document.getElementById('team_challenges').innerHTML=obj[0].team_challenges;
    document.getElementById('complaints_raised').innerHTML=obj[0].complaints_raised;
    document.getElementById('event_summary').innerHTML=obj[0].event_summary;
    //
    // $('#date_organized').val(moment(dform).format('D MMMM Y'));
    //
    // $('#region').val(obj[0].region);
    // $('#town').val(obj[0].town);
    // $('#audience_category').val(obj[0].audience_category);
    // $('#audience_attendance').val(obj[0].audience_attendance);
    // $('#team_challenges').val(obj[0].team_challenges);
    // $('#complaints_raised').val(obj[0].complaints_raised);
    // $('#event_summary').val(obj[0].event_summary);
    // $('#picture_paths').val(picture_paths);

    // $('#pictureContainer').html();

    picValues = picValues + "<div class='uk-child-width-expand@s uk-text-center' uk-grid uk-lightbox='animation: slide'>";

    var jsonarray = JSON.parse(obj[0].picture_paths);
    for(var i = 0; i < jsonarray.length; i++) {
      var obj2 = jsonarray[i];

      //obj2 contains picture names.
      // $('#pictureContainer').html("<img src='uploads/"+5+"_"+as+"/"+"Awesome-Dining-Room-Colors-85-In-home-design-ideas-budget-with-Dining-Room-Colors.jpg'"+"/>");

      var user_id = ""+obj[0].reporter;
      var event_header = ""+obj[0].eventtitle;
      var picture_header = ""+obj2;


      picValues = picValues + "<div>";
      picValues = picValues + "<a onclick='closemodal1()' class='uk-inline' href='uploads/"+user_id+"_"+event_header+"/"+picture_header+"' caption='Caption 1'>";
      picValues = picValues + "<img style='height: 40%; width: 40%;' src='uploads/"+user_id+"_"+event_header+"/"+picture_header+"'/>";
      picValues = picValues + "</a>";
      picValues = picValues + "</div>";


      // $('#pictureContainer').append("<div>");
      // $('#pictureContainer').append("<a class='uk-inline' href='uploads/"+user_id+"_"+event_header+"/"+picture_header+"' caption='Caption 1'>");
      // $('#pictureContainer').append("<img style='height: 40%; width: 40%;' src='uploads/"+user_id+"_"+event_header+"/"+picture_header+"'/>");
      // $('#pictureContainer').append("</a>");
      // $('#pictureContainer').append("</div>");
      // $('#pictureContainer').html("<img style='height: 30px; width: 30px' src='uploads/"+obj[0].reporter+"_"+obj[0].eventtitle+"/"+obj2+"/>");

  }
  picValues = picValues + "</div>";
  document.getElementById('pictureContainerLevel4users').innerHTML=picValues;

  // $('#picture_paths').val(picture_paths);
  // $('#verifyformdiv').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>");

}

function dashUsersDisplay(val) {
  console.log('users', val);
  var theUrl = "databasehandler.php?cmd=18&userid=" + val;

  $.ajax(theUrl,
    {
      async: true,
      complete: dashUsersDisplayComplete
    });

  // $('#modalpop').click();
}

function dashUsersDisplayComplete(xhr, status) {
  console.log(xhr);

  var obj = JSON.parse(xhr.responseText);

  console.log(obj);

  var picValues = "";
  $('#pictureContainer').html("");
  //console.log(obj[0].report_id);
  var dform = new Date(obj[0].date_organized);


  // $('#modalshow').click();
  UIkit.modal('#dashusersdisplay').show();


  document.getElementById('eventtitle').innerHTML=obj[0].firstname+" "+obj[0].lastname;
  document.getElementById('date_organized').innerHTML=obj[0].email;

  document.getElementById('region').innerHTML=obj[0].region;
  document.getElementById('town').innerHTML=obj[0].level;

}

function deleteUsers(val) {
  console.log('users', val);
  var theUrl = "databasehandler.php?cmd=20&userid=" + val +"&myid="+ sessionStorage.userid;

  $.ajax(theUrl,
    {
      async: true,
      complete: deleteUsersComplete
    });

  // $('#modalpop').click();
}

function deleteUsersComplete(xhr, status) {
  console.log(xhr);
  var obj = JSON.parse(xhr.responseText);

  console.log(obj);
  //level2usersdatatable.ajax.reload();
  $.notify({
    icon: "info_outline",
    message: "User Deactivated Successfully."

  }, {
      type: 'success',
      timer: 2000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });

}

function reactivateUsers(val) {
  console.log('users', val);
  var theUrl = "databasehandler.php?cmd=21&userid=" + val + "&myid="+ sessionStorage.userid;

  $.ajax(theUrl,
    {
      async: true,
      complete: reactivateUsersComplete
    });
}

function reactivateUsersComplete(xhr, status) {
  console.log(xhr);

  //level2usersdatatable.ajax.reload();
  $.notify({
    icon: "info_outline",
    message: "User Reactivated Successfully."

  }, {
      type: 'success',
      timer: 2000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });

}


function passwordreset(){
  event.preventDefault();

  var currentpassword = $('#currentpassword').val();
  var newpassword = $('#newpassword').val();
  var confirmednewpassword = $('#confirmednewpassword').val();

  if(newpassword == confirmednewpassword){

    var theUrl = "databasehandler.php?cmd=26&myid=" + sessionStorage.userid + "&confirmednewpassword="+ confirmednewpassword;

    $.ajax(theUrl,
      {
        async: true,
        complete: passwordresetComplete
      });

  } else {

    $.notify({
      icon: "info_outline",
      message: "New password is not the same as confirmed password."

    }, {
        type: 'warning',
        timer: 1000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });

  }

}


function passwordresetComplete(xhr, status) {
  console.log(xhr);

  //level2usersdatatable.ajax.reload();
  $.notify({
    icon: "info_outline",
    message: "Password Changed Successfully."

  }, {
      type: 'success',
      timer: 1000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });

}




function addnewevent(){
  event.preventDefault();

  var userid = sessionStorage.getItem("userid");
  var eventtitle = $('#addnewtitle').val();
  var date = $('#addnewdateselected').val();
  var region = $('#addnewregion').val();
  var town = $('#addnewtown').val();
  var audiencecat = $('#addnewaudience').val();
  var attendance = $('#addnewattendance').val();

  var topic = $('#addnewtopics').val();

  var logistics = "";
  var communicationMode = "";


  var addnewpowerpoint = $('#addnewpowerpoint').val();
  var addnewoneonone = $('#addnewoneonone').val();
  var addnewroadshow = $('#addnewroadshow').val();
  var addnewdurbar = $('#addnewdurbar').val();
  var addnewsmallgroupmeeting = $('#addnewsmallgroupmeeting').val();
  var addnewbus = $('#addnewbus').val();
  var addnewsoundsystem = $('#addnewsoundsystem').val();
  var addnewflyer = $('#addnewflyer').val();
  var addnewpen = $('#addnewpen').val();
  var addnewtapemeasure = $('#addnewtapemeasure').val();
  var addnewtowel = $('#addnewtowel').val();
  var addnewmug = $('#addnewmug').val();
  var addnewshirt = $('#addnewshirt').val();
  var addnewnotepad = $('#addnewnotepad').val();
  var addnewpowerblock = $('#addnewpowerblock').val();


  // communications mode select
    if ($('#addnewpowerpoint').is(":checked"))
    {
      communicationMode = communicationMode + addnewpowerpoint + ",";
    }
    if ($('#addnewoneonone').is(":checked"))
    {
      communicationMode = communicationMode + addnewoneonone + ",";
    }
    if ($('#addnewroadshow').is(":checked"))
    {
      communicationMode = communicationMode + addnewroadshow + ",";
    }
    if ($('#addnewdurbar').is(":checked"))
    {
      communicationMode = communicationMode + addnewdurbar + ",";
    }
    if ($('#addnewsmallgroupmeeting').is(":checked"))
    {
      communicationMode = communicationMode + addnewsmallgroupmeeting + ",";
    }


    // logistics select
    if ($('#addnewbus').is(":checked"))
    {
      logistics = logistics + addnewbus+ ",";
    }
    if ($('#addnewsoundsystem').is(":checked"))
    {
      logistics = logistics + addnewsoundsystem+ ",";
    }
    if ($('#addnewflyer').is(":checked"))
    {
      logistics = logistics + addnewflyer+ ",";
    }
    if ($('#addnewpen').is(":checked"))
    {
      logistics = logistics + addnewpen+ ",";
    }
    if ($('#addnewtapemeasure').is(":checked"))
    {
      logistics = logistics + addnewtapemeasure+ ",";
    }
    if ($('#addnewtowel').is(":checked"))
    {
      logistics = logistics + addnewtowel+ ",";
    }
    if ($('#addnewmug').is(":checked"))
    {
      logistics = logistics + addnewmug+ ",";
    }
    if ($('#addnewshirt').is(":checked"))
    {
      logistics = logistics + addnewshirt+ ",";
    }
    if ($('#addnewnotepad').is(":checked"))
    {
      logistics = logistics + addnewnotepad+ ",";
    }
    if ($('#addnewpowerblock').is(":checked"))
    {
      logistics = logistics + addnewpowerblock+ ",";
    }


  if ((eventtitle == "") || (date == "") || (region == "") || (town == "") || (audiencecat == "") || (attendance == "") ){
    $.notify({
      icon: "info_outline",
      message: "Please Fill Compulsory Fields."

    }, {
        type: 'danger',
        timer: 500,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
  }else{

    var theUrl = "databasehandler.php?cmd=2&eventtitle=" + eventtitle + "&date=" + date + "&region=" + region + "&town=" + town + "&audiencecat=" + audiencecat + "&attendance=" + attendance +
       "&outreach=" + communicationMode + "&eventtopic=" + topic + "&logistics=" + logistics + "&reporter=" + userid;
    $.ajax(theUrl,
      {
        async: true,
        complete: addneweventComplete
      });
  }

}

function addneweventComplete(xhr,status){
  var obj = JSON.parse(xhr.responseText);
  console.log('LOOK HERE' , obj);

  document.getElementById('RegisterValidationDoc').reset();

  $.notify({
     icon: "info_outline",
     message: "Event submitted successfully for verification and approval."

 },{
     type: 'success',
     timer: 2000,
     placement: {
         from: 'top',
         align: 'right'
     }
 });


}
