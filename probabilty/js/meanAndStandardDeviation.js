function meanFunc(data){
    var sum = 0;
    for (var i = 0; i < data.length; i++) {
        sum += data[i];
    }
    return sum / data.length; 
}
function standardDeviation(data) {
    var mean = meanFunc(data);
    var sum = 0;
    var square = 0;
    for (var i = 0; i < data.length; i++) {
        data[i] = data[i] - mean;
        sum += data[i] * data[i];
    }
    var div = sum / data.length;
    var sd = Math.sqrt(div)
    return sd;
}