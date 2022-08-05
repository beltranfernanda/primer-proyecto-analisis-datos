export class NormalDistribution {

    constructor(values){
        this.values = values
    }

    calculateAverage() {
        var sumOfValues = 0
        for(let i = 0; i < this.values.length; i++){
            if(this.values[i] > 0){
                sumOfValues += parseInt(this.values[i])
            }
        }
        var average = sumOfValues/this.values.length
        return average
    }

    calculateSquaredDeviations() {
        let listOfSquaredDeviations = []
        let average = this.calculateAverage()
        for(let i = 0; i < this.values.length; i++){
            if(this.values[i] > 0) {
                let desviation = (parseInt(this.values[i]) - average)
                listOfSquaredDeviations[i] = Math.pow(desviation, 2)
            } else {
                listOfSquaredDeviations[i] = 0
            }
        }
        return listOfSquaredDeviations
    }

    calculateVariance() {
        let listOfSquaredDeviations = this.calculateSquaredDeviations()
        var sumOfSquaredDeviations = 0
        for(let i = 0; i < listOfSquaredDeviations.length; i++){
            if(listOfSquaredDeviations[i] > 0) {
                sumOfSquaredDeviations += listOfSquaredDeviations[i]
            }
        }
        let variance = sumOfSquaredDeviations/listOfSquaredDeviations.length
        return variance
    }

    calculateStandardDeviation() {
        let variance = this.calculateVariance()
        let standarDeviation = Math.sqrt(variance)
        return standarDeviation
    }

    calculateMaxValue() {
        var maxValue = 0
        for(let i = 0; i < this.values.length; i++){
            if(this.values[i] > maxValue){
                maxValue = parseInt(this.values[i])
            }
        }
        return maxValue
    }

    generateValuesOfX() {
        let average = this.calculateAverage()
        let maxValue = this.calculateMaxValue()
        let minValue = -(maxValue-average) 
        
        let listOfValuesOfX = []
        var j = 0
        for(let i = minValue; i <= maxValue; i++){
            listOfValuesOfX[j] = i
            j++
        }
        return listOfValuesOfX
    }

    calculateNormalDistribution() {
      let listOfValuesOfX = this.generateValuesOfX()
      let average = this.calculateAverage()
      let standarDeviation = this.calculateStandardDeviation()
      let listOfValuesOfNormalDistribution = []
      for(let i = 0; i <= listOfValuesOfX.length; i++){
         listOfValuesOfNormalDistribution[i] = this.generateValueOfNormalDistribution(listOfValuesOfX[i], average, standarDeviation)
      }
      return listOfValuesOfNormalDistribution
    }

    generateValueOfNormalDistribution(valueX, average, standarDeviation){
        let numerator = -Math.pow((valueX - average), 2)
        let divisorOne = 2 * Math.pow(standarDeviation, 2)
        let exponentEuler = numerator / divisorOne
        let highEuler = Math.pow(Math.E, exponentEuler) 
        let divisorTwo = standarDeviation * Math.sqrt(2 * Math.PI)
        let valueOfNormalDistribution = (highEuler / divisorTwo)
        return valueOfNormalDistribution
    }
}