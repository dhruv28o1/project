
function num_validate()
{
    var nm=document.getElementById('number');
       

        nm.addEventListener("keydown", function(event){
            if(nm.value.length>=10&&!isNaN(event.key))
          
            event.preventDefault();
        
        });
  
}