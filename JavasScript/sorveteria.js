let sabor = window.prompt("Digige o sabor que deseja: \n m = morango\n c = chocolate\n u = uva\n n = napolitano").toLocaleLowerCase()
// A função toLocaleLowerCase faz com que tudo o que for digitado seja em litra minuscula

switch (sabor) {
    case "m":
        alert("Valor kg R$12,00")
        break //break que dizer ao programa que ao execultar o bloco de código é para parar a execulção
    case "b":
        alert("Valor kg R$11,00")
        break
    case "c":
        alert("Valor kg R$18,00")
        break
    case "u":
        alert("Valor kg R$15,00")
        break
    case "n":
        alert("Valor kg R$52,00")
        break
    default:
        alert("Não existe esse sabor")
}