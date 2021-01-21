    document.write('<table  border="1" class="table table-data2" id="table-user" style="margin-left:540px;margin-bottom:10px;">');
        document.write('<thread>');
        document.write('<th>Name</th>');
        document.write('<th>Login Date Time</th>');
        document.write('<th>Logout Date Time</th>');
        document.write('</thread>');
        document.write('<tbody>');
        document.write('<tr>');
        
   
        var array = localStorage.getItem('array');
        var items = JSON.parse(array);
        
        array = items;
                    
        let result = '';
        for (let cur in array) {
            if(array[cur]['logInTime']){
                 `<tr><td>${array[cur]['name']}</td><td>${array[cur]['logInTime']}</td><td>${array[cur]['logOutTime']}</td></tr>`;
        }
   
            
            document.write('</tbody></table>');	



  