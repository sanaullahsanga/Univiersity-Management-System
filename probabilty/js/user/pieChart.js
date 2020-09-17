var createPieButton = document.getElementById('createPieButton');
var pieDiv = document.getElementById('pieDiv');
var pieInput = document.getElementById('pieInput');
var pieButton = document.getElementById('pieButton');
var pieInputsEntries = document.getElementById('pieInputsEntries');
var xAxisDiv = document.getElementById('xAxisDiv');
var firstVariableDiv = document.getElementById('firstVariableDiv');
var pieGraph = document.getElementById('pieGraph');

pieDiv.style.display = "none";

createPieButton.addEventListener('click', function () {
    pieDiv.style.display = "";
})

pieButton.addEventListener('click', function () {
    var pieGraph = document.getElementById('pieGraph');
    pieGraph.innerHTML = "";
    pieInputsEntries.innerHTML = "";
    xAxisDiv = document.createElement('div');
    firstVariableDiv = document.createElement('div');
    pieInputsEntries.appendChild(xAxisDiv);
    pieInputsEntries.appendChild(firstVariableDiv);

    var noOfEntries = pieInput.value;
    var xAxis = [];
    var firstVariable = [];


    var p = document.createElement('p');
    p.innerText = "Label";
    xAxisDiv.appendChild(p);
    var p1 = document.createElement('p');
    p1.innerText = "Value";
    firstVariableDiv.appendChild(p1);

    for (var i = 0; i < noOfEntries; i++) {
        xAxis.push(document.createElement('input'));
        xAxis[i].setAttribute("id", "xAxis" + i);
        xAxisDiv.appendChild(xAxis[i]);

        firstVariable.push(document.createElement('input'));
        firstVariable[i].setAttribute("id", "firstVariable" + i);
        firstVariableDiv.appendChild(firstVariable[i]);

    }

    var submit = document.createElement('button');
    submit.setAttribute("type", "submit");
    submit.setAttribute("class", "button");
    submit.innerHTML = "Send";
    pieInputsEntries.appendChild(submit);

    submit.addEventListener('click', function () {
        var xAxisData = [];
        var firstVariableData = [];
        for (var i = 0; i < noOfEntries; i++) {
            var inputVlaue = document.getElementById("xAxis" + i).value;
            xAxisData.push(inputVlaue);

            inputVlaue = parseInt(document.getElementById("firstVariable" + i).value);
            firstVariableData.push(inputVlaue);
        }

        pieChartGraphFunction(xAxisData, firstVariableData);
    })
})


function pieChartGraphFunction(xAxisData, firstVariableData) {
    var pieGraph = document.getElementById('pieGraph');
    // <canvas id="densityChart" width="600" height="600"></canvas>
    var canvas = document.createElement('canvas');
    canvas.setAttribute("width", "600");
    canvas.setAttribute("height", "600");
    canvas.setAttribute("id", "pieChart");

    pieGraph.appendChild(canvas);

    // Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 21;

    var ctx = document.getElementById("pieChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: xAxisData,
            datasets: [{
                label: '# of Votes',
                data: firstVariableData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false
        }
    });
}