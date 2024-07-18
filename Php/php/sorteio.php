<?php
if(isset($_GET['sorteio'])){
    $num = rand(1,100);
    //echo "$num";
    echo "
    <script>
    if(confirm('o número sorteado é:$num, deseja um novo número ?')){
        location.reload()
    }
    else{
        window.location.href = '../index.html'
    }
    </script>";
}
?>