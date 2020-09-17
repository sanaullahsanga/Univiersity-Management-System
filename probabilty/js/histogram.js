
function createHistogram(data, maxBin, binInc, title) {

    console.log(data);
    console.log(maxBin);
    console.log(binInc);

    var binTicks = [];
    binTicks[0] = 0;
    for (var i = 0; i < data.length; i++) {
        binTicks.push(parseInt(data[i].x));
    }
    var last = parseInt(data[data.length-1].x) + binInc;
    binTicks.push(last);

    // A formatter for counts.
    var formatCount = d3.format(",.0f");
    var totalWidth = 600;
    var totalHeight = 600;
    var margin = {
            top: 40,
            right: 60,
            bottom: 50,
            left: 70
        },
        width = totalWidth - margin.left - margin.right,
        height = totalHeight - margin.top - margin.bottom;

    var binArray = [];
    for (var i = 0; i <= maxBin + binInc; i += binInc) {
        binArray.push(i);
    }
    
    

    var x = d3.scale.linear()
        .domain([0, maxBin + binInc])
        .range([0, width]);
    var binWidth = parseFloat(width / (binArray.length - 1)) - 1;

    var y = d3.scale.linear()
        .domain([0, d3.max(data, function (d) {
            return d.y;
        })])
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom")
        .tickValues(binTicks);

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

    var frequencyTablesContainer = d3.select("#frequencyTablesContainer");
    // var svg = d3.select("#histogram")
    //     .attr("width", width + margin.left + margin.right)
    //     .attr("height", height + margin.top + margin.bottom)
    //     .append("g")
    //     .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    
    var svg = frequencyTablesContainer.append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
 

    var bar = svg.selectAll(".bar")
        .data(data)
        .enter()
        .append("rect")
        .attr("class", "bar")
        .attr("x", function (d) {
            return x(d.x);
        })
        .attr("width", binWidth)
        .attr("y", function (d) {
            return y(d.y);
        })
        .attr("height", function (d) {
            return height - y(d.y);
        })
        .on("mouseover", function (d) {
            var barWidth = parseFloat(d3.select(this).attr("width"));
            var xPosition = parseFloat(d3.select(this).attr("x")) + (barWidth / 2);
            var yPosition = parseFloat(d3.select(this).attr("y")) - 10;

            svg.append("text")
                .attr("id", "tooltip")
                .attr("x", xPosition)
                .attr("y", yPosition)
                .attr("text-anchor", "middle")
                .text(d.y);
        })
        .on("mouseout", function (d) {
            d3.select('#tooltip').remove();
        });

    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    svg.append("g")
        .attr("class", "y axis")
        // .attr("transform", "translate(0," + height + ")")
        .call(yAxis);

    // Add axis labels
    svg.append("text")
        .attr("class", "x label")
        .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom - 15) + ")")
        //.attr("dy", "1em")
        .attr("text-anchor", "middle")
        .text("Class");

    svg.append("text")
        .attr("class", "y label")
        .attr("transform", "rotate(-90)")
        .attr("y", 0 - margin.left)
        .attr("x", 0 - (height / 2))
        .attr("dy", "1em")
        .attr("text-anchor", "middle")
        .text("Frequency");

    // Add title to chart
    svg.append("text")
        .attr("class", "title")
        .attr("transform", "translate(" + (width / 2) + " ," + (-20) + ")")
        //.attr("dy", "1em")
        .attr("text-anchor", "middle")
        .text(title);
};