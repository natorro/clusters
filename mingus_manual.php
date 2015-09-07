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

<font class="red">Gu&iacute;a B&aacute;sica Mingus</font>

<br><br>
<table width="620px" border="0">
  <tr>

<p class="red">1.0 Conexi&oacute;n remota </p>


<p> La conexi&oacute;n al cluster es similar a la conexi&oacute;n hacia cualquier m&aacute;quina con sistema operativo Unix/Linux.
  Para acceder al sistema, debe utilizar la herramienta de comunicaci&oacute;n Secure Shell(ssh).<br />
  El nombre del cluster es mingus.fisica.unam.mx </p>

<p>
natorro@macondo:~$ ssh -l natorro mingus.fisica.unam.mx
</p>
<p>
The authenticity of host 'mingus.fisica.unam.mx (132.248.7.64)' can't be established.</p>
<p>
RSA key fingerprint is dc:e8:0f:a9:36:50:1c:c7:91:24:50:3c:29:07:e2:bb.</p>
<p>
Are you sure you want to continue connecting (yes/no)? yes</p>
<p>
Warning: Permanently added 'mingus.fisica.unam.mx,132.248.7.64' (RSA) to the list of known hosts.</p>
<p>

 natorro@mingus.fisica.unam.mx's password: </p>
<p>

Last login: Fri Nov 23 11:12:40 2007 from 132.248.209.200</p>
<p>

[natorro@mingus ~]$ </p>

<p></p>

  </tr>
</table>


<p> El servicio ssh tambi&eacute;n permite la transferencia de archivos
  utilizando las instrucciones scp y sftp. En contraste, los
  instrucciones r* como rsh y rcp no est&aacute;n instaladas.
</p>
<p> Si es primera vez que se conecta al cluster es recomendable generar
  las llaves p&uacute;blicas para que el acceso a los nodos esclavos sea sin
  password, esto con el fin de que se pueda ejecutar programas que hacen
  acceso remoto de estos nodos como programas que usan la biblioteca

  MPI. </p>

Se puede lograr tecleando los siguientes comandos:
<p>
[natorro@mingus ~]$ ssh-keygen -t rsa</p> 
<p>
[natorro@mingus ~]$ cd .ssh</p> 
<p>
[natorro@mingus ~]$ cat id_rsa.pub >> authorized_keys</p> 
<p>
[natorro@mingus ~]$ chmod 700 *</p> 


<p class="red"> 1.1.  Cambiar la contrase&ntilde;a</p>
<p> La instrucci&oacute;n para cambiar la contrase&ntilde;a es passwd. </p>
<p> [natorro@mingus ~]$ passwd<br />
  Changing password for user natorro.<br />
  Changing password for natorro<br />

  (current) UNIX password: <br />
  New UNIX password: </p>
<p class="red">1.2.  Cambiar el shell </p>
<p> Para cambiar el shell default (bash) se puede usar la instrucci&oacute;n  chsh: </p>
<p> [natorro@mingus ~]$ chsh<br />
  Changing shell for natorro.<br />

  Password: <br />
  New shell [/bin/bash]: <br />
</p>
<p> Las opciones de shell que existentes son: </p>
<p> /bin/csh<br />
  /bin/sh<br />
  /bin/tcsh<br />

  /bin/ksh </p>
<p class="red">2.  Almacenamiento </p>
<p> Existen solo un espacio de almacenamiento para usuarios: el permanente (HOME). </p>
<p> Almacenamiento permanente (HOME):</p>
<p> Su ruta est&aacute; definida en la variable de ambiente HOME. Se puede
  utilizar para guardar informaci&oacute;n tal como c&oacute;digos fuente, datos

  de entrada, etc. El espacio disponible es limitado sin cuotas. Los
  archivos en este espacio no ser&aacute;n eliminados por el sistema, sin
  embargo, recuerde que los respaldos de informaci&oacute;n son
  responsabilidad del usuario. </p>
<p> Se plantea usar un espacio temporal en el futuro cercano para los<br />

  usuarios que tengan necesidad de almacenamiento muy grandes. </p>
<p class="red"> 3.  Compilaci&oacute;n de programas seriales </p>
<p> En mingus se encuentran disponibles las suites de compiladores Intel y
  GNU. En la tabla se muestran las intrucciones de cada suite
  correspondientes a los lenguajes C, C++, Fortran 77, Fortran 90/95: </p>
<pre> 

Lenguaje	Fabricante	 Instrucci&oacute;n
Fortran 77	Intel		 ifort
Fortran 90	Intel		 ifort
Fortran 95	Intel		 ifort
C		GNU		 gcc
C++		GNU		 g++
Fortran 77	GNU		 g77
C#		Novell Inc	 mcs
Perl		Larry Wall	 perl 
</pre>
<p class="red">3.2.  Intel </p>
<p class="red">3.2.1. Versi&oacute;n </p>
<p> Para desplegar la versi&oacute;n del compilador de intel utilice la opci&oacute;n  -V: </p>
<p> [natorro@mingus ~]$ ifort -V </p>
<p> Intel(R) Fortran Compiler for applications running on Intel(R) 64,<br />

  Version 10.0 <br />
  Build 20070426 Package ID: l_fc_p_10.0.023<br />
  Copyright (C) 1985-2007 Intel Corporation.  All rights reserved.<br />
  FOR NON-COMMERCIAL USE ONLY </p>

<p> <span class="red">3.2.2.Compilar un programa </span></p>
<p> Para compilar un programa con Intel, utilice el compilador<br />

  correspondiente de la siguiente forma: </p>
<p> [opciones] nombre_programa </p>
<p> [natorro@mingus ~]$ ifort hello_world.f </p>
<p> [natorro@mingus ~]$ ./a.out    Hello World </p>
<p> <span class="red">3.3 GNU </span></p>
<p class="red"> 3.3.1. Versi&oacute;n </p>

<p> Para obtener la versi&oacute;n de un compilador GNU, emplee -v: </p>
<p> [natorro@mingus ~]$ gcc -v<br />
  Using built-in specs.<br />
  Target: x86_64-redhat-linux<br />
  Configured with: ../configure --prefix=/usr --mandir=/usr/share/man <br />
  --infodir=/usr/share/info --enable-shared --enable-threads=posix <br />

  --enable-checking=release --with-system-zlib --enable-__cxa_atexit <br />
  --disable-libunwind-exceptions --enable-libgcj-multifile <br />
  --enable-languages=c,c++,objc,obj-c++,java,fortran,ada --enable-java-awt=gtk<br />
  --disable-dssi --enable-plugin <br />
  --with-java-home=/usr/lib/jvm/java-1.4.2-gcj-1.4.2.0/jre --with-cpu=generic <br />
  --host=x86_64-redhat-linux<br />

  Thread model: posix<br />
  gcc version 4.1.1 20070105 (Red Hat 4.1.1-52)<br />
</p>
<p> [natorro@mingus ~]$ g77 -v<br />
  Reading specs from /usr/lib/gcc/x86_64-redhat-linux/3.4.6/specs<br />
  Configured with: ../configure --prefix=/usr --mandir=/usr/share/man <br />
  /&gt;--infodir=/usr/share/info --enable-shared --enable-threads=posix <br />

  --disable-checking --with-system-zlib --enable-__cxa_atexit <br />
  --disable-libunwind-exceptions --enable-languages=c,c++,f77 --disable-libgcj<br />
  --host=x86_64-redhat-linux  Thread model: posix<br />
  gcc version 3.4.6 20060404 (Red Hat 3.4.6-4)<br />
</p>
<p class="red">3.3.2.  Compilar un programa </p>
<p> La manera m&aacute;s simple de usar un compilador de GNU es: </p>

<p> compilador [opciones] nombre_programa<br />
  [natorro@mingus ~]$ gcc hello.c <br />
  [natorro@mingus ~]$ ./a.out <br />
  Hello World</p>
<p> [natorro@mingus ~]$ g77 hello_world.f<br />
  [natorro@mingus ~]$ ./a.out <br />

  Hello World </p>
<p class="red">3.3.3 Extensiones de archivos </p>
<p> El compilador de Intel reconoce las extensiones de archivos que se<br />
  muestran en la tabla </p>
<p> Extensi .A Nsn 	Implicaci Nsn <br />
  .f <br />

</p>
<p> fortran 77 de formato fijo, pero no es preprocesado</p>
<p> .ftn <br />
  .for <br />
  .i <br />
  .fpp <br />
</p>

<p> fortran 77 de formato fijo que ser .A Na preprocesado</p>
<p> .F <br />
  .FOR <br />
  .FTN <br />
  .FPP <br />
  .F90 <br />

</p>
<p> fortran 90 de formato libre que ser .A Na preprocesado  .f90 </p>
<p> </p>
<p> fortran 90 de formato libre que no es preprocesado  .i90 </p>
<p class="red">4.  Compilaci&oacute;n de programas paralelos - MPI</p>
<p> La biblioteca MPI de mingus es MPICH y se puede usar tambi&eacute;n LAM/MPI si<br />
  el usuario as&iacute; lo requiere. </p>

<p> La manera m&aacute;s sencilla de compilar programas MPI es utilizar el<br />
  wrapper correspondiente al lenguaje del programa que se desea<br />
  compilar. Estos wrappers deciden qu .A Ni compilador (GNU o Intel) utilizar<br />
  a partir del valor de una variable de ambiente. La relaci&oacute;n entre<br />
  lenguaje, wrappers y variable de ambiente para compilador se muestran<br />

  a continuaci&oacute;n: </p>
<pre>
Lenguaje	Instrucci&oacute;n  Variable
C		mpicc	     MPI_CC
C++		mpiCC	     MPI_CXX
Fortran 77 	mpif77	     MPI_F77
Fortran 90 	mpif90	     MPI_F90
</pre>
</p>
<p> Por ejemplo, podemos si us&aacute;ramos el wrapper mpicc y mostramos las<br />
  variables que tiene establecidas podemos ver que: </p>
<p> [natorro@mingus ~]$ mpicc -show<br />

  cc -DUSE_STDARG -DHAVE_STDLIB_H=1 -DHAVE_STRING_H=1 -DHAVE_UNISTD_H=1 <br />
  -DHAVE_STDARG_H=1 -DUSE_STDARG=1 -DMALLOC_RET_VOID=1 -L/opt/mpich//lib <br />
  -lmpich -lpthread -lrt </p>
<p class="red">5.  Ejecuci&oacute;n de programas </p>
<p> La ejecuci&oacute;n de programas se realiza a trav&eacute;s del sistema Torque. </p>

<p> Para mostrar los nodos podemos usar pbsnodes: </p>
<p> [natorro@mingus ~]$ pbsnodes <br />
  mingus-1.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />
  ntype = cluster<br />

  status = opsys=linux,uname=Linux mingus-1.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 <br />
  x86_64,sessions=2526, nsessions=1, nusers=1, idletime=1450847, totmem=4031104kb, availmem=3882616kb, 
  physmem=1026960kb, ncpus=4, loadave=0.00, netload=56782350949, state=free, jobs=,varattr=, rectime=1196689199 </p>
<p> mingus-2.fisica.unam.mx<br />
  state = free<br />

  np = 2<br />
  ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-2.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 <br />
  x86_64,sessions=2530, nsessions=1, nusers=1, idletime=1445191, totmem=4031104kb, availmem=3882264kb,
  physmem=1026960kb, ncpus=4, loadave=0.00, netload=52110360473, state=free, jobs=, varattr=, rectime=1196689200 </p>

<p> mingus-3.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />
  ntype = cluster<br />
  status = opsys=linux, uname=Linux mingus-3.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 x86_64, sessions=2518, nsessions=1, nusers=1, idletime=1859892, totmem=4031104kb, availmem=3883404kb,

  physmem=1026960kb, ncpus=4, loadave=0.05, netload=52460255937, state=free, jobs=, varattr=, rectime=1196689195 </p>
<p> mingus-4.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />
  ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-4.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />

  Thu Mar 15 19:46:53 EDT 2007 <br />
  x86_64,sessions=2522,nsessions=1, nusers=1, idletime=1859879, totmem=4031104kb, availmem=3882864kb,
  physmem=1026960kb, ncpus=4, loadave=0.00, netload=49024874106, state=free, jobs=, varattr=, rectime=1196689200 </p>
<p> mingus-5.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />

  ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-5.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 <br />
  x86_64, sessions=2527, nsessions=1, nusers=1, idletime=1859854, totmem=4031104kb, availmem=3885628kb,
  physmem=1026960kb, ncpus=4, loadave=0.00, netload=48899824188, state=free, jobs=, varattr=, rectime=1196689200 </p>
<p> mingus-6.fisica.unam.mx<br />

  state = free<br />
  np = 2<br />
  ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-6.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 <br />
  x86_64, sessions=2509, nsessions=1, nusers=1, idletime=1859843, totmem=4031104kb, availmem=3882480kb,

  physmem=1026960kb, ncpus=4, loadave=0.00, netload=51694648, state=free, jobs=, varattr=, rectime=1196689190 </p>
<p> mingus-7.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />
  ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-7.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />

  Thu Mar 15 19:46:53 EDT 2007 <br />
  x86_64, sessions=2522, nsessions=1, nusers=1, idletime=1859820, totmem=4031104kb, availmem=3885412kb,
  physmem=1026960kb, ncpus=4, loadave=0.00, netload=51419281, state=free, jobs=, varattr=, rectime=1196689207 </p>
<p> mingus-8.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />

  ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-8.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 x86_64, sessions=2669, nsessions=1, nusers=1, idletime=1821041,totmem=8500796kb, availmem=8328420kb,
  physmem=2058740kb, ncpus=4, loadave=0.00, netload=153163613, state=free, jobs=, varattr=, rectime=1196689187 </p>
<p> mingus-9.fisica.unam.mx<br />
  state = free<br />

  np = 2<br />
  ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-9.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 <br />
  x86_64, sessions=2666, nsessions=1, nusers=1, idletime=1857379, totmem=8500796kb, availmem=8328244kb,
  physmem=2058740kb, ncpus=4, loadave=0.00, netload=152404394, state=free, jobs=, varattr=, rectime=1196689230 </p>

<p> mingus-10.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />
 1 ntype = cluster<br />
  status = opsys=linux,uname=Linux mingus-10.fisica.unam.mx 2.6.18-8.el5 #1 <br />
  SMP Thu Mar 15 19:46:53 EDT 2007 x86_64, sessions=? 15201, nsessions=? <br />

  15201, nusers=0, idletime=2049483, totmem=8508828kb, availmem=8348920kb,
   physmem=2058740kb, ncpus=4, loadave=0.00, netload=147215304, state=free, jobs=, varattr=, rectime=1196689197 </p>
<p> mingus.fisica.unam.mx<br />
  state = free<br />
  np = 2<br />
  ntype = cluster<br />

  status = opsys=linux,uname=Linux mingus.fisica.unam.mx 2.6.18-8.el5 #1 SMP<br />
  Thu Mar 15 19:46:53 EDT 2007 x86_64,sessions=2648 2660 <br />
  2878, nsessions=3, nusers=2, idletime=496859, totmem=4031104kb, availmem=3852668kb,
  physmem=1026960kb, ncpus=4, loadave=0.07, netload=113504752689, state=free, jobs=, varattr=, rectime=1196689206 </p>
<p class="red">5.1.  Colas </p>
<p> Existen diferentes colas, cada una con un prop&oacute;sito particular. Para  conocer las colas existentes, utilice la instrucci&oacute;n . Esta  instrucci&oacute;n muestra el nombre de las colas, y sus limites: </p>

<pre>
[natorro@mingus ~]$ qstat -q

server: mingus.fisica.unam.mx

Queue            Memory CPU Time Walltime Node  Run Que Lm  State
---------------- ------ -------- -------- ----  --- --- --  -----
prueba           2000mb 02:00:00    --      --    0   0 12   E R
short            2000mb 48:00:00    --      --    0   0  8   E R
medium           2000mb 240:00:0    --      --    0   0 11   E R
long             2000mb 720:00:0    --      --    0   0  4   E R
                                               ----- -----
                                                   0     0
</pre>

<p class="red">5.2 Torque</p>
<p> Torque es un sistema de colas basado en PBS (Portable Batch System)  este sistema sirve para someter, monitorear y controlar trabajos por  lotes en uno o m&aacute;s sistemas. Por lotes significa que un trabajo ser  calendarizado para ejecutarse en un tiempo determinado por el  subsistema de acuerdo a una cierta pol&iacute;tica y disponibilidad de los  recursos. </p>
<p> Un trabajo es t&iacute;picamente un shell script y un conjunto de atributos  que proveen informaci&oacute;n de recursos y control acerca del trabajo. A  continuaci&oacute;n se describen los comandos b&aacute;sicos para utilizar Torque. </p>

<p class="red">5.2.1 Monitoreo de la ejecuci&oacute;n de trabajos con qstat </p>
<p> El comando qstat muestra el estado de los trabajos de PBS. La sintaxis es: </p>
<p> %qstat [opciones]     OPCIONES </p>
<p> Las opciones de qstat m&aacute;s comunes son: </p>
<p> -a 	Muestra todos los procesos del usuario.<br />
  -q 	Despliega la informaci&oacute;n b&aacute;sica mas el nombre de las colas.<br />

  -s 	Muestra la informaci&oacute;n b&aacute;sica mas la suministrada por el -calendarizador.  -Q 	Despliega informaci&oacute;n b&aacute;sica y el nombre de las colas.<br />
  -f 	Muestra detalles de la ejecuci&oacute;n de los trabajos del usuario.<br />
</p>
<p> Para mas informaci&oacute;n y opciones teclear: </p>
<p> %man qstat </p>

<p> La salida de la instrucci&oacute;n qstat es: </p>
<p> [natorro@mingus]$ qstat -q<br />
  Job id           Name             User             Time Use S Queue<br />
  ---------------- ---------------- ---------------- -------- - -----<br />
  2145.zc1         myjob.tcsh       eccf                    0 R default<br />
</p>

<p> La cual muestra el identificador del trabajo (2145.zc1) - .A Nztil para  ``matarlo'' si es necesario -; el nombre del shell script  (myjob.tcsh); el login del usario (natorro); el estado en el que se  encuentra el trabajo ('R'ejecut&aacute;ndose) y el nombre de la cola  (default) que esta atendiendo este proceso. </p>
<p> La salida de la instrucci&oacute;n qstat -q es: </p>
<pre>
server: mingus.fisica.unam.mx

Queue            Memory CPU Time Walltime Node  Run Que Lm  State
---------------- ------ -------- -------- ----  --- --- --  -----
prueba           2000mb 02:00:00    --      --    0   0 12   E R
short            2000mb 48:00:00    --      --    0   0  8   E R
medium           2000mb 240:00:0    --      --    0   0 11   E R
long             2000mb 720:00:0    --      --    0   0  4   E R
                                               ----- -----
                                                   0     0

 </pre>


<p class="red">5.2.2 Eliminaci&oacute;n de trabajos con qdel</p>

<p> El comando qdel elimina un trabajo ejecut&aacute;ndose en PBS. La sintaxis  es: </p>
<p> %qdel [opciones]  identificador_del_proceso </p>
<p> La instrucci&oacute;n qdel 2146.zc1 elimina de PBS el trabajo con  identificador 2146.zc1. </p>
<p> <font class="red">5.2.3  Creando un Shell script para trabajo serial</font> </p>
<p> Para someter un trabajo al entorno de PBS es necesario crear un shell  script que contenga los comandos a ejecutar y los recursos necesarios  para su ejecuci&oacute;n. Dentro de este archivo se pueden incluir: </p>

<p> * Ordenes y sentencias de control de PBS.<br />
  * Opciones del comando qsub.<br />
  * Instrucciones del sistema.<br />
  * Comentarios. </p>
<p> Un trabajo serial puede someterse de dos maneras: en ``modo dedicado''  y en ``modo compartido''. En modo dedicado se reserva un procesador  dedicado exclusivamente para el trabajo, pero su ejecuci&oacute;n se iniciara  hasta que haya un procesador disponible. En modo compartido el  programa se empezara a ejecutar inmediatamente, pero compartir&aacute; los  recursos con otros trabajos. Ambos modos deben utilizar la cola  . </p>

<p> El siguiente es un ejemplo de un shell script llamado mishell que  ejecuta un trabajo serial en modo compartido: </p>
<p> #***********************************************************************<br />
  #!/bin/bash<br />
  #PBS -q prueba<br />
  #PBS -o misalida35<br />
  #PBS -e errores<br />

  #PBS -l mem=370Mb<br />
  cd /home/natorro<br />
  cp $HOME/t.F .<br />
  # Compilar el programa con algunas opciones<br />
  ifort -o corre t.F -Vaxlib<br />
  # Correr el programa<br />

  /home/natorro/corre<br />
  #Borrar el ejecutable para no saturar el disco<br />
  rm corre<br />
  #<br />
  #***********************************************************************<br />
</p>
<p> Para someter este trabajo, escribimos: </p>

<p> %qsub mishell </p>
<p> La salida de la instrucci&oacute;n anterior es: 2144.zc1, el cual es el  identificador del proceso. Este shell script generar&iacute;a dos archivos de  salida, adem&aacute;s de los que genere el mismo programa: misalida35 y  errores. El primero contiene toda la salida que ira a la salida  est&aacute;ndar (el monitor). El segundo contiene los errores de la  compilaci&oacute;n -si los hubiere- y en general los errores generados por la  ejecuci&oacute;n del shell script. Si las opciones #$PBS -o$ y #$PBS -e$ no  se especifican, PBS genera dos archivos llamados mishell.o2144 y  mishell.e2144, cuyos nombres est&aacute;n formados por el nombre del shell  script mas 'o' (para la salida est&aacute;ndar) y 'e' (para los errores) mas  el identificador del trabajo, en este caso 2144. </p>
<p> Por otra parte, el siguiente ejemplo muestra como mandar un trabajo  serial en modo dedicado. </p>

<p> #***********************************************************************<br />
  #!/bin/bash<br />
  #PBS -q short<br />
  #PBS -o misalida35<br />
  #PBS -e errores<br />
  #PBS -l nodes=1<br />

  #PBS -l mem=370Mb<br />
  cd /home/natorro<br />
  cp $HOME/t.F .<br />
  # Compilar el programa con algunas opciones<br />
  ifcbin -o corre t.F -Vaxlib<br />
  # Correr el programa<br />

  /home/natorro/corre <br />
  #Borrar el ejecutable para no saturar el disco<br />
  rm corre<br />
  #<br />
  ***********************************************************************<br />
</p>
<p> %qsub mishell </p>

<p> La diferencia entre ambos ejemplos es la opci&oacute;n #PBS -l nodes=1 la  cual especifica que solicitamos un solo nodo para este trabajo. </p>
<p> NOTAS </p>
<p> * Cuando las opciones van dentro del archivo deben especificarse al    principio del mismo, una por cada l&iacute;nea y precedidas por #PBS, sin    dejar espacios. Por ejemplo: </p>
<p> #PBS -l mem=50mb </p>
<p class="red"> <strong>5.2.4  Creando un Shell script para un trabajo usando MPI</strong> </p>

<p> Ejemplo de un shell script llamado mishell:</p>
<p> #***********************************************************************<br />
  #!/bin/bash<br />
  #PBS -q long<br />
  #PBS -l nodes=8<br />
  #PBS -l mem=370Mb<br />

  cd /home/natorro/<br />
  cat `echo $PBS_NODEFILE`<br />
  time  mpirun -machinefile $PBS_NODEFILE -np 8 /home/natorro/a.out<br />
  #***********************************************************************<br />
</p>
<p> Con el shell script anterior queremos correr en la cola llamada   que tiene 500MB por nodo y 8 nodos. Para ejecutarlo en los  nodos que tenga disponibles PBS se deber&aacute; utilizar la variable  PBS_NODEFILE como archivo de maquinas para mpirun. </p>

<p class="red"> <strong>5.2.5 Limites y recursos de las colas</strong> </p>
<p>
Hay 4 colas disponibles en el cluster, cada una con l&iacute;mited de 2 GB de memoria RAM y como &uacute;nica limitante el tiempo del trabajo a ponerse a consideraci&oacute;n:</p>

<pre>
prueba    2  hrs
short     48 hrs
medium    240 hrs
long      720 hrs
</pre>
</p>
<p class="red"> <strong>6.  Referencias</strong> </p>
<p> Intel Fortran User's Guide <br />

  <a href="http://www.intel.com/cd/software/products/asmo-na/eng/279831.htm" target="_blank">http://www.intel.com/cd/software/products/asmo-na/eng/279831.htm</a> </p>
<p> Torque Resource Manager <br />
  <a href="http://www.clusterresources.com/pages/products/torque-resource-manager.php" target="_blank">http://www.clusterresources.com/pages/products/torque-resource-manager.php</a> </p>







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
