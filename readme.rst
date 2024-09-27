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
PRUEBAS DE GET,POST,PUT  Y DELETE PARA Ubicaciones
**************************
Post: http://localhost/10a/10A/codeigniter3-rest-controller-main/codeigniter3-rest-controller-main/index.php/Api/Ubicaciones 
{
  "edificio": "D5 ",
  "departamento": "TICS",
  "area": "laboratorio 211"
}

Delete : la liga tiene que estar seguida del ID de la ubicación que se desee eliminar http://localhost/10a/10A/codeigniter3-rest-controller-main/codeigniter3-rest-controller-main/index.php/Api/Ubicaciones/1 seguido del JSON con todos los parámetros que contiene esa ubicación

{
  "edificio": "D5 ",
  "departamento": "TICS",
  "area": "laboratorio 211"
}


GET : con la siguiente liga obtendrá todos los datos http://localhost/10a/10A/codeigniter3-rest-controller-main/codeigniter3-rest-controller-main/index.php/Api/Ubicaciones 

PUT : con la siguiente liga seguida con el ID ingresar los datos a actualizar 
{
  "edificio": "D9 ",
  "departamento": "Automotriz",
  "area": "laboratorio 211"
}


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
