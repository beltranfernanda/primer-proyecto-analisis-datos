// THE CHART

var programmedSubTask = []

for(let i = 0; i<schedules.programmed.subtasks.length; i++){
    const ob = {
        id: ''+i,
        name: schedules.programmed.subtasks[i].name,
        start:  schedules.programmed.subtasks[i].start? Date.parse(schedules.programmed.subtasks[i].start): undefined,
        end: schedules.programmed.subtasks[i].end? Date.parse(schedules.programmed.subtasks[i].end): undefined
    }
    this.programmedSubTask.push(ob);
}

for(let i = 1; i< this.programmedSubTask.length; i++){
    let dependency = undefined;
    let j = i-1;
    while(dependency === undefined && j>-1){
        if(
            this.programmedSubTask[j].end !== undefined && 
            this.programmedSubTask[i].start !== undefined && 
            this.programmedSubTask[i].start >= this.programmedSubTask[j].end
        ){
            dependency = this.programmedSubTask[j].id;   
        }
        j--;
    };
    this.programmedSubTask[i].dependency = dependency;
}


Highcharts.ganttChart('programmedGantt', {
    title: {
        text: schedules.programmed.name
    },
    xAxis: {
        min: Date.parse(schedules.programmed.start),
        max: Date.parse(schedules.programmed.end)
    },
        
    series: [{
        name: 'Project 1',
        data: this.programmedSubTask
    }]
});