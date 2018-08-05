
<?php

//simple chart function
//Creator Seamus Kane
//The creator accepts no liability for usage of this function
//The code is freely available for download on the basis that the author is ackmowledged 

function draw_line_chart($my_array,$date_array,$chart_header,$xscale,$yscale,$y_title)
{

$array_max=max($my_array);
$array_min=min($my_array);
$array_range = $array_max -$array_min;
$array_count = count($my_array);

if($array_count>10){$date_interval=intval($array_count/5);}else{$date_interval=1;}

$prev_item=0;
$xmargin=$xscale/10;
$total_xwidth=$xscale+$xmargin;
$total_yheight=$yscale+$xmargin;
$ymagnify=intval(($yscale/$array_max))-2;
$start_x=$xmargin/2;
$x_interval = intval($xscale/$array_count)-1;

echo"<h1>".$chart_header."</h1>";
PRINT <<< END
<canvas id="myCanvas" width="$total_xwidth" height="$total_yheight" style="border:1px solid #d3d3d3;">
Your browser does not support the HTML5 canvas tag.</canvas>

<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.font = "bold 12px verdana, sans-serif";
ctx.fillStyle= 'red';

//print y-axis title
ctx.save();
ctx.font = "bold 24px verdana, sans-serif";
ctx.fillStyle= 'black';
ctx.translate( $x_interval/2, 0 );
ctx.rotate( Math.PI / 2 );
ctx.fillText("$y_title",$x_interval/2,0);
ctx.restore();
//print y-axis title


//print x-axis line
ctx.moveTo(0,$yscale);
ctx.lineTo($total_xwidth,$yscale);
//print x-axis line//

END;

foreach($my_array as $key => $item) {

$show_item=$item*$ymagnify;
if($my_array[$key+1] >= $item){$txt_offset = 12;} else {$txt_offset = 0;}
$xcord=$key*$x_interval;

$date_item=$date_array[$key];
$pieces = explode(" ", $date_item);


PRINT <<< END

if($key>0)
{
        ctx.font = "bold 12px verdana, sans-serif";
        ctx.fillStyle= 'blue';
//plot graph lines
ctx.moveTo($xcord+$start_x ,$yscale-$prev_item);
ctx.lineTo($xcord+$x_interval+$start_x,$yscale-$show_item);
//plot graph lines
}
ctx.stroke();
        ctx.font = "bold 12px verdana, sans-serif";
        ctx.fillStyle= 'blue';


	if ($prev_item!=$show_item)
	{

        ctx.fillText("$item",$xcord+$x_interval+$start_x,$yscale-$show_item+$txt_offset);
	}
        ctx.stroke();

        ctx.font = "bold 12px verdana, sans-serif";
        ctx.fillStyle= 'red';

	if  (($key % $date_interval == 0) || $key >= $array_count-1)
	{
        ctx.fillText("$pieces[1]",$xcord+$x_interval+$start_x,$yscale+15);
        ctx.fillText("$pieces[0]",$xcord+$x_interval+$start_x,$yscale+25);

	ctx.moveTo($xcord+$x_interval+$start_x,0);
	ctx.lineTo($xcord+$x_interval+$start_x,$yscale);
	}

END;
$prev_item=$show_item;
}

$line_spacing=intval($array_max/25)+1;

for ($j = 0; $j <= $array_max+2; $j++) {

PRINT <<< END
ctx.font = "bold 14px verdana, sans-serif";
ctx.fillStyle= 'green';
ctx.setLineDash([1, 2]);

if($j  %  $line_spacing == 0)
{
ctx.moveTo($x_interval+$start_x,$yscale-($j*$ymagnify));
ctx.lineTo($xscale,$yscale-($j*$ymagnify));
ctx.fillText("$j",$x_interval+$start_x-25,$yscale-($j*$ymagnify));
}

END;

}


PRINT <<< END
ctx.stroke();
ctx.drawImage(image1, 0, 0, 400, 1000);
</script>
END;

}
?>

<h2> On Some versions of Chrome you can right click on the graph to save it</h2>
