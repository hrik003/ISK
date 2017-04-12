function sigcofig(sigtext,googlefamily,family){
			
 WebFontConfig = {
    google: { families: [ "'" + googlefamily + "'" ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); 
  
var canvas=document.getElementById('Canvas');

var context=canvas.getContext('2d');
context.clearRect(0, 0, canvas.width, canvas.height);

context.font='22px ' + family; 
context.textAlign='center';
context.textBaseline='middle';
context.fillStyle='black';
context.lineWidth=2;

context.translate(150,80);
context.fillText(sigtext, 0, 0);
<!--context.strokeText("Earth",0,0);-->
context.setTransform(1,0,0,1,0,0);

		}
		function changesig(name)
		{
		var  i = document.getElementById('font_position').value;
		var googfamily = ['','Waiting+for+the+Sunrise::latin','Bad+Script::latin','Marck+Script::latin','Great+Vibes::latin','Pinyon+Script::latin','Rock+Salt::latin','Gloria+Hallelujah::latin','Pacifico::latin','Cedarville+Cursive::latin','Bilbo+Swash+Caps::latin','Homemade+Apple::latin','Calligraffitti::latin','Niconne::latin','Alex+Brush::latin','Reenie+Beanie::latin','Sacramento::latin','Allura::latin','Parisienne::latin','Yesteryear::latin','Satisfy::latin'];	
var families  = ['arial','Waiting for the Sunrise','Bad Script','Marck Script','Great Vibes','Pinyon Script','Rock Salt','Gloria Hallelujah','Pacifico','Cedarville Cursive','Bilbo Swash Caps','Homemade Apple','Calligraffitti','Niconne','Alex Brush','Reenie Beanie','Sacramento','Allura','Parisienne','Yesteryear','Satisfy'];

sigcofig(name,googfamily[i],families[i]);

if(i>=5)
{
	document.getElementById('font_position').value= 1;
	
}
else{
i = eval(i)+ 1;
document.getElementById('font_position').value= i;

}
}


		

		
		
		