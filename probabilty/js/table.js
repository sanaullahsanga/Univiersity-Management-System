class Table {
    constructor() {
        this.table = document.createElement('table');
        this.row = [];
        this.col = [];
    }
    addRow() {
        this.row.push(document.createElement('tr'));
        this.table.appendChild(this.row[this.row.length - 1]);
    }
    addCol(data) {
        this.col.push(document.createElement('td'));

        if (data === undefined)
            this.col[this.col.length - 1].innerHTML = "";
        else
            this.col[this.col.length - 1].innerHTML = data;


        this.row[this.row.length - 1].appendChild(this.col[this.col.length - 1]);
    }
    addSpan(first, second, third) {
        var span1 = document.createElement('span');
        var span2 = document.createElement('span');
        var span3 = document.createElement('span');

        if(first === undefined)
            first="";
        if(second === undefined)
            second="";
        if(third === undefined)
            third="";

        span1.innerHTML = first;
        span2.innerHTML = second;
        span3.innerHTML = third;

        var td = this.col[this.col.length - 1];
        td.innerHTML = "";
        td.appendChild(span1);
        td.appendChild(span2);
        td.appendChild(span3);

        this.col[this.col.length - 1] = td;
    }
    getTable() {
        return this.table;
    }
}