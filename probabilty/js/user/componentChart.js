var createComponentButton = document.getElementById('createComponentButton');
var componentBarDiv = document.getElementById('componentBarDiv');
var componentBarInput = document.getElementById('componentBarInput');
var componentBarButton = document.getElementById('componentBarButton');
var componentBarInputsEntries = document.getElementById('componentBarInputsEntries');
var xAxisDiv = document.getElementById('xAxisDiv');
var firstVariableDiv = document.getElementById('firstVariableDiv');
var secondVariableDiv = document.getElementById('secondVariableDiv');
var componentBarGraph = document.getElementById('componentBarGraph');

componentBarDiv.style.display = "none";

createComponentButton.addEventListener('click', function () {
    componentBarDiv.style.display = "";
})

componentBarButton.addEventListener('click', function () {
    var componentBarGraph = document.getElementById('componentBarGraph');
    componentBarGraph.innerHTML = "";
    componentBarInputsEntries.innerHTML = "";
    xAxisDiv = document.createElement('div');
    firstVariableDiv = document.createElement('div');
    secondVariableDiv = document.createElement('div');
    componentBarInputsEntries.appendChild(xAxisDiv);
    componentBarInputsEntries.appendChild(firstVariableDiv);
    componentBarInputsEntries.appendChild(secondVariableDiv);

    var noOfEntries = componentBarInput.value;
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
    componentBarInputsEntries.appendChild(submit);

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
        componentBarChartGraphFunction(xAxisData, firstVariableData, secondVariableData);
    })
})


function componentBarChartGraphFunction(xAxisData, firstVariableData, secondVariableData) {
    var componentBarGraph = document.getElementById('componentBarGraph');
    // <canvas id="densityChart" width="600" height="600"></canvas>
    var canvas = document.createElement('canvas');
    canvas.setAttribute("width", "600");
    canvas.setAttribute("height", "600");
    canvas.setAttribute("id", "componentChart");

    componentBarGraph.appendChild(canvas);

    // Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 21;
    var componentChartData = {
        labels: xAxisData,
        datasets: [{
            label: 'First Variable',
            backgroundColor: 'rgba(255, 99, 132, 0.8)',
            data: firstVariableData
        }, {
            label: 'Second Variable',
            backgroundColor: 'rgba(54, 162, 235, 0.8)',
            data: secondVariableData
        }]

    };


    var ctx = document.getElementById('componentChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: componentChartData,
        options: {
            title: {
                display: true,
                text: 'Component Chart'
            },
            tooltips: {
                mode: 'index',
                intersect: false
            },
            responsive: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
}