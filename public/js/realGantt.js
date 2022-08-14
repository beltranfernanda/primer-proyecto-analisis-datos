// THE CHART
var realSubTask = []

for(let i = 0; i<schedules.real.subtasks.length; i++){
    const ob = {
        id: ''+i,
        name: schedules.real.subtasks[i].name,
        start:  Date.parse(schedules.real.subtasks[i].start),
        end: Date.parse(schedules.real.subtasks[i].end)
    }
    this.realSubTask.push(ob);
}

for(let i = 1; i< this.realSubTask.length; i++){
    let dependency = undefined;
    let j = i-1;
    while(dependency === undefined && j>-1){
        if(
            this.realSubTask[j].end !== undefined && 
            this.realSubTask[i].start !== undefined && 
            this.realSubTask[i].start >= this.realSubTask[j].end
        ){
            dependency = this.realSubTask[j].id;   
        }
        j--;
    };
    this.realSubTask[i].dependency = dependency;
}

Highcharts.ganttChart('realGantt', {
    title: {
        text: schedules.real.name
    },
    xAxis: {
        min: Date.parse(schedules.real.start),
        max: Date.parse(schedules.real.end)
    },
        
    series: [{
        name: 'Project 1',
        data: this.realSubTask
    }]
});