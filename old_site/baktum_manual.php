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
<font class="red">Gu&iacute;a B&aacute;sica Baktum</font>
<p>
1.0 Conexi&oacute;n remota
</p>
<p>
La conexi&oacute;n al cluster es similar a la conexi&oacute;n hacia cualquier m&aacute;quina con sistema 
operativo Unix/Linux. Para acceder al sistema, debe utilizar la herramienta de comunicaci&oacute;n Secure 
Shell(ssh).
</p>
<p>
El nombre del cluster es baktum.fisica.unam.mx
</p>
<pre>
natorro@macondo:~$ ssh -l natorro baktum.fisica.unam.mx

The authenticity of host 'baktum.fisica.unam.mx (132.248.7.65)' can't be established.

RSA key fingerprint is dc:e8:0f:a9:36:50:1c:c7:91:24:50:3c:29:07:e2:bb.

Are you sure you want to continue connecting (yes/no)? yes

Warning: Permanently added 'baktum.fisica.unam.mx,132.248.7.65' (RSA) to the list of known hosts.

natorro@baktum.fisica.unam.mx's password:

Last login: Fri Aug 23 11:12:40 2013 from 132.248.209.200

[natorro@baktum ~]$
</pre>
</p>
El servicio ssh tambi&eacute;n permite la transferencia de archivos utilizando las instrucciones scp y 
sftp. En contraste, los instrucciones r* como rsh y rcp no est&aacute;n instaladas porque son 
comunicaciones inseguras.
</p>
</p>
Si es primera vez que se conecta al cluster es recomendable generar las llaves p&uacute;blicas para que 
el acceso a los nodos esclavos sea sin password, esto con el fin de que se pueda ejecutar programas que 
hacen acceso remoto de estos nodos como programas que usan la biblioteca MPI o incluso el ejecutar 
programas v&iacute;a el sistema de colas.
</p>
<p>
Se puede lograr tecleando los siguientes comandos:
</p>
<pre>
[natorro@baktum ~]$ ssh-keygen -t rsa

[natorro@baktum ~]$ cd .ssh

[natorro@baktum ~]$ cat id_rsa.pub >> authorized_keys

[natorro@baktum ~]$ chmod 700 *
</pre>
<p>
1.1. Cambiar la contrase&ntilde;a
</p>
<p>
La instrucci&oacute;n para cambiar la contrase&ntilde;a es passwd.
</p>
<pre>
[natorro@baktum ~]$ passwd
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
[natorro@baktum ~]$ chsh
Changing shell for natorro.
Password:
New shell [/bin/bash]:
</pre>
<p>
Las opciones de shell que existentes son:
</p>
<p>
/bin/csh
/bin/sh
/bin/tcsh
/bin/ksh
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
En baktum se encuentran disponibles las suites de compiladores Intel y GNU. En la tabla se muestran las 
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
<pre> source /opt/intel/composer_xe_2013.2.146/bin/compilervars.sh intel64</pre>

<p>
3.2.1. Versi&oacute;n
</p>
</p>
Para desplegar la versi&oacute;n del compilador de intel utilice la opci&oacute;n -V:
</p>
<pre>
[natorro@baktum ~]# ifort -V
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
<p>
[opciones] nombre_programa
</p>
<pre>
[natorro@baktum ~]$ ifort hello_world.f

[natorro@baktum ~]$ ./a.out Hello World

</pre>
<p>
 3.3 GNU
</p>
<p>
3.3.1. Versi&oacute;n
</p>
<p>
Para obtener la versi&oacute;n de un compilador GNU, emplee -v:
</p>
<pre>
[root@baktum ~]# gcc -v
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
<p>
compilador [opciones] nombre_programa
</p>
<pre>
[natorro@baktum ~]$ gcc hello.c
[natorro@baktum ~]$ ./a.out
Hello World

[natorro@baktum ~]$ g77 hello_world.f
[natorro@baktum ~]$ ./a.out
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
La biblioteca MPI de baktum es MPICH y se puede usar tambi&eacute;n OpenMPI si
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
[natorro@baktum ~]$ mpicc -show
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
Para mostrar los nodos podemos usar pbsnodes, la salida ser&iacute;a la siguiente:
</p>
<pre>
baktum-2
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382651851,varattr=,jobs=,state=free,netload=2688043486131,gres=,loadave=16.00,ncpus=32,physmem=529426924kb,availmem=527016120kb,totmem=533621220kb,idletime=102590,nusers=2,nsessions=24,sessions=3178 
3182 3183 3209 3211 3235 5163 5277 5278 5279 5280 5281 5282 5283 5284 5285 5286 5287 5288 5289 5290 5291 
5292 5293,uname=Linux baktum-2 2.6.32-358.el6.x86_64 #1 SMP Fri Feb 22 00:31:26 UTC 2013 
x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0

baktum-3
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382651871,varattr=,jobs=,state=free,netload=3865085526024,gres=,loadave=24.09,ncpus=32,physmem=529426924kb,availmem=520009880kb,totmem=533621220kb,idletime=102586,nusers=2,nsessions=34,sessions=3342 
3348 3349 3382 3384 3500 18041 18139 18140 18141 18142 18143 18144 18145 18146 18147 18148 18149 18150 
18151 18152 18153 18154 18155 40771 40836 40837 40838 40839 40840 40841 40842 40843 40844,uname=Linux 
baktum-3 2.6.32-358.el6.x86_64 #1 SMP Fri Feb 22 00:31:26 UTC 2013 x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0

baktum-4
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382651890,varattr=,jobs=,state=free,netload=4887308646554,gres=,loadave=30.03,ncpus=32,physmem=529426924kb,availmem=510777328kb,totmem=533621220kb,idletime=2192,nusers=2,nsessions=40,sessions=3208 
3212 3213 3239 3241 3300 7558 7827 7828 7829 7830 7831 7832 7833 7834 7835 7836 7837 7838 7839 7840 7841 
7842 7843 49707 49952 49953 49954 49955 49956 49957 49958 49959 49960 49961 49962 49963 49964 49965 
49966,uname=Linux baktum-4 2.6.32-358.el6.x86_64 #1 SMP Fri Feb 22 00:31:26 UTC 2013 x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0

baktum
     state = free
     np = 32
     properties = short,medium,long
     ntype = cluster
     status = 
rectime=1382651891,varattr=,jobs=,state=free,netload=11460902419289,gres=,loadave=0.14,ncpus=32,physmem=529426924kb,availmem=533082336kb,totmem=537618916kb,idletime=99591,nusers=1,nsessions=6,sessions=3287 
3291 3292 3318 3320 3344,uname=Linux baktum 2.6.32-358.el6.x86_64 #1 SMP Fri Feb 22 00:31:26 UTC 2013 
x86_64,opsys=linux
     mom_service_port = 15002
     mom_manager_port = 15003
     gpus = 0


</pre>
<p>
5.1. Colas
</p>
<p>
Existen diferentes colas, cada una con un prop&oacute;sito particular. Para conocer las colas existentes, 
utilice la instrucci&oacute;n qstat -Q &oacute; qstat -q. Estas instrucciones muestra el nombre de las 
colas, y sus limites:
</p>
<pre>
[natorro@baktum ~]$ qstat -q

server: baktum

Queue            Memory CPU Time Walltime Node  Run Que Lm  State
---------------- ------ -------- -------- ----  --- --- --  -----
medium             --      --       --        5   0   0 --   E R
                                               ----- -----
                                                   0     0
[natorro@baktum ~]$ qstat -Q
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
<p>
%qstat [opciones] OPCIONES
</p>
<p>
Las opciones de qstat m&aacute;s comunes son:

-a Muestra todos los procesos del usuario. <br />
-q Despliega la informaci&oacute;n b&aacute;sica mas el nombre de las colas.<br />
-s Muestra la informaci&oacute;n b&aacute;sica mas la suministrada por el -calendarizador. -Q 
Despliega<br /> informaci&oacute;n b&aacute;sica y el nombre de las colas.<br />
-f Muestra detalles de la ejecuci&oacute;n de los trabajos del usuario.<br />
Para mas informaci&oacute;n y opciones teclear:<br />
</p>
%man qstat
<p>
La salida de la instrucci&oacute;n qstat es:
</p>
<pre>
[natorro@baktum prueba_pbs]$ qstat
Job id                    Name             User            Time Use S Queue
------------------------- ---------------- --------------- -------- - -----
10.baktum                    script.sh        natorro                0 R medium        
</pre>
<p>
La cual muestra el identificador del trabajo (10.baktum) hacer alguna petici&oacute;n a &eacute;l si es 
necesario, el nombre del shell script (script.sh); el login del usario (natorro); el estado en el que se 
encuentra el trabajo ('R' ejecut&aacute;ndose) y el nombre de la cola (medium) que esta atendiendo este 
proceso.
</p>
<p>
La salida de la instrucci&oacute;n qstat -q es:
</p>
<pre>
[natorro@baktum prueba_pbs]$ qstat -q

server: baktum

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
<p>
%qdel [opciones] identificador_del_proceso
</p>
<p>
La instrucci&oacute;n qdel 13.baktum elimina de PBS el trabajo con identificador 13.baktum
</p>
<p>
5.2.3 Creando un Shell script para trabajo serial
</p>
<p>
Para someter un trabajo al entorno de PBS es necesario crear un shell script que contenga los comandos a 
ejecutar y los recursos necesarios para su ejecuci&oacute;n. Dentro de este archivo se pueden incluir:
</p>
<p>
* Ordenes y sentencias de control de PBS.<br />
* Opciones del comando qsub.<br />
* Instrucciones del sistema.<br />
* Comentarios.<br />
</p>
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
<pre> %qsub mishell</pre>
<p>
La salida de la instrucci&oacute;n anterior es: 11.baktum, el cual es el identificador del proceso. Este 
shell script generar&iacute;a dos archivos de salida, adem&aacute;s de los que genere el mismo programa: 
misalida y errores. El primero contiene toda la salida que ira a la salida est&aacute;ndar. El segundo 
contiene los errores de la compilaci&oacute;n -si los hubiere- y en general los errores generados por la 
ejecuci&oacute;n del shell script. Si las opciones #$PBS -o$ y #$PBS -e$ no se especifican, PBS genera 
dos archivos llamados mishell.o11 y mishell.e11, cuyos nombres est&aacute;n formados por el nombre del 
shell script mas 'o' (para la salida est&aacute;ndar) y 'e' (para los errores) mas el identificador del 
trabajo, en este caso 11.
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
<p>
#PBS -l mem=50mb
</p>
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
