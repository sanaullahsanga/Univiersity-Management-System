var entriesButton = document.getElementById('entriesButton');
var entriesInput = document.getElementById('entriesInput');
var nameInput = document.getElementById('nameInput');
var userInputs = document.getElementById('userInputs');
var calculateFrequencyTable = document.getElementById('calculateFrequencyTable');
var demo = document.getElementById('frequencyTablesContainer');

entriesButton.addEventListener('click', function () {
    
    demo.innerHTML = "";
    userInputs.innerHTML = ""; 
    var name = nameInput.value;
    var noOfEntries = entriesInput.value;
    var inputArr = [];
    var data = [];
  
    for (var i = 0; i < noOfEntries; i++) {
        inputArr.push(document.createElement('input'));
        inputArr[i].setAttribute("id", "input" + i);
        userInputs.appendChild(inputArr[i]);
    }

    var submit = document.createElement('button');
    submit.setAttribute("type", "submit");
    submit.setAttribute("class", "button");
    submit.innerHTML = "Send";
    userInputs.appendChild(submit);

    submit.addEventListener('click', function () {
        for (var i = 0; i < noOfEntries; i++) {
            var inputVlaue = parseInt(document.getElementById("input" + i).value);
            data.push(inputVlaue);
        }
        displayFrequencyTable(data, name);
    })
})

function displayFrequencyTable(data, heading) {

    console.log(heading);
    var h2 = document.createElement('h2');
    h2.innerHTML = heading;
    h2.style.textTransform = "capitalize";
    heading = h2.innerHTML;

    var d = new Data(data);
    var table = new Table();

    table.addRow();
    table.addCol('Class');
    table.addCol('Frequency');
    table.addCol('Commulative Frequency');
    table.addCol('Relative Frequency');
    table.addCol('Percentage');
    table.addCol('Commulative Relative Frequency');

    var t = table.getTable();
    t.classList.add("tableContainer");
 
    demo.appendChild(h2);
    demo.appendChild(t);
 
    var labels = [];
    var rows = d.getNoOfRows();
    var min = d.min();
    var interval = d.getClassInterval();
 
    var first, second, f, cf, rf, p, crf;
    first = min;
    second = first + interval;
    c = d.getClass();
    f = d.getFrequencyArray();
    cf = d.getCommulativeFreqArray();
    rf = d.getRelativeFreqArray();
    p = d.getPercentageArray();
    crf = d.getCommulativeRelativeFrequencyArray();

    if (interval != 0) {
        for (var i = 0; i < rows; i++) {
            table.addRow();
            table.addCol(first + " - " + second);
            table.addCol(f[i]);
            table.addCol(cf[i]);
            table.addCol(rf[i]);
            table.addCol(p[i] + " %");
            table.addCol(crf[i] + " %");
            first = second;
            second += interval;
            labels.push(i + 1);
        }
    } else {
        for (var i = 0; i < rows; i++) {
            table.addRow();
            table.addCol(first);
            table.addCol(f[i]);
            table.addCol(cf[i]);
            table.addCol(rf[i]);
            table.addCol(p[i] + " %");
            table.addCol(crf[i] + " %");
            first++;
            labels.push(i + 1);
        }
    }

    table.addRow();
    table.addCol();
    table.addCol('sum = ' + d.length());
    table.addCol();
    table.addCol();
    table.addCol();
    table.addCol();
    
    var meanTable = new Table();
    meanTable.addRow();
    meanTable.addCol('Mean');
    meanTable.addCol('Standard Deviation');
    meanTable.addRow();
    meanTable.addCol(meanFunc(d.getData()));
    meanTable.addCol(standardDeviation(d.getData()));

    var t = meanTable.getTable();
    demo.appendChild(t);


    if (interval > 0)
        histogram(f, c, interval, d.max(), heading);
    else {

        heading = "" + heading + "";
        var title = heading.toLocaleUpperCase();
        barchart(demo, title, f, labels);
    }
}


function histogram(f, c, interval, max, heading) {

    var data = [];
    for (var i = 0; i < f.length; i++) {
        var obj = {
            x: "" + c[i] + "",
            y: f[i]
        };
        data[i] = obj;
    }
    var binInc = interval;
    var maxBin = max;

    heading = "" + heading + "";

    var title = heading.toLocaleUpperCase();

    createHistogram(data, maxBin, binInc, title);
}

function barchart(demo, title, f, labels) {

    var canvas = document.createElement('canvas');
    canvas.style.width = "600px";
    canvas.style.height = "600px";
    canvas.style.margin = "auto";
    demo.appendChild(canvas);


    var id = canvas;
    var data = f;
    var labels = labels;
    var label = title;

    barChart(id, data, labels, label);
}