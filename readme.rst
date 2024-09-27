###################
CodeIgniter 3 API REST
###################

Proyecto de inventarios 

*******************
PRUEBAS DE GET,POST,PUT  Y DELETE PARA PRESONAS
*******************
Para hacer un post se necesitan estos parámetros 
la liga para thunderclient es : http://localhost/10a/10A/codeigniter3-rest-controller-main/codeigniter3-rest-controller-main/index.php/Api/Personas
{
  "nombre":"Sandra",
  "apaterno": "Neri ",
  "amaterno": "Molina",
  "matricula": "UTP0149702",
  "telefono":"2223771315",
  "correo":"UTP0149702@GMAIL.COM"

}

Si necesito hacer un get se ocupa igual la siguiente liga : http://localhost/10a/10A/codeigniter3-rest-controller-main/codeigniter3-rest-controller-main/index.php/Api/Personas

En caso de hacer un delete necesitamos agregar la liga seguido del ID que queremos borrar  http://localhost/10a/10A/codeigniter3-rest-controller-main/codeigniter3-rest-controller-main/index.php/Api/Personas/1  
y otra vez nuestro JSON con los datos previamente guardados de la persona 

{
  "nombre":"Sandra",
  "apaterno": "Neri ",
  "amaterno": "Molina",
  "matricula": "UTP0149702",
  "telefono":"2223771315",
  "correo":"UTP0149702@GMAIL.COM"

}
Por último para realizar un PUT se necesita poner la liga con el ID de la persona que quieres actualizar http://localhost/10a/10A/codeigniter3-rest-controller-main/codeigniter3-rest-controller-main/index.php/Api/Personas/1  

Nuevamente introducir el JSON junto con los cambios a guardar
{
  "nombre":"Juan",
  "apaterno": "Lopez ",
  "amaterno": "Molina",
  "matricula": "UTP0149702",
  "telefono":"2223771315",
  "correo":"UTP0149702@GMAIL.COM"

}


**************************
Controlador que implemeta la API REST
**************************

application/controllers/Api/Item.php

*******************
Métodos implementados
*******************

GET, POST, PUT, DELETE

*******************
Consumo de los servicios
*******************

Revisa la carpeta /capturas

*******
Licencia
*******

Por favor ver `acuerdo de licencia <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

***************
Agradecimiento
***************

Gracias a Hardik Savani por su valioso aporte https://www.itsolutionstuff.com/post/codeigniter-3-restful-api-tutorialexample.html
