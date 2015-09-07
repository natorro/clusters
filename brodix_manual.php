<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Clusters - IFUNAM</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />	
 	<!--[if IE]>
                <link href="style2.css" rel="stylesheet" type="text/css">
        <![endif]-->
	<script type="text/javascript" src="js/bsn.Crossfader.js"></script>
	
	
	<script languaje="JavaScript">
	function mueveimg(img_name,img_src)
		{
			document[img_name].src=img_src;
		}
	</script> 	
	
	
</head>

<body>

<div id="wrapper">
	  <?php include("top_menu.php");?> 
	
	<div id="body">
		<div id="body-top">
		
			<div id="body-bot">
				
				<?php include("left_menu.php")?>				


			  <div id="contentinfo">

<font class="red">Gu&iacute;a B&aacute;sica Brodix</font>


<br>
<p><font class="red">1. Conexi&oacute;n remota</font>


<p>La conexi&oacute;n al cluster es similar a la conexi&oacute;n hacia cualquier m&aacute;quina con sistema operativo Unix/Linux.

<p>Para acceder al sistema, debe utilizar la herramienta de comunicaci&oacute;n Secure Shell(ssh).

<p>El nombre del cluster es brodix.fisica.unam.mx

<p>natorro@macondo:~$ ssh -l natorro brodix.fisica.unam.mx

 <br>

<p>The authenticity of host 'brodix.fisica.unam.mx (132.248.7.64)' can't be established.

<p>RSA key fingerprint is dc:e8:0f:a9:36:50:1c:c7:91:24:50:3c:29:07:e2:bb.

 <br>

<p>Are you sure you want to continue connecting (yes/no)? yes

<p>Warning: Permanently added 'brodix.fisica.unam.mx,132.248.7.64' (RSA) to the list of known hosts.

 

<p>natorro@brodix.fisica.unam.mxEsta direcci&oacute;n de correo is est&aacute; siendo protegida contra spam, usted necesita Javascript para poder verlo password:

<p>Last login: Fri Nov 23 11:12:40 2007 from 132.248.209.200

<p>[natorro@brodix ~]$

 
	

<p>El servicio ssh tambi&eacute;n permite la transferencia de archivos utilizando las instrucciones scp y sftp.

<p>En contraste, los instrucciones r* como rsh y rcp no est&aacute;n instaladas.


<p>Si es primera vez que se conecta al cluster es recomendable generar las llaves p&uacute;blicas para
que el acceso a los nodos esclavos sea sin password, esto con el fin de que se pueda
ejecutar programas que hacen acceso remoto de estos nodos como programas que usan
la biblioteca MPI. Se puede lograr tecleando los siguientes comandos:

 

<p>[natorro@brodix ~]$ ssh-keygen -t rsa

<p>[natorro@brodix ~]$ cd .ssh

<p>[natorro@brodix ~]$ cat id_rsa.pub >> authorized_keys

<p>[natorro@brodix ~]$ chmod 700 *


<p><font class="red">1.1. Cambiar la contrase&ntilde;a</font>

<p>La instrucci&oacute;n para cambiar la contrase&ntilde;a es passwd.

<p>[natorro@brodix ~]$ passwd

<p>Changing password for user natorro.

<p>Changing password for natorro

<p>(current) UNIX password:

<p>New UNIX password:


<p><font class="red">1.2. Cambiar el shell</font>

<p>Para cambiar el shell default (bash) se puede usar la instrucci&oacute;n chsh:

<p>[natorro@brodix ~]$ chsh

<p>Changing shell for natorro.

<p>Password:

<p>New shell [/bin/bash]:


<p>Las opciones de shell que existentes son:

<p>/bin/csh

<p>/bin/sh

<p>/bin/tcsh

<p>/bin/ksh


<p><font class="red">2. Almacenamiento</font>

<p>Existen solo un espacio de almacenamiento para usuarios: el permanente (HOME).

<p>Almacenamiento permanente (HOME):

<p>Su ruta est&aacute; definida en la variable de ambiente HOME. Se puede utilizar para guardar
informaci&oacute;n tal como c&oacute;digos fuente, datos de entrada, etc. El espacio disponible es
limitado sin cuotas. Los archivos en este espacio no ser&aacute;n eliminados por el sistema,
sin embargo, recuerde que los respaldos de informaci&oacute;n son responsabilidad del usuario.


<p>Se plantea usar un espacio temporal en el futuro cercano para los usuarios que tengan
necesidad de almacenamiento muy grandes.


<p><font class="red">3. Compilaci&oacute;n de programas seriales</font>

<p>En brodix se encuentran disponibles la suites de compiladores Intel y GNU. En la tabla se
muestran las intrucciones de cada suite correspondientes a los lenguajes C, C++,
Fortran 77, Fortran 90/95:

<p>Lenguaje Fabricante Instrucci&oacute;n

<p>Fortran 77 Intel ifort

<p>Fortran 90 Intel ifort

<p>Fortran 95 Intel ifort

<p>C GNU gcc

<p>C++ GNU g++

<p>C# Novell Inc mcs

<p>Perl Larry Wall perl

 
<p><font class="red">3.2. Intel</font>

<p><font class="red">3.2.1. Versi&oacute;n</font>

<p>Para desplegar la versi&oacute;n del compilador de intel utilice la opci&oacute;n -V:

<p>[natorro@brodix ~]$ ifort -V


<p>Intel(R) Fortran Compiler for applications running on IA-32, Version 10.1 Build 20080312 Package 

<p>ID: l_fc_p_10.1.015

<p>Copyright (C) 1985-2008 Intel Corporation. All rights reserved.

<p>FOR NON-COMMERCIAL USE ONLY


<p><font class="red">3.2.2.Compilar un programa</font>

<p>Para compilar un programa con Intel, utilice el compilador correspondiente de la siguiente forma:

<p>ifort [opciones] nombre_programa

<p>[natorro@brodix ~]$ ifort hello_world.f

<p>[natorro@brodix ~]$ ./a.out Hello World


<p><font class="red">3.3 GNU</font>

<p><font class="red">3.3.1. Versi&oacute;n</font>

<p>Para obtener la versi&oacute;n de un compilador GNU, emplee -v:

<p>[natorro@brodix ~]$ gcc -v

<p>Reading specs from /usr/lib/gcc/i386-redhat-linux/3.4.6/specs

<p>Configured with: ../configure --prefix=/usr --mandir=/usr/share/man --infodir=/usr/share/info

<p>--enable-shared --enable-threads=posix --disable-checking --with-system-zlib --enable-__cxa_atexit

<p>--disable-libunwind-exceptions --enable-java-awt=gtk --host=i386-redhat-linux

<p>Thread model: posix

<p>gcc version 3.4.6 20060404 (Red Hat 3.4.6-9)


<p><font class="red">3.3.2. Compilar un programa</font>

<p>La manera m&aacute;s simple de usar un compilador de GNU es:

<p>compilador [opciones] nombre_programa

<p>[natorro@brodix ~]$ gcc hello.c

<p>[natorro@brodix ~]$ ./a.out

<p>Hello World


<p><font class="red">3.3.3 Extensiones de archivos</font>

<p>El compilador de Intel reconoce las extensiones de archivos que se

<p>muestran en la tabla

<p>Extensi&oacute;n .f

<p>fortran 77 de formato fijo, pero no es preprocesado

<p>.ftn

<p>.for

<p>.i

<p>.fpp


<p>fortran 77 de formato fijo que ser&aacute; preprocesado

<p>.F

<p>.FOR

<p>.FTN

<p>.FPP

<p>.F90


<p>fortran 90 de formato libre que ser&aacute; preprocesado .f90

<p>fortran 90 de formato libre que no es preprocesado .i90


<p><font class="red">4. Compilaci&oacute;n de programas paralelos - MPI</font>

<p>La biblioteca MPI de brodix es MPICH y se puede usar tambi&eacute;n LAM/MPI si el usuario as&iacute; lo requiere.

<p>La manera m&aacute;s sencilla de compilar programas MPI es utilizar el wrapper correspondiente al lenguaje del
programa que se desea compilar. Estos wrappers deciden qu&eacute; compilador (GNU o Intel) utilizar a partir
del valor de una variable de ambiente. La relaci&oacute;n entre lenguaje, wrappers y variable de ambiente para
compilador se muestran a continuaci&oacute;n:


<p>Lenguaje Instrucci&oacute;n Variable

<p>C mpicc MPI_CC

<p>C++ mpiCC MPI_CXX

<p>Fortran 77 mpif77 MPI_F77

<p>Fortran 90 mpif90 MPI_F90


<p>Por ejemplo, podemos si us&aacute;ramos el wrapper mpicc y mostramos las variables que tiene establecidas
podemos ver que:

<p>[natorro@brodix ~]$ mpicc -show


<p>cc -DUSE_STDARG -DHAVE_STDLIB_H=1 -DHAVE_STRING_H=1 -DHAVE_UNISTD_H=1

<p>-DHAVE_STDARG_H=1 -DUSE_STDARG=1 -DMALLOC_RET_VOID=1 -L/opt/mpich/lib -lmpich -lpthread -lrt


<br><p><font class="red">5. Ejecuci&oacute;n de programas</font>

<p>La ejecuci&oacute;n de programas se realiza a trav&eacute;s del sistema Torque.

<p>Para mostrar los nodos podemos usar pbsnodes:


<p>[natorro@brodix ~]$ pbsnodes

<p>mosix2.fisica.unam.mx

<br>state = free

<br>np = 1

<br>ntype = cluster

<br>status = opsys=linux, uname=Linux mosix2.fisica.unam.mx 2.6.9-67.0.4.ELsmp #1 SMP Thu Jan 31 16:30:09

CST 2008 i686, sessions=1093, nsessions=1, nusers=1,i

<br>dletime=944599, totmem=3057536kb, availmem=2770728kb, physmem=1025928kb, ncpus=2, loadave=0.00,

netload=1542312096, state=free, jobs=, varattr=, rectime=1218556845

 

<p>mosix3.fisica.unam.mx

<br>state = free

<br>np = 1

<br>ntype = cluster

<br>status = opsys=linux, uname=Linux mosix3.fisica.unam.mx 2.6.9-67.0.4.ELsmp #1 SMP Thu Jan 31 16:30:09

CST 2008 i686, sessions=? 15201, nsessions=? 15201, n

<br>users=0, idletime=672669, totmem=3064648kb, availmem=2755136kb, physmem=1033040kb, ncpus=1, loadave=0.00

netload=1327592578, state=free, jobs=, varattr=, rectime=1218

<br>556812


<p>mosix4.fisica.unam.mx

<br>state = free

<br>np = 1

<br>ntype = cluster

<br>status = opsys=linux, uname=Linux mosix4.fisica.unam.mx 2.6.9-67.0.4.ELsmp #1 SMP Thu Jan 31 16:30:09

CST 2008 i686, sessions=? 15201, nsessions=? 15201, n

<br>users=0, idletime=944623, totmem=3064648kb, availmem=2759636kb, physmem=1033040kb, ncpus=2, loadave=0.00,

netload=3448100448, state=free, jobs=, varattr=, rectime=1218

<br>556836


<p>mosix5.fisica.unam.mx

<br>state = free

<br>np = 1

<br>ntype = cluster

<br>status = opsys=linux, uname=Linux mosix5.fisica.unam.mx 2.6.9-67.0.4.ELsmp #1 SMP Thu Jan 31 16:30:09

CST 2008 i686, sessions=? 15201, nsessions=? 15201, n

<br>users=0, idletime=944618, totmem=3064648kb, availmem=2757192kb, physmem=1033040kb, ncpus=1, loadave=0.00,

netload=1449927685, state=free, jobs=, varattr=, rectime=1218

<br>556839


<p>mosix6.fisica.unam.mx

<br>state = free

<br>np = 1

<br>ntype = cluster

<br>status = opsys=linux, uname=Linux mosix6.fisica.unam.mx 2.6.9-67.0.4.ELsmp #1 SMP Thu Jan 31 16:30:09

CST 2008 i686, sessions=? 15201, nsessions=? 15201,n

<br>users=0, idletime=944592, totmem=3064648kb, availmem=2753748kb, physmem=1033040kb, ncpus=2, loadave=0.00,

netload=3813576666, state=free, jobs=, varattr=, rectime=1218

<br>556813



<p><font class="red">5.1. Colas</font>

<p>Existen diferentes colas, cada una con un prop&oacute;sito particular. Para conocer las colas existentes,
utilice la instrucci&oacute;n . Esta instrucci&oacute;n muestra el nombre de las colas, y sus limites:

<p>[natorro@brodix ~]$ qstat -q

<p>server: brodix.fisica.unam.mx

<p>server: brodix

<em>
<p>Queue Memory CPU Time Walltime Node Run Que Lm State

<p>---------------- ------ -------- -------- ---- --- --- -- -----

<p>batch      --        --       --       0 0 -- E R

<p>                                    ----- -----

<p>                                      0      0

 </em>

<p><font class="red">5.2 Torque</font>

<p>Torque es un sistema de colas basado en PBS (Portable Batch System) este sistema sirve para
someter, monitorear y controlar trabajos por lotes en uno o m&aacute;s sistemas. Por lotes significa que
un trabajo ser calendarizado para ejecutarse en un tiempo determinado por el subsistema de acuerdo a
una cierta pol&iacute;tica y disponibilidad de los recursos.

<p>Un trabajo es t&iacute;picamente un shell script y un conjunto de atributos que proveen informaci&oacute;n de recursos
y control acerca del trabajo. A continuaci&oacute;n se describen los comandos b&aacute;sicos para utilizar Torque.


<p><font class="red">5.2.1 Monitoreo de la ejecuci&oacute;n de trabajos con qstat</font>


<p>El comando qstat muestra el estado de los trabajos de PBS.

<p>La sintaxis es:

<p>%qstat [opciones] OPCIONES


<p>Las opciones de qstat m&aacute;s comunes son:

<p>-a Muestra todos los procesos del usuario.

<p>-q Despliega la informaci&oacute;n b&aacute;sica mas el nombre de las colas.

<p>-s Muestra la informaci&oacute;n b&aacute;sica mas la suministrada por el -calendarizador. -Q Despliega informaci&oacute;n
b&aacute;sica y el nombre de las colas.

<p>-f Muestra detalles de la ejecuci&oacute;n de los trabajos del usuario.


<p>Para mas informaci&oacute;n y opciones teclear:

<p>%man qstat


<p>La salida de la instrucci&oacute;n qstat es:

<p>[natorro@brodix]$ qstat -q

<em>

<p>Job id Name User Time Use S Queue

<p>---------------- ---------------- ---------------- -------- - -----

<p>2145.zc1 myjob.tcsh eccf 0 R default

</em>


<p>La cual muestra el identificador del trabajo (2145.zc1) - .A Nztil para ``matarlo'' si es necesario -; el nombre
del shell script (myjob.tcsh); el login del usario (natorro); el estado en el que se encuentra el trabajo
('R'ejecut&aacute;ndose) y el nombre de la cola (default) que esta atendiendo este proceso.


<p><font class="red">5.2.2 Eliminaci&oacute;n de trabajos con qdel</font>

<p>El comando qdel elimina un trabajo ejecut&aacute;ndose en PBS. La sintaxis es:

%qdel [opciones] identificador_del_proceso

La instrucci&oacute;n qdel 2146.zc1 elimina de PBS el trabajo con identificador 2146.zc1.


<br><p><font class="red">5.2.3 Creando un Shell script para trabajo serial</font>

<p>Para someter un trabajo al entorno de PBS es necesario crear un shell script que contenga los
comandos a ejecutar y los recursos necesarios para su ejecuci&oacute;n. Dentro de este archivo se pueden incluir:

<p>* Ordenes y sentencias de control de PBS.

<p>* Opciones del comando qsub.

<p>* Instrucciones del sistema.

<p>* Comentarios.


<p>Un trabajo serial puede someterse de dos maneras: en ``modo dedicado'' y en ``modo compartido''.

<p>En modo dedicado se reserva un procesador dedicado exclusivamente para el trabajo, pero su
ejecuci&oacute;n se iniciara hasta que haya un procesador disponible. En modo compartido el programa
se empezara a ejecutar inmediatamente, pero compartir&aacute; los recursos con otros trabajos.

<p>Ambos modos deben utilizar la cola .


<p>El siguiente es un ejemplo de un shell script llamado mishell que ejecuta un trabajo serial
en modo compartido:

<p>
<em>
<p>#***********************************************************************

<p>#!/bin/bash

<p>#PBS -q batch

<p>#PBS -o misalida35

<p>#PBS -e errores

<p>#PBS -l mem=370Mb

<p>cd /home/natorro

<p>cp $HOME/t.F .

<p># Compilar el programa con algunas opciones

<p>ifort -o corre t.F -Vaxlib

<p># Correr el programa

<p>/home/natorro/corre

<p>#Borrar el ejecutable para no saturar el disco

<p>rm corre

<p>#

<p>#***********************************************************************
</em>

<p>Para someter este trabajo, escribimos:

<p>%qsub mishell


<p>La salida de la instrucci&oacute;n anterior es: 2144.zc1, el cual es el identificador del proceso. Este shell
script generar&iacute;a dos archivos de salida, adem&aacute;s de los que genere el mismo programa:

<p>misalida35 y errores. El primero contiene toda la salida que ira a la salida est&aacute;ndar
(el monitor). El segundo contiene los errores de la compilaci&oacute;n -si los hubiere- y en general los
errores generados por la ejecuci&oacute;n del shell script. Si las opciones #$PBS -o$ y #$PBS -e$
no se especifican, PBS genera dos archivos llamados mishell.o2144 y mishell.e2144,
cuyos nombres est&aacute;n formados por el nombre del shell script mas 'o' (para la salida est&aacute;ndar)
y 'e' (para los errores) mas el identificador del trabajo, en este caso 2144.

<p>Por otra parte, el siguiente ejemplo muestra como mandar un trabajo serial en modo dedicado.

<em>

<p>#***********************************************************************

<p>#!/bin/bash

<p>#PBS -q batch

<p>#PBS -o misalida35

<p>#PBS -e errores

<p>#PBS -l nodes=1

<p>#PBS -l mem=370Mb

<p>cd /home/natorro

<p>cp $HOME/t.F .

<p># Compilar el programa con algunas opciones

<p>ifcbin -o corre t.F -Vaxlib

<p># Correr el programa

<p>/home/natorro/corre

<p>#Borrar el ejecutable para no saturar el disco

<p>rm corre

<p>#

<p>***********************************************************************

</em>
<p>%qsub mishell

<p>La diferencia entre ambos ejemplos es la opci&oacute;n #PBS -l nodes=1 la cual especifica que solicitamos
un solo nodo para este trabajo.


<p>NOTAS

<p>* Cuando las opciones van dentro del archivo deben especificarse al principio del mismo, una
por cada l&iacute;nea y precedidas por #PBS, sin dejar espacios. Por ejemplo:

<p>#PBS -l mem=50mb


<p><font class="red">5.2.4 Creando un Shell script para un trabajo usando MPI</font>

<p>Ejemplo de un shell script llamado mishell:


<em>
<p>#***********************************************************************

<p>#!/bin/bash

<p>#PBS -q batch

<p>#PBS -l nodes=8

<p>#PBS -l mem=370Mb

<p>cd /home/natorro/

<p>cat `echo $PBS_NODEFILE`

<p>time mpirun -machinefile $PBS_NODEFILE -np 8 /home/natorro/a.out

<p>#***********************************************************************

</em>


<p>Con el shell script anterior queremos correr en la cola llamada que tiene 500MB por nodo y 8 nodos.

<p>Para ejecutarlo en los nodos que tenga disponibles PBS se deber&aacute; utilizar la variable PBS_NODEFILE
como archivo de maquinas para mpirun.


<p><font class="red">5.2.5 Limites y recursos de las colas</font>

<p>Hay s&oacute;lamente una cola disponible en el cluster, con l&iacute;mite de 1 GB de memoria RAM y sin limitantes de
tiempo, aunque s&oacute;lo se pueden enviar tres trabajos por usuario.


<p><font class="red">6. Referencias</font>

 

<p>Intel Fortran User's Guide

<p><a href="http://www.intel.com/cd/software/products/asmo-na/eng/279831.htm">http://www.intel.com/cd/software/products/asmo-na/eng/279831.htm</a>


<p>Torque Resource Manager

<p><a href="http://www.clusterresources.com/pages/products/torque-resource-manager.php">http://www.clusterresources.com/pages/products/torque-resource-manager.php</a>



</div>
				
				<div class="clear"></div>
			
			</div>
		</div>
	</div>
</div>	
			<?php include("footer.php");?>
</div>

</body>
</html>
