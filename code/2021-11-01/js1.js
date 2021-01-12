var john_team=[89,120,103];
var mike_team=[114,94,123];
var avgjohn,avgmike;
var sum1=0,sum2=0,i,j;

	console.log('john team score:'+john_team);
	console.log('mike team score:'+mike_team);

		for(i = 0; i <3; i++) { 
   				   sum1 = john_team[i]+sum1;
    	 }

        console.log('john total store: '+ sum1);
    	avgjohn=sum1/3;
    	console.log("john_average:"+ avgjohn);
		
     	for(i = 0; i <3; i++) { 
      			sum2 = mike_team[i]+sum2;
     	}

        console.log('mike total store: '+ sum2);
        avgmike=sum2/3;
        console.log("mike_average"+ avgmike);
        
	if(avgjohn>avgmike)
	{
			document.write("winner is john team <br>");
	}
	else if(avgjohn < avgmike)
	{
			document.write("winner is mike team <br>");

	}
	else
	{

			document.write("match is draw no one is winner is <br>");

	}
    	
    	
	


	document.write("new scenario<br><br>");

	for(j=0;j<3;j++)
	{
			john_team[j]=prompt("enter john "+ j + " team score");
	}
	for(j=0;j<3;j++)
	{
			mike_team[j]=prompt("enter mike  "+ j+ " team score");
	}

	
   	console.log('new update john score:'+john_team[0],john_team[1],john_team[2]);
   	console.log('new update mike score:'+mike_team[0],mike_team[1],mike_team[2]);

     
     
   					 
    sum1=0,sum2=0;

    console.log(typeof(sum1));
	for(j=0;j<3;j++) { 

   				   sum1 = parseInt(sum1 + parseInt(john_team[j]));
    	 }
   	  console.log('john new total store: '+ sum1);

    avgjohn=sum1/3;
    console.log("john_average:"+ avgjohn);

     for(j=0;j<3;j++) 
     { 
  			sum2 = parseInt(parseInt(mike_team[j])+sum2);
  	}
       console.log('mike new total store: '+ sum2);
       console.log(typeof(sum2));

    avgmike=sum2/3;
    console.log("mike_average:"+avgmike);
    	
	if(avgjohn>avgmike)
	{
		document.write("New Winner is John Team");  
	}
	else if(avgjohn < avgmike)
	{
		document.write("New Winner is Mike Team <br>");
	}
	else
	{
		document.write("match is draw no one is winner is <br>");
	}
