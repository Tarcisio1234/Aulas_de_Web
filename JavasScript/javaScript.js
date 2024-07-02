//alert("Teste do link")
let num1 = parseFloat(window.prompt('Digite um número:'))
let num2 = parseFloat(window.prompt('Digite outro número:'))
let operacao = window.prompt('Qual operação deseja realizar: \n adição digite: + \n subtração: - \n multiplicação: *\n divisão digite: /')
if (operacao =="+"){
    let resultado = num1+ num2
    alert(resultado)
}
else if(operacao =="-"){
    let resultado = num1-num2
    alert(resultado)
}
else if(operacao =='*'){
    let resultado = num1 * num2
    alert(resultado)
}
else if(operacao =='/'){
    let resultado = num1 / num2
    alert(resultado)
}
else if(operacao == "%"){
    let resultado = num1%num2
    alert(resultado)
}
else{
    alert("Escrva um operador basico")
}
console.log(resultado)
