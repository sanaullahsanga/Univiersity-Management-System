class Data {
    constructor(data) {
        this.data = data;
        this.class = [];
        this.frequency = [];
        this.commulativefrequency = [];
        this.relativefrequency = [];
        this.percentage = [];
        this.commulativeRelativeFrequency = [];
        this.classInterval = 0;
        this.noOfRows = 0;
        this.removeEmptyIndexes();
        this.sort();
        this.classIntervalandNoOfRows();
    }
    getData(){
        return this.data;
    }
    sort() {
        this.data.sort(function (a, b) {
            return a - b
        }); 
    }
    min() {
        return this.data[0];
    }
    max() {
        return this.data[this.length() - 1];
    }
    length() {
        var x = this.data.length;
        return x;
    }
    removeEmptyIndexes() {
        var correctData = [];
        for (var index = 0; index < this.length(); index++) {
            if (!isNaN(this.data[index])) {
                correctData.push(this.data[index]);
            }
        }
        this.data = [];
        for (var i = 0; i < correctData.length; i++) {
            this.data.push(correctData[i]);
        }
        
        // return correctData;
        // for (var i = this.length() - 1; i >= 0; i--) {
        //     if (this.data[i] === undefined || isNaN(this.data[i])){
        //         this.data.pop();
        //     }
        // }
    }
    getClassInterval() {
        return this.classInterval;
    }
    getNoOfRows() {
        return this.noOfRows;
    }
    frequencyInClassInterval(start, end) {
        var f = 0;
        if (end !== undefined) {
            for (var i = 0; i < this.length(); i++) {
                if (this.data[i] >= start && this.data[i] < end)
                    f++;
            }
        } else {
            for (var i = 0; i < this.length(); i++) {
                if (this.data[i] == start)
                    f++;
            }
        }
        return f;
    }
    getFrequencyArray() {
        var interval = this.getClassInterval();
        var rows = this.getNoOfRows();
        var first, second;
        first = this.min();
        second = first + interval;
        if (interval != 0) {
            for (var i = 0; i < rows; i++) {
                this.frequency[i] = this.frequencyInClassInterval(first, second);
                first = second;
                second += interval;
            }
        } else {
            for (var i = 0; i < rows; i++) {
                this.frequency[i] = this.frequencyInClassInterval(first);
                first++;
            }
        }
        return this.frequency;
    }
    getCommulativeFreqArray() {
        var sum = 0;
        for (var i = 0; i < this.noOfRows; i++) {
            sum += this.frequency[i];
            this.commulativefrequency[i] = sum;
        }
        return this.commulativefrequency;
    }
    getRelativeFreqArray(){
        var r = 0;
        var l = this.length();
        var rows = this.noOfRows;
        var cf ;
        for (var i = 0; i < rows; i++) {
            cf = this.commulativefrequency[i];
            this.relativefrequency[i] =  (cf / l).toFixed(2);
        }
        return this.relativefrequency;
    }
    getPercentageArray(){
        var rf = 0;
        for (var i = 0; i < this.noOfRows; i++) {
            rf = this.relativefrequency[i];
            this.percentage[i] = Math.round(rf * 100);
        }
        return this.percentage;
    }
    getCommulativeRelativeFrequencyArray(){
        var sum = 0;
        for (var i = 0; i < this.noOfRows; i++) {
            sum += this.percentage[i];
            this.commulativeRelativeFrequency[i] = sum;
        }
        return this.commulativeRelativeFrequency;
    }
    getClass(){
        var min = this.min();
        var row = this.getNoOfRows();
        var interval = this.getClassInterval();
        for (var i = 0; i <= row; i++) {
            this.class[i] = min;
            min +=interval;
        }
        return this.class;
    }
    classIntervalandNoOfRows() { 
        if (this.length() > 7) {
            var min = this.min();
            var max = this.max();
            var diff = max - min;
            if (diff >= 7) {
                var interval = Math.floor(diff / 7);
                if (interval * 7 <= diff) {
                    interval++;
                }
                this.classInterval = interval;
                var first, second;
                first = min;
                second = first + interval;
                var i = 1;
                var rows = 0;
                var bool = true;
                for (i = 1; i <= 7; i++) {
                    first = second;
                    second += interval;
                    if (!bool) {
                        this.noOfRows = rows;
                        break;
                    } else {
                        this.noOfRows = i;
                    }
                    for (var j = first; j < second; j++) {
                        if (j == max) {
                            rows = i + 1;
                            bool = false;
                            break;
                        }
                    }
                }
            } else {
                console.log('diff less than 7' + " = " + diff);
                this.classInterval = 0;
                this.noOfRows = diff + 1;
                console.log(diff);
                console.log(max);
                console.log(min);
            }
        } else {
            console.log('less than 7');
            this.classInterval = 0;
            var arr = [];
            for (var i = 0; i < this.length(); i++) {
                var found = false;
                for (var j = 0; j < arr.length; j++) {
                    if(this.data[i] == arr[j])
                        found = true;
                }
                if(found == false)
                    arr.push(this.data[i]);
            } 
 
            this.noOfRows = arr.length; 
        }
    }
}