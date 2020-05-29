<?php
        include "config.php";

        if(!empty($_POST['registro'])){
            if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['telefone'])){
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Llene todos los campos')
                    window.location.href='index.php';
                    </SCRIPT>");
            }else{

                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = md5($_POST['senha']);
                $telefone = $_POST['telefone'];

                $query = mysqli_query($connect, "SELECT * FROM usuarios WHERE email = '$email' OR telefone = '$telefone'");
                $result = mysqli_fetch_array($query);

                if($result > 0){
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Já cadastrado')
                    window.location.href='index.php';
                    </SCRIPT>");
                }else {
                    $query_insert = mysqli_query($connect, "INSERT INTO usuarios(nome,email,senha,telefone)
                                                                        VALUES('$nome','$email','$senha','$telefone')");
                    if($query_insert){
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Cadastrado com sucesso, faça login')
                        window.location.href='index.php';
                        </SCRIPT>");
                    }else{

                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Erro ao cadastrar')
                        window.location.href='index.php';
                        </SCRIPT>");

                    }    
            }

            }
        }
?>