# php-simple-chart
This is a simple line chart creation function for php. 
Basically, 2 arrays are passed to the function as well as other arguments such as the chart dimensions. 
The 1st array contains the first raw values such as temperature etc . The second array contains the associated date vales. 
The program tries to autosize the graph depending on the range,min,max and array elements. 
There is an example program showing how the function may be called.
The resultant chart may be cut and paste into MS office documents as a gif, png etc. An example gif is shown in this git.

I use the function in my IOT projects where I capture sensor data in a Mysql database via a php script and then graph it
using this function. I create the input arrays from a series of sql queries.

