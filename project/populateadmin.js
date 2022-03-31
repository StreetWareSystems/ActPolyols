




$(document).ready(function () {
  var vv=$('#custId').val();
    if(vv == 1){
        pt();
    }else if(vv ==2){
        product();
    }else if(vv ==3){
        package();
    }else if(vv ==4){
        freight();
    }else if(vv ==5){
        Container();
    }else if(vv ==6){
        pallet();
    }else if(vv ==7){
        Duties();
    }else if(vv ==8){
        User();
    }else if(vv == 9){
        Company();
    }else if(vv == 10){
        AssignCompany();

    }else if(vv == 11){
        logactivity();
    }
    
});









function pt(){
    $('#appw').empty();

        
    $.ajax({
        url: "./ProductType.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}

function product(){
    $('#appw').empty();

        
    $.ajax({
        url: "./Product.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}

function package(){
    $('#appw').empty();        
    $.ajax({
        url: "./Package.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}


function freight(){
    $('#appw').empty();

        
    $.ajax({
        url: "./freight.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}

function Container(){
    $('#appw').empty();

        
    $.ajax({
        url: "./Container.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}



function pallet(){
    $('#appw').empty();

        
    $.ajax({
        url: "./Pallet.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}


function Duties(){
    $('#appw').empty();

        
    $.ajax({
        url: "./Duties.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}

function User(){
    $('#appw').empty();

        
    $.ajax({
        url: "./user.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}




function Company(){
    $('#appw').empty();
    
        
    $.ajax({
        url: "./Company.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}

function AssignCompany(){
    $('#appw').empty();
    
        
    $.ajax({
        url: "./Product_Assign_Company.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}


function logactivity(){
    $('#appw').empty();

        
    $.ajax({
        url: "./Logfile.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}






function ov(){
    $('#appw').empty();

        
    $.ajax({
        url: "./ov.php",
        success: function(data){
            $('#appw').append(data);
        }
      });
}


$('#Overview').click(function(){
      ov();    
    });

$('#pt').click(function(){
    pt(); 
  
     
  });

$('#product').click(function(){
    product();
});

$('#package').click(function(){
    package();
});

$('#freight').click(function(){
    freight();
});
$('#Container').click(function(){
    Container();
});
$('#pallet').click(function(){
    pallet();
});

$('#duties').click(function(){
    Duties();
})

$('#user').click(function(){
    User();
})

$('#company').click(function(){
   
    Company();
})



$('#AssignCompany').click(function(){
   
    AssignCompany();
})


$('#logs').click(function(){
   
    logactivity();
})

