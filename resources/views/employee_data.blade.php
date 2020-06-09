<!doctype html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <body>
     <input type='text' id='search' name='search' placeholder='Enter userid 1-27'><input type='button' value='Search' id='but_search'>
     <br/>
     <input type='button' value='Fetch all records' id='but_fetchall'>
     
     <table border='1' id='userTable' style='border-collapse: collapse;'>
       <thead>
        <tr>
          <th>S.no</th>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
       </thead>
       <tbody></tbody>
     </table>

     <!-- Script -->
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --> <!-- jQuery CDN -->
     <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

     <script type='text/javascript'>
     $(document).ready(function(){

       // Fetch all records
       $('#but_fetchall').click(function(){
	 fetchRecords(0);
       });

       // Search by userid
       $('#but_search').click(function(){
          var userid = Number($('#search').val().trim());
				
	  if(userid > 0){
	    fetchRecords(userid);
	  }

       });

     });

     function fetchRecords(id){
       $.ajax({
         url: 'getUsers/'+id,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
           $('#userTable tbody').empty(); // Empty <tbody>
           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var id = response['data'][i].id;
                 var username = response['data'][i].username;
                 var name = response['data'][i].name;
                 var email = response['data'][i].email;

                 var tr_str = "<tr>" +
                   "<td align='center'>" + (i+1) + "</td>" +
                   "<td align='center'>" + username + "</td>" +
                   "<td align='center'>" + name + "</td>" +
                   "<td align='center'>" + email + "</td>" +
                 "</tr>";

                 $("#userTable tbody").append(tr_str);
              }
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              $("#userTable tbody").append(tr_str);
           }

         }
       });
     }
     </script>
  </body>
</html>