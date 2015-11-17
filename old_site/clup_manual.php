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
				<?php include("left_menu.php");?>
				
				<div id="contentinfo">


<span class="red">Gu&iacute;a B&aacute;sica Clup</span>


<br>
<br />
<p>
1.0 Conexi&oacute;n remota
</p>

<p>
La conexi&oacute;n al cluster es similar a la conexi&oacute;n hacia cualquier m&aacute;quina con sistema 
operativo Unix/Linux. Para acceder al sistema, debe utilizar la herramienta de comunicaci&oacute;n Secure 
Shell(ssh).
</p>

<p>
El nombre del cluster es clup.fisica.unam.mx
</p>

<pre>
natorro@macondo:~$ ssh -l natorro clup.fisica.unam.mx

The authenticity of host 'clup.fisica.unam.mx (132.248.7.65)' can't be established.

RSA key fingerprint is dc:e8:0f:a9:36:50:1c:c7:91:24:50:3c:29:07:e2:bb.

Are you sure you want to continue connecting (yes/no)? yes

Warning: Permanently added 'clup.fisica.unam.mx,132.248.7.65' (RSA) to the list of known hosts.

natorro@clup.fisica.unam.mx's password:

Last login: Fri Aug 23 11:12:40 2013 from 132.248.209.200

[natorro@clup ~]$
</pre>

<p>
El servicio ssh tambi&eacute;n permite la transferencia de archivos utilizando las instrucciones scp y 
sftp. En contraste, los instrucciones r* como rsh y rcp no est&aacute;n instaladas porque son 
comunicaciones inseguras.
</p>

<p>
Si es primera vez que se conecta al cluster es recomendable generar las llaves p&uacute;blicas para que 
el acceso a los nodos esclavos sea sin password, esto con el fin de que se pueda ejecutar programas que 
hacen acceso remoto de estos nodos como programas que usan la biblioteca MPI o incluso el ejecutar 
programas v&iacute;a el sistema de colas.
</p>

<p>
Se puede lograr tecleando los siguientes comandos:
</p>

<pre>
[natorro@clup ~]$ ssh-keygen -t rsa

[natorro@clup ~]$ cd .ssh

[natorro@clup ~]$ cat id_rsa.pub authorized_keys

[natorro@clup ~]$ chmod 700 *
</pre>

<p>
1.1. Cambiar la contraseña
</p>

<p>
La instrucci&oacute;n para cambiar la contraseña es passwd.
</p>

<pre>
[natorro@clup ~]$ passwd
Changing password for user natorro.
Changing password for natorro
(current) UNIX password:
New UNIX password:
</pre>

<p>
1.2. Cambiar el shell
</p>

<p>
Para cambiar el shell default (bash) se puede usar la instrucci&oacute;n chsh:
</p>

<pre>
[natorro@clup ~]$ chsh
Changing shell for natorro.
Password:
New shell [/bin/bash]:
</pre>

<p>
Las opciones de shell que existentes son:
<br />
/bin/csh<br />
/bin/sh<br />
/bin/tcsh<br />
/bin/ksh<br />
</p>

<p>
2. Almacenamiento
</p>
<p>
Existen solo un espacio de almacenamiento para usuarios: el permanente (HOME), este es un espacio grande 
de disco con capacidad de 20 TB, lo que nos permite tener una cantidad considerable de datos.
</p>
<p>
Almacenamiento permanente (HOME):
</p>
<p>
Su ruta est&aacute; definida en la variable de ambiente HOME. Se puede utilizar para guardar 
informaci&oacute;n tal como c&oacute;digos fuente, datos de entrada, etc. El espacio disponible es 
limitado sin cuotas. Los archivos en este espacio no ser&aacute;n eliminados por el sistema, sin embargo, 
recuerde que los respaldos de informaci&oacute;n son responsabilidad del usuario y es importante que 
est&eacute; conciente que un sistema RAID tan grande como el que tenemos puede tener fallas.
</p>

<p>
3. Compilaci&oacute;n de programas seriales
</p>
<p>
En clup se encuentran disponibles las suites de compiladores Intel y GNU. En la tabla se muestran las 
intrucciones de cada suite correspondientes a los lenguajes C, C++, Fortran 77, Fortran 90/95:
</p>
 
<pre>
Lenguaje    Fabricante     Instrucci&oacute;n
Fortran 77    Intel         ifort
Fortran 90    Intel         ifort
Fortran 95    Intel         ifort
C        GNU         gcc
C++        GNU         g++
Fortran 77    GNU         g77
Perl        Larry Wall     perl
</pre>

<p>
3.2. Intel
</p>
<p>
Para poder hacer uso de la suite de compiladores de Intel, es necesario agregar la siguiente l&iacute;nea 
a su archivo .bashrc de su $HOME para que pueda utilizarlo:
</p>
<p>
source /opt/intel/composer_xe_2013.2.146/bin/compilervars.sh intel64
</p>
<p>
3.2.1. Versi&oacute;n
</p>
<p>
Para desplegar la versi&oacute;n del compilador de intel utilice la opci&oacute;n -V:
</p>
<pre>
[natorro@clup ~]# ifort -V
Intel(R) Fortran Intel(R) 64 Compiler XE for applications running on Intel(R) 64, Version 13.1.0.146 
Build 20130121
Copyright (C) 1985-2013 Intel Corporation.  All rights reserved.
FOR NON-COMMERCIAL USE ONLY
</pre>
<p>
3.2.2.Compilar un programa
</p>
<p>
Para compilar un programa con Intel, utilice el compilador
correspondiente de la siguiente forma:
</p>
[opciones] nombre_programa
<pre>
[natorro@clup ~]$ ifort hello_world.f

[natorro@clup ~]$ ./a.out Hello World
</pre>

<p>
3.3 GNU
</p>
<p>
3.3.1. Versi&oacute;n
</p>
Para obtener la versi&oacute;n de un compilador GNU, emplee -v:
<pre>
[root@clup ~]# gcc -v
Using built-in specs.
Target: x86_64-redhat-linux
Configured with: ../configure --prefix=/usr --mandir=/usr/share/man --infodir=/usr/share/info 
--with-bugurl=http://bugzilla.redhat.com/bugzilla --enable-bootstrap --enable-shared 
--enable-threads=posix --enable-checking=release --with-system-zlib --enable-__cxa_atexit 
--disable-libunwind-exceptions --enable-gnu-unique-object 
--enable-languages=c,c++,objc,obj-c++,java,fortran,ada --enable-java-awt=gtk --disable-dssi 
--with-java-home=/usr/lib/jvm/java-1.5.0-gcj-1.5.0.0/jre --enable-libgcj-multifile 
--enable-java-maintainer-mode --with-ecj-jar=/usr/share/java/eclipse-ecj.jar --disable-libjava-multilib 
--with-ppl --with-cloog --with-tune=generic --with-arch_32=i686 --build=x86_64-redhat-linux
Thread model: posix
gcc version 4.4.6 20120305 (Red Hat 4.4.6-4) (GCC)
</pre>

<p>
3.3.2. Compilar un programa
</p>
<p>
La manera m&aacute;s simple de usar un compilador de GNU es:
</p>
compilador [opciones] nombre_programa
<pre>
[natorro@clup ~]$ gcc hello.c
[natorro@clup ~]$ ./a.out
Hello World

[natorro@clup ~]$ g77 hello_world.f
[natorro@clup ~]$ ./a.out
Hello World
</pre>
<p>
3.3.3 Extensiones de archivos
</p>
<p>
El compilador de Intel reconoce las extensiones de archivos .f .ftn .for .i .fpp .F .FOR .FTN .FPP .F90 
.f90 .i90
</p>
<p>
4. Compilaci&oacute;n de programas paralelos - MPI
</p>
<p>
La biblioteca MPI de clup es MPICH y se puede usar tambi&eacute;n OpenMPI si
el usuario as&iacute; lo requiere.
</p>
<p>
La manera m&aacute;s sencilla de compilar programas MPI es utilizar el
wrapper correspondiente al lenguaje del programa que se desea
compilar. Estos wrappers deciden qu&eacute; compilador (GNU o Intel) utilizar
a partir del valor de una variable de ambiente. La relaci&oacute;n entre
lenguaje, wrappers y variable de ambiente para compilador se muestran
a continuaci&oacute;n:
</p>
<pre>
Lenguaje    Instrucci&oacute;n  Variable
C        mpicc         MPI_CC
C++        mpiCC         MPI_CXX
Fortran 77     mpif77         MPI_F77
Fortran 90     mpif90         MPI_F90
</pre>

<p>
Por ejemplo, podemos si us&aacute;ramos el wrapper mpicc y mostramos las
variables que tiene establecidas podemos ver que:
</p>

<pre>
[natorro@clup ~]$ mpicc -show
cc -DUSE_STDARG -DHAVE_STDLIB_H=1 -DHAVE_STRING_H=1 -DHAVE_UNISTD_H=1
-DHAVE_STDARG_H=1 -DUSE_STDARG=1 -DMALLOC_RET_VOID=1 -L/opt/mpich//lib
-lmpich -lpthread -lrt
</pre>

<p>
5. Ejecuci&oacute;n de programas
</p>

<p>
La ejecuci&oacute;n de programas se realiza a trav&eacute;s del sistema Torque.
</p>

<p>
Para mostrar los nodos podemos usar pbsnodes:
</p>

<pre>
[natorro@clup ~]$ pbsnodes
node2
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382650172,varattr=,jobs=,state=free,netload=6116462424932,gres=,loadave=1.06,ncpus=32,physmem=65941488kb,availmem=72691988kb,totmem=98988008kb,idletime=83377,nusers=2,nsessions=8,sessions=3140 
3144 3145 3171 3173 3197 23028 23252,uname=Linux node2 2.6.32-358.2.1.el6.x86_64 #1 SMP Wed Mar 13 
00:26:49 UTC 2013 x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 1
     gpu_status = gpu[0]=gpu_id=0000:4B:00.0;gpu_product_name=Tesla 
M2090;gpu_display=Disabled;gpu_pci_device_id=109110DE;gpu_pci_location_id=0000:4B:00.0;gpu_fan_speed=N/A;gpu_memory_total=5375 
MB;gpu_memory_used=10 MB;gpu_mode=Default;gpu_state=Unallocated;gpu_utilization=0 
%;gpu_memory_utilization=0 
%;gpu_ecc_mode=Enabled;gpu_single_bit_ecc_errors=0;gpu_double_bit_ecc_errors=0;gpu_temperature=N/A,driver_ver=304.54,timestamp=Thu 
Oct 24 16:17:29 2013

node3
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382650171,varattr=,jobs=,state=free,netload=1478240830914,gres=,loadave=0.00,ncpus=32,physmem=66077836kb,availmem=97800060kb,totmem=99124356kb,idletime=83357,nusers=2,nsessions=7,sessions=3103 
3107 3108 3134 3136 3160 5144,uname=Linux node3 2.6.32-279.el6.x86_64 #1 SMP Fri Jun 22 12:19:21 UTC 2012 
x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0

node4
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382650171,varattr=,jobs=,state=free,netload=466235598611,gres=,loadave=2.00,ncpus=32,physmem=65941644kb,availmem=96522408kb,totmem=98988164kb,idletime=83346,nusers=1,nsessions=2,sessions=35565 
35778,uname=Linux node4 2.6.32-279.el6.x86_64 #1 SMP Fri Jun 22 12:19:21 UTC 2012 x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0

node5
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382650176,varattr=,jobs=,state=free,netload=49363497,gres=,loadave=0.00,ncpus=32,physmem=65941644kb,availmem=97942760kb,totmem=98988164kb,idletime=81456,nusers=0,nsessions=0,uname=Linux 
node5 2.6.32-279.el6.x86_64 #1 SMP Fri Jun 22 12:19:21 UTC 2012 x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0

clup
     state = free
     np = 16
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382650180,varattr=,jobs=,state=free,netload=9056870983999,gres=,loadave=2.60,ncpus=16,physmem=99039576kb,availmem=86428896kb,totmem=103233872kb,idletime=22350,nusers=2,nsessions=9,sessions=4279 
51997 46777 48385 51773 51895 52064 52767 60755,uname=Linux clup 2.6.32-279.el6.x86_64 #1 SMP Fri Jun 22 
12:19:21 UTC 2012 x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0
</pre>

<p>
Podemos observar c&oacute;mo pbsnodes nos reporta incluso el estado del GPU que se encuentra en el nodo 
node2, lo cu&aacute;l nos permitir&iacute;a hacer scripts que nos permitieran correr programas que 
requieren uso de GPU's.
</p>
<p>
5.1. Colas
</p>
<p>
Existen diferentes colas, cada una con un prop&oacute;sito particular. Para conocer las colas existentes, 
utilice la instrucci&oacute;n qstat -Q &oacute; qstat -q. Estas instrucciones muestra el nombre de las 
colas, y sus limites:
</p>
<pre>
[natorro@clup ~]$ qstat -q

server: clup

Queue            Memory CPU Time Walltime Node  Run Que Lm  State
---------------- ------ -------- -------- ----  --- --- --  -----
medium             --      --       --        5   0   0 --   E R
                                               ----- -----
                                                   0     0
[natorro@clup ~]$ qstat -Q
Queue              Max   Tot   Ena   Str   Que   Run   Hld   Wat   Trn   Ext T        
----------------   ---   ---   ---   ---   ---   ---   ---   ---   ---   --- -        
medium               0     0   yes   yes     0     0     0     0     0     0 E        
</pre>

<p>
5.2 Torque
</p>

<p>
Torque es un sistema de colas basado en PBS (Portable Batch System) este sistema sirve para someter, 
monitorear y controlar trabajos por lotes en uno o m&aacute;s sistemas. Por lotes significa que un 
trabajo ser calendarizado para ejecutarse en un tiempo determinado por el subsistema de acuerdo a una 
cierta pol&iacute;tica y disponibilidad de los recursos.
</p>

<p>
Un trabajo es t&iacute;picamente un shell script y un conjunto de atributos que proveen 
informaci&oacute;n de recursos y control acerca del trabajo. A continuaci&oacute;n se describen los 
comandos b&aacute;sicos para utilizar Torque.
</p>

<p>
5.2.1 Monitoreo de la ejecuci&oacute;n de trabajos con qstat
</p>

<p>
El comando qstat muestra el estado de los trabajos de PBS. La sintaxis es:
</p>
<pre>
%qstat [opciones] OPCIONES
</pre>

<p>
Las opciones de qstat m&aacute;s comunes son:
</p>

-a Muestra todos los procesos del usuario.<br />
-q Despliega la informaci&oacute;n b&aacute;sica mas el nombre de las colas.<br />
-s Muestra la informaci&oacute;n b&aacute;sica mas la suministrada por el -calendarizador. -Q 
Despliega<br /> informaci&oacute;n b&aacute;sica y el nombre de las colas.<br />
-f Muestra detalles de la ejecuci&oacute;n de los trabajos del usuario.<br />
Para mas informaci&oacute;n y opciones teclear:<br />
<pre>
%man qstat
</pre>
<p>
La salida de la instrucci&oacute;n qstat es:
</p>
<pre>
[natorro@clup prueba_pbs]$ qstat
Job id                    Name             User            Time Use S Queue
------------------------- ---------------- --------------- -------- - -----
13.clup                    script.sh        natorro                0 R medium        
</pre>
<p>
La cual muestra el identificador del trabajo (13.clup) hacer alguna petici&oacute;n a &eacute;l si es 
necesario, el nombre del shell script (script.sh); el login del usario (natorro); el estado en el que se 
encuentra el trabajo ('R' ejecut&aacute;ndose) y el nombre de la cola (medium) que esta atendiendo este 
proceso.
</p>
<p>
La salida de la instrucci&oacute;n qstat -q es:
</p>
<pre>
[natorro@clup prueba_pbs]$ qstat -q

server: clup

Queue            Memory CPU Time Walltime Node  Run Que Lm  State
---------------- ------ -------- -------- ----  --- --- --  -----
medium             --      --       --        5   1   0 --   E R
                                               ----- -----
                                                   1     0

</pre>
<p>
5.2.2 Eliminaci&oacute;n de trabajos con qdel
</p>
<p>
El comando qdel elimina un trabajo ejecut&aacute;ndose en PBS. La sintaxis es:
</p>
<pre>
%qdel [opciones] identificador_del_proceso
</pre>
<p>
La instrucci&oacute;n qdel 13.clup elimina de PBS el trabajo con identificador 13.clup
</p>
<p>
5.2.3 Creando un Shell script para trabajo serial
</p>
<p>
Para someter un trabajo al entorno de PBS es necesario crear un shell script que contenga los comandos a 
ejecutar y los recursos necesarios para su ejecuci&oacute;n. Dentro de este archivo se pueden incluir:
</p>
* Ordenes y sentencias de control de PBS.<br />
* Opciones del comando qsub.<br />
* Instrucciones del sistema.<br />
* Comentarios.<br />
<p>
Un trabajo serial puede someterse de dos maneras: en "modo dedicado'' y en "modo compartido''. En modo 
dedicado se reserva un procesador dedicado exclusivamente para el trabajo, pero su ejecuci&oacute;n se 
iniciara hasta que haya un procesador disponible. En modo compartido el programa se empezara a ejecutar 
inmediatamente, pero compartir&aacute; los recursos con otros trabajos. Ambos modos deben utilizar la 
cola .
</p>
<p>
El siguiente es un ejemplo de un shell script llamado mishell que ejecuta un trabajo serial en modo 
compartido:
</p>
<pre>

#***********************************************************************
#PBS -S /bin/bash
#PBS -q medium
#PBS -o misalida
#PBS -e errores
#PBS -l mem=370Mb

cd /home/natorro/prueba_pbs
ifort -o corre t.F -Vaxlib
/home/natorro/corre
rm corre
#***********************************************************************
</pre>
<p>
Para someter este trabajo, escribimos:
</p>
<pre>
%qsub mishell
</pre>
<p>
La salida de la instrucci&oacute;n anterior es: 14.clup, el cual es el identificador del proceso. Este 
shell script generar&iacute;a dos archivos de salida, adem&aacute;s de los que genere el mismo programa: 
misalida y errores. El primero contiene toda la salida que ira a la salida est&aacute;ndar. El segundo 
contiene los errores de la compilaci&oacute;n -si los hubiere- y en general los errores generados por la 
ejecuci&oacute;n del shell script. Si las opciones #$PBS -o$ y #$PBS -e$ no se especifican, PBS genera 
dos archivos llamados mishell.o14 y mishell.e14, cuyos nombres est&aacute;n formados por el nombre del 
shell script mas 'o' (para la salida est&aacute;ndar) y 'e' (para los errores) mas el identificador del 
trabajo, en este caso 14.
</p>
<p>
Por otra parte, el siguiente ejemplo muestra como mandar un trabajo serial en modo dedicado.
</p>
<pre>
#***********************************************************************
#!/bin/bash
#PBS -q medium
#PBS -o misalida35
#PBS -e errores
#PBS -l nodes=1
#PBS -l mem=370Mb
cd /home/natorro
cp $HOME/t.F .
# Compilar el programa con algunas opciones
ifcbin -o corre t.F -Vaxlib
# Correr el programa
/home/natorro/corre
#Borrar el ejecutable para no saturar el disco
rm corre
#
***********************************************************************
%qsub mishell
</pre>
<p>
La diferencia entre ambos ejemplos es la opci&oacute;n #PBS -l nodes=1 la cual especifica que solicitamos 
un solo nodo para este trabajo.
</p>
<p>
NOTAS
</p>
<p>
* Cuando las opciones van dentro del archivo deben especificarse al principio del mismo, una por cada 
l&iacute;nea y precedidas por #PBS, sin dejar espacios. Por ejemplo:
</p>
<pre>
#PBS -l mem=50mb
</pre>
<p>
5.2.4 Creando un Shell script para un trabajo usando MPI
</p>
<p>
Ejemplo de un shell script llamado mishell:
</p>
<pre>
#***********************************************************************
#!/bin/bash
#PBS -q long
#PBS -l nodes=2
#PBS -l mem=370Mb
cd /home/natorro/
cat `echo $PBS_NODEFILE`
time mpiexec -machinefile $PBS_NODEFILE -np 64 /home/natorro/a.out
#***********************************************************************
</pre>
<p>
Con el shell script anterior queremos correr en la cola llamada que tiene 500MB por nodo y 32 cores por 
nodo. Para ejecutarlo en los nodos que tenga disponibles PBS se deber&aacute; utilizar la variable 
PBS_NODEFILE como archivo de maquinas para mpiexec.
</p>
<p>
5.2.3 Creando un shell script para un trabajo usando GPU
</p>
<p>
Ejemplo de un shell script llamado mishell:
</p>
<pre>
#***********************************************************************
#!/bin/bash
#PBS -q long
#PBS -l nodes=2
#PBS -l mem=370Mb
#PBS -l gpu=1
cd /home/natorro/

# Compilar el programa con algunas opciones
nvcc -o corre programa.cu
# Correr el programa
/home/natorro/corre
#***********************************************************************
</pre>
<p>
Con este shell se hace la solicitud de un gpu para poder ejecutar c&oacute;digo ah&iacute;, 
tambi&eacute;n podemos ver que la compilaci&oacute;n se hace directamente en el trabajo y el nodo 
asignado porque es el &uacute;nico nodo que tiene las bibliotecas necesarias para llevar a cabo esta 
compilaci&oacute;n.
</p>
<p>
5.2.5 Limites y recursos de las colas
</p>
<p>
Hay 1 colas disponibles en el cluster, cada una con l&iacute;mited de 64GB de memoria RAM y como 
limitantes el tiempo del trabajo a ponerse a consideraci&oacute;n y el n&uacute;mero de trabajos que 
puede someter un usuario y el n&uacute;mero de trabajos que puede someter (3 m&aacute;ximo).
</p>
<p>
medium      1920 hrs (80 d&iacute;as)
</p>
<p>
6. Referencias
</p>
<p>
Intel Fortran User's Guide<br />
<a href="http://www.intel.com/cd/software/products/asmo-na/eng/279831.htm" 
target="_blank">http://www.intel.com/cd/software/products/asmo-na/eng/279831.htm</a>
</p>
<p>
Torque Resource Manager<br />
<a href="http://www.clusterresources.com/pages/products/torque-resource-manager.php" 
target="_blank">http://www.clusterresources.com/pages/products/torque-resource-manager.php</a>
</p>




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
