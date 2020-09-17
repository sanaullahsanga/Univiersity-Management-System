var createMutipleButton = document.getElementById('createMutipleButton');
var multipleChartDiv = document.getElementById('multipleChartDiv');
var multipleChartInput = document.getElementById('multipleChartInput');
var multipleChartButton = document.getElementById('multipleChartButton');
var multipleChartInputsEntries = document.getElementById('multipleChartInputsEntries');
var xAxisDiv = document.getElementById('xAxisDiv');
var firstVariableDiv = document.getElementById('firstVariableDiv');
var secondVariableDiv = document.getElementById('secondVariableDiv');
var multipleChartGraph = document.getElementById('multipleChartGraph');

multipleChartDiv.style.display = "none";

createMutipleButton.addEventListener('click', function () {
    multipleChartDiv.style.display = "";
})

multipleChartButton.addEventListener('click', function () {
    console.log("chart");
    var multipleChartGraph = document.getElementById('multipleChartGraph');
    multipleChartGraph.innerHTML = "";
    multipleChartInputsEntries.innerHTML = "";
    xAxisDiv = document.createElement('div');
    firstVariableDiv = document.createElement('div');
    secondVariableDiv = document.createElement('div');
    multipleChartInputsEntries.appendChild(xAxisDiv);
    multipleChartInputsEntries.appendChild(firstVariableDiv);
    multipleChartInputsEntries.appendChild(secondVariableDiv);

    var noOfEntries = multipleChartInput.value;
    var xAxis = [];
    var firstVariable = [];
    var secondVariable = [];


    var p = document.createElement('p');
    p.innerText = "xAxis";
    xAxisDiv.appendChild(p);
    var p1 = document.createElement('p');
    p1.innerText = "First Variable";
    firstVariableDiv.appendChild(p1);

    var p2 = document.createElement('p');
    p2.innerText = "Second Variable";
    secondVariableDiv.appendChild(p2);

    for (var i = 0; i < noOfEntries; i++) {
        xAxis.push(document.createElement('input'));
        xAxis[i].setAttribute("id", "xAxis" + i);
        xAxisDiv.appendChild(xAxis[i]);

        firstVariable.push(document.createElement('input'));
        firstVariable[i].setAttribute("id", "firstVariable" + i);
        firstVariableDiv.appendChild(firstVariable[i]);

        secondVariable.push(document.createElement('input'));
        secondVariable[i].setAttribute("id", "secondVariable" + i);
        secondVariableDiv.appendChild(secondVariable[i]);
    }

    var submit = document.createElement('button');
    submit.setAttribute("type", "submit");
    submit.setAttribute("class", "button");
    submit.innerHTML = "Send";
    multipleChartInputsEntries.appendChild(submit);

    submit.addEventListener('click', function () {
        var xAxisData = [];
        var firstVariableData = [];
        var secondVariableData = [];
        for (var i = 0; i < noOfEntries; i++) {
            var inputVlaue = document.getElementById("xAxis" + i).value;
            xAxisData.push(inputVlaue);

            inputVlaue = parseInt(document.getElementById("firstVariable" + i).value);
            firstVariableData.push(inputVlaue);

            inputVlaue = parseInt(document.getElementById("secondVariable" + i).value);
            secondVariableData.push(inputVlaue);
        }
        mutipleChartGraphFunction(xAxisData,firstVariableData,secondVariableData);
    })
})


function mutipleChartGraphFunction(xAxisData,firstVariableData,secondVariableData) {
    var densityCanvas = document.getElementById("densityChart");
    var multipleChartGraph = document.getElementById('multipleChartGraph');
    // <canvas id="densityChart" width="600" height="600"></canvas>
    var densityCanvas = document.createElement('canvas');
    densityCanvas.setAttribute("width","600");
    densityCanvas.setAttribute("height","600");
    densityCanvas.setAttribute("id","densityChart");
    
    multipleChartGraph.appendChild(densityCanvas);

    // Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 21;

    var first = {
        label: 'First Variable',
        data: firstVariableData,
        backgroundColor: 'rgba(255, 99, 132, 0.8)',
        borderWidth: 0
    };

    var second = {
        label: 'Second Variable',
        data: secondVariableData,
        backgroundColor: 'rgba(54, 162, 235, 0.8)',
        borderWidth: 0
    };

    var planetData = {
        labels: xAxisData,
        datasets: [first, second]
    };

    var chartOptions = {
        scales: {
            xAxes: [{
                barPercentage: 1,
                categoryPercentage: 0.6
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
        }
    };

    var barChart = new Chart(densityCanvas, {
        type: 'bar',
        data: planetData,
        options: chartOptions
    });
}