$(document).ready(function () {

    
    var vv=$('#custId').val();
 
        if(vv == 1){
            
            sr();
        }else if(vv == 2){
            sor();
        }
        
    });

    function sr(){
        $('#appw').empty();
          $.ajax({
                url: "./syrup.php",
                success: function(data){
                    $('#appw').append(data);
                }
            });  
  }

  function sor(){
    $('#appw').empty();


            $.ajax({
                url: "./Sorbitol.php",
                success: function(data){
                    $('#appw').append(data);
                }
            }); 
    }
  
    


        			function ov(){
        			$('#appw').empty();
        					$.ajax({
        						url: "./Sorbitol.php",
        						success: function(data){
                                    
        							$('#appw').append(data);
        							
        						}
        					}); 
        	        }

                    $('#Overview').click(function(){
        				ov(); 
    
        			});
$('#syrup').click(function(){
    sr();
    });


$('#sorbitol').click(function(){
    
    sor();
});
