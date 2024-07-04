let idade = window.prompt(" Digite a sua idade: ")
 if(idade<16){
    alert('Você não tem não pode votar nessa eleição')
 }
 else if( idade== 16 || idade==17 || idade>=80){
    alert('O seu voto é opcional')
 }
 else{
    alert('Você é obrigado a votar')
 }