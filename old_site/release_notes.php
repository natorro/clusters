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



<font class="red" ><i>Intel</i><sup>&reg;</sup><i> Math Kernel Library 10.0 Update 4 for&nbsp;Linux*<br>
Release Notes</i> </font>




<p><b>Contents</b>
<p>
 <a href="#Overview">Overview</a>
<br>
 <a href="#New_Features">New in Intel&reg; MKL</a> 
<br>
 <a href="#System_Requirements">System Requirements</a>

<br>
 <a href="#Installation">Installation Notes</a>
<br>
 <a href="#Documentation">Documentation</a>
<br>
 <a href="#Known_limitations">Known Limitations</a>
<br>
 <a href="#Technical_Support">Technical Support and Feedback</a>
<br>

 <a href="#Related_products">Related Products and Services</a>
<br>
 <a href="#Legal">Disclaimer and Legal Information</a> </p>

<p>&nbsp;</p>

<b><a name=Overview>Overview</a></b>
<p>&nbsp;</p>
<p>The Intel&reg; Math Kernel Library (Intel&reg; MKL)
provides developers of scientific, engineering and financial software
with a set of linear algebra routines, fast Fourier transforms,
and vectorized math and random number generation functions, all
optimized for the latest Intel&reg; processors.  


<p>Intel&reg; MKL provides linear
algebra functionality with LAPACK (solvers and eigensolvers) plus
level 1, 2, and 3 BLAS offering the vector, vector-matrix, and
matrix-matrix operations needed for complex mathematical software.
Users who prefer the FORTRAN 90/95 programming language may call
LAPACK driver and computational subroutines via specially
designed interfaces with reduced numbers of arguments.  
Intel&reg; MKL provides ScaLAPACK (Scalable LAPACK) 
and support functionality including the Parallel Basic Linear Algebra 
Subprograms (PBLAS).  
For solving sparse systems of equations, Intel&reg; MKL provides 
direct and iterative sparse solvers as well as a
supporting set of sparse BLAS (levels 1, 2, and 3). </p> 

<p>Intel&reg; MKL
offers multidimensional fast Fourier transforms (1D, 2D, 3D) with
mixed radix support (not limited to sizes of powers of 2).  
Intel&reg; MKL also provides distributed versions of these functions for
use on clusters.
For the solution of partial differential equations (PDE), Intel&reg; MKL provides 
a few preconditioners to help with the convergence of our iterative solvers. 
Optimization [Trust Region] solvers provide efficient routines for solving
nonlinear least square problems with and without boundary 
constraints. </p>

<p>Intel&reg; MKL also includes a set of vectorized
transcendental functions (called the Vector Math Library (VML))
offering both greater performance and excellent accuracy compared to
the libm (scalar) functions for most of the processors.  The Vector
Statistical Library (VSL) offers high performance 
vectorized random number generators for a number of probability
distributions as well as convolution and correlation routines.  Intel&reg;
MKL also includes a set of functions which act on intervals of floating 
point numbers. This interval arithmetic package includes solvers for
interval systems of linear equations, interval matrix inversion, as well
as functions for testing the regularity/singularity of interval matrices.</p>
<p>The BLAS, LAPACK, direct sparse solver (DSS), FFT, VML library functions, and optimization solvers in 
Intel&reg; MKL are threaded using OpenMP*.  All of Intel&reg; MKL is 
thread-safe.</p>


<p>&nbsp;</p>

<b><a name="New_Features">New in Intel&reg; MKL </a></b>

<p>&nbsp;</p>
<b>New in Intel&reg; MKL 10.0 Update 4</b>
<ul>
  <li>Performance Improvements in the BLAS:
  <ul>
    <li>
      32-bit improvements</li>
    <ul>
      <li>

        40-50% improvement for (Z,C)GEMM on Quad-Core Intel&reg; Xeon&reg; processor 5300 series
        
      <li>
        10% improvement for all GEMM code on Quad-Core Intel&reg; Xeon&reg; processor 5400 series
    </ul>
    <li>
      64-bit improvements</li>

    <ul>
      <li>2.5-3% improvement for DGEMM on 1 thread on Quad-Core Intel&reg; Xeon&reg; processor 5400 series
        
      <li>50% improvement for SGEMM on the forthcoming Intel&reg; microarchitecture, code named Nehalem
        
      <li>3% improvement for CGEMM on 1 thread on the forthcoming Intel&reg; microarchitecture, code named Nehalem
        
      <li>2-3% improvement for ZGEMM on 1 thread on the forthcoming Intel&reg; microarchitecture, code named Nehalem
        
      <li>30% improvement for right-side cases of DTRSM on the forthcoming Intel&reg; microarchitecture, code named Nehalem
    </ul></ul>

  <li>
    Improvements to the direct sparse solver (DSS/PARDISO):
  <ul>
    <li>
      The performance of out-of-core PARDISO was improved by 35% on average.</li></ul>

  <li>
    Performance improvement on the Intel&reg; microarchitecture, code named Nehalem:</li>

  <ul>
    <li>
      3-17% improvement for the following VML functions: Asin, Asinh, Acos, Acosh, Atan, Atan2, Atanh, Cbrt, CIS, Cos, Cosh, Conj, Div, ErfInv, Exp, Hypot, Inv, InvCbrt, InvSqrt, Ln, Log10, MulByConj, Sin, SinCos, Sinh, Sqrt, Tanh.</li>
    
    <li>
      7-67% improvement for uniform random number generation.</li>
      
    <li>
      3-10% improvement for VSL distribution generators based on Wichmann-Hill, Sobol, and Niederreiter BRNGs (64-bit only).</li>

  </ul> 
  <li>
    When functions in Intel MKL are called from an MPI program they will be run on 1 thread by default (i.e., in the absence of explicit controls).

</ul>

<p>&nbsp;</p>

<b>New in Intel&reg; MKL 10.0 Update 3</b>
<ul>
  <li>
    Improved IA-32 version of SGEMM by 1.4 to 1.5 times for Intel&reg; Core&trade; microarchitecture.

  <li>

    ZGEMM3M was sped up by up to 10 times for Intel&reg; Itanium&reg; processors and by up to 3 times for Intel&reg; Core&trade;2 Quad processors.

  <li>
    The performance of factorization routines *GETRF, *POTRF, *GEQRF, SVD (bi-diagonalization routine) and the Symmetric Banded Eigensolver (tridiagonalization routine) have been improved significantly on multi-core.

  <li>
    The LP64 interface of DSS/PARDISO now uses 64-bit addressing for internal arrays on 64-bit operating systems. This allows the direct solver to solve larger systems.
    
  <li>
    In cases where the number of threads is set higher than the number of physical cores available and MKL_DYNAMIC = TRUE (the default value), Intel MKL will now reduce the number of threads used to be equal to the number of physical cores. 
For example, on systems with Hyper-Threading Technology where the OS will report the number of logical processors which is larger than the number physical processors, Intel MKL will now only use as many threads as there are physical processors or cores.

  <li>

    A hybrid mode has been added to the MP LINPACK benchmark which can improve performance in instances where OpenMP is used on each node.
  
  <li>
    Intel MKL will now set the number of threads to 1 when the MPI environment cannot be determined to be thread-safe and MKL_DYNAMIC = TRUE (the default value). See the User Guide for further information.

  <li>
    Fixed issue in DSYTRD which caused runtime failures when work array not double the recommended size. This affected multiple other LAPACK functions which call DSYTRD.

  <li>
    Fixed memory leak that appeared in some double-precision FFT problems involving power of 2 sizes.
  
  <li>
    Threading runtime libraries (libguide, libiomp) are now fully built with position independent code.
</ul>

<p>&nbsp;</p>

<b>New in Intel&reg; MKL 10.0 Update 2</b>
<ul>
  <li>BLAS Performance Improvements on IA32
  <ul>
    <li>Improved 
      IA32 version of DGEMM by 40% for Intel&reg; Core&trade; microarchitecture

    <li>?SYMM 
      functions were improved by 13% for all platforms
  </ul>

  <li>New memory support functions: The following functions have been added. See the reference manual for more information.
  <ul>
    <li>MKL_MemStat()

    <li>MKL_malloc()

    <li>MKL_free()
  </ul>
</ul>
<p>&nbsp;</p>
<b>New in Intel&reg; MKL 10.0 Update 1</b>
<ul>
  <li>Out-of-core (OOC) PARDISO
  <ul>

    <li>
      Fixed config file loading problems associated with "The file pardiso_ooc.cfg was not opened" error message.

    <li>
      Fixed a bug associated with operation of the solver when iparm(60)=1.
  </ul>
  <li>
    The Poisson Library Routines described in Chapter 13, "Partial Differential Equations", of the Intel&reg; MKL Reference Manual are now included.  These routines were absent in version 10.0</li>

  <li>LAPACK bug fixes:
  <ul>

    <li>
      All versions of the *STEDC have been improved to get proper scaling in cases of parallel operation.
    
    <li>
      The Fortran 95 interface to the LAPACK Divide and Conquer Eigenproblem solver functions has been fixed. Previously, various combinations of input parameters would cause segfault.
  </ul>
</ul>
<p>&nbsp;</p>
<b>New in Intel&reg; MKL 10.0</b>

<p>Intel&reg; MKL product changes since Intel&reg; MKL 9.1</p>

<ul>
  <li>Linking model change
  <ul>
    <li>In Version 10.0 of Intel&reg; MKL 
      we have re-architected Intel&reg; MKL and physically separated the interface, threading and computational components of the product. This architecture facilitates the use of multiple library linking combinations to support numerous configurations of interfaces, compilers, and processors in a single package. Multiple layers are provided so that the base Intel&reg; MKL package supports numerous configurations of interfaces, compilers, and processors in a single package. This new Intel&reg; MKL architecture is intended to provide maximum support for our varied customers' needs, while minimizing the effort it takes to obtain and utilize the great performance of Intel&reg; MKL. For more information, please refer to the "Using Intel&reg; MKL Parallelism" section of the Intel&reg; MKL User's Guide 
  </ul>

  <li>Cluster enabled capability available in a single Intel&reg; MKL product</li>
  <ul>
    <li>
      Previously there were two versions of Intel&reg; MKL (Intel&reg; MKL for Linux*, and Intel&reg;  MKL Cluster Edition for Linux*).  Starting with Intel&reg; MKL 10.0, we merged these two versions and now there is only one version: Intel&reg; MKL for Linux*, which includes ScaLAPACK, distributed memory FFT's and all other capabilities of the former "Cluster Edition"</li>

  </ul>
<p>Performance improvements since Intel&reg; MKL 9.1 </p>
<ul>
  <li>BLAS
  <ul>
    <li>
      DGEMM and SGEMM on Intel&reg; Core&trade;2 Quad processors<ul>

    <li>
      Large square and large outer product sizes were improved by 1.04 times on 1 thread and 1.1 times to 1.15 times on 8 threads

    <li>
      Other level 3 real functions were improved by 1.02 times to 1.04 times on large sizes</ul>
  </ul>
  <li>LAPACK
  <ul>
    <li>
      Several linear equation solvers (?spsv/?hpsv/?ppsv, ?pbsv/?gbsv, ?gtsv/?ptsv, ?sysv/?hesv) have dramatically improved in performance.  Banded and packed storage format and multiple right-hand sides cases see performance enhanced up to 100 times

    <li>

      All symmetric eigensolvers (?syev/?syev, ?syevd/?heevd, ?syevx/?heevx, ?syevr/?heevr) have significantly improved, since tridiagonalization routines (?sytrd/?hetrd) have sped up to 4 times

    <li>
      All symmetric eigensolvers in packed storage (?spev/?hpev, ?spevd/?hpevd, ?spevx/?hpevx) have significantly improved, since tridiagonalization routines in packed storage (?sptrd/?hptrd) perform 3 times better than previous version

    <li>
      A number of routines which apply orthogonal/unitary transformations (?ormqr/?unmqr, ?ormrq/?unmrq, ?ormql/?unmql, ?ormlq/?unmlq) are up to 2 times faster
  </ul> 
  <li>FFTs
  <ul>
    <li>
      Performance of complex 1D FFTs for power-of-two sizes was improved by up to 1.8 times on 1 thread

    <li>
      On Intel&reg; 64 systems running in 64-bit mode
    <ul>

      <li>
        Complex 2D FFTs were sped up by up to 1.1 times on 1 thread for single and double precision

      <li>
        Parallel Complex 2D FFTs were sped up for single precision by up to 1.2 times on 8 threads and for double precision by up to 1.3 times

      <li>
        Parallel Complex 3D FFTs were sped up by up to 1.15 times for single and double precision<li>Parallel Complex Backward 2D FFTs were sped up for double precision by up to 1.4 times and for single precision up to 1.3 times
    </ul>
    <li>
      Single complex backward 1D FFT size greater than 2^22 were sped up by up to 2 times on 4 threads and up to 2.4 times on 8 threads on Itanium&reg; processors</ul>

  <li>VML/VSL
  <ul>
    <li>
      Performance of VSL functions is improved on non-Intel processors by approximately 2 times on average
    
    <li>
      Performance of VML vdExp, vdSin, and vdCos functions is improved on non-Intel processors by 1.18 times on average

    <li>
      Performance of VSL functions is improved on IA-32 and Intel&reg; 64 by 1.07 times on average</ul>
</ul>

<p>Other Improvements
<ul>
  <li>Change in threading model
  <ul>
    <li>
      Previously, when OMP_NUM_THREADS was undefined the number of threads for Intel&reg; MKL defaulted to 1. With Intel&reg; MKL 10.0, when the environment variable OMP_NUM_THREADS is undefined, your compiler run time library (e.g. libguide) determines the default number of threads. Intel&reg; MKL may create multiple threads depending on problem size and the value of the MKL_DYNAMIC or other threading environment variables</li>

    <li>
      To provide additional user control over threading, the following environment variables have been added: MKL_NUM_THREADS, MKL_DOMAIN_NUM_THREADS, and MKL_DYNAMIC as well as the corresponding library routines.  See the User Guide for details</li>
  </ul>
  <li>Interface changes
  <ul>
    <li>
      The C DFTI has changed in the ILP64 variant of the C/C++ interface.  The MKL_LONG type is used instead of long type in C DFTI interface, i.e. MKL_LONG Dfti...(..., MKL_LONG, ...) instead of long Dfti...(..., long, ...).  For example we have difference on Windows where long is 4 byte, MKL_LONG is 8 byte in ILP64 variant.  See details in the User's Guide.
  </ul>
  <li>Out-of-core (OOC) PARDISO for all types of matrices
  <ul>

    <li>
      In version 10.0, we have added out-of-core memory support to PARDISO.  While computers have greatly increased memory capacity, there continue to be a large number of problems for which problems sizes are too great to solve with in-memory solutions.  For customers who are encountering problem size limitations we encourage you to try our new out-of-core memory PARDISO solution.  Opportunities for further performance optimizations have been identified and we plan to release an Intel&reg; MKL update in the coming months with significant performance improvements</li>
  </ul>
  <li>ZGEMM3M and CGEMM3M functions 
  <ul>
    <li>
      These complex functions use three block matrix multiplies and five additions as opposed to four block matrix multiplies and four additions to reduce the number of operations. These two functions are extensions to the standard BLAS in Intel&reg; MKL using the same syntax as ZGEMM and CGEMM respectively
      
    <li>

      Using [Z/C]GEMM3M instead of [Z/C]GEMM can give up to 1.25 times of performance improvement without bit-to-bit correspondence of the results</li>
  </ul>
  <li>Iterative Sparse Solvers
  <ul>
    <li>An ILUT pre-conditioner has been added</ul>

  <li>Sparse BLAS
  <ul>
    <li>Support for sparse 0-based indexing has been added
      
    <li>The mkl_scsrgemv, a single precision sparse BLAS matrix vector multiply function, has been added</ul>

  <li>FFTs
  <ul>
    <li>
      The DftiCommitDescriptor function has been optimized by avoiding double data initialization for serial and parallel 1D FFT. This function now runs faster and allocates less memory</ul>

  <li>Vector Math Library (VML)
  <ul>
    <li>
      New VML EP (enhanced performance) accuracy mode has been introduced. The EP routines are significantly faster than LA (low accuracy) routines and are accurate to at least 11 and 26 bits for single and double precisions respectively. See vmlSetMode function description in the Intel&reg; MKL manual for details

    <li>

      New VML functions added: v{s,d,c,z}Mul, v{c,z}MulByConj, v{c,z}Div, v{s,d,c,z}Add, v{s,d,c,z}Sub, v{c,z}Conj, v{s,d}Expm1, v{s,d}Log1p, v{s,d}Sqr, v{s,d}Pow3o2, v{s,d}Pow2o3, v{s,d,c,z}Abs, v{c,z}CIS</ul>

  <li>Vector Statistical Library (VSL)
  <ul>
    <li>
      Support of 64-bit nskip parameter of vslSkipAheadStream service routine in all versions of the VSL (not only ILP64) introduced

    <li>
      Bugs in vslCopyStream, vslCopyStreamState service routines, and VSL QRNG initialization scheme for the case of user-defined parameters were fixed
  </ul>
  <li>PDE Support
  <ul>

    <li>
      Trigonometric Transforms have been extended to support various kinds of DCT/DST transforms. In addition to even size transforms, odd size transforms are supported starting from this release</li>
  </ul> 
  <li>FFTW 3.x Wrappers
  <ul>
    <li>New FFTW 3.x wrappers have been developed for real-to-real (DCT/DST) transforms</li>
  </ul> 
</ul>


<b><a name="System_Requirements">System Requirements</a></b>
<p>&nbsp;<p>
<b>Hardware</b>

<P>To install and use Intel&reg; MKL you will need a system with a supported processor and
700 MB of free hard disk space plus an additional 400 MB during installation for download and temporary files (host system only).
<p>Supported processors - The following is a list of processors on which Intel&reg; MKL is expected to run.
<ul>  
  <li>Intel&reg; Core&trade; processor family

  <li>Intel&reg; Xeon&reg; processor family

  <li>Intel&reg; Itanium&reg; processor family

  <li>Intel&reg; Pentium&reg; 4 processor family

  <li>Intel&reg; Pentium&reg; III processor

  <li>Intel&reg; Pentium&reg; processor (300 MHz or faster)

  <li>Intel&reg; Celeron&reg; processor

  <li>AMD Athlon* and Opteron* processors

</ul>

<p><b>Software</b>

<p>To use Intel&reg; MKL you will need a supported compiler and MPI implementation.


<p>Following is the list of supported operating systems:
<ul>
  <li>
    Red Hat* EL3 (IA-32 / Intel&reg; 64 / IA-64)

  <li>

    Red Hat* EL4 (IA-32 / Intel&reg; 64 / IA-64)

  <li>
    Red Hat* EL5 (IA-32 / Intel&reg; 64 / IA-64)

  <li>
    Suse* SLES* 9 (IA-32 / Intel&reg; 64 / IA-64)

  <li>
    Suse* SLES* 10 (IA-32 / Intel&reg; 64 / IA-64)

  <li>

    SGI ProPack* for Linux 4 (IA-64)

  <li>
    SGI ProPack* for Linux 5 (IA-64)

  <li> Red Hat* Fedora* Core 7 (IA-32 / Intel&reg; 64)

  <li> Debian* GNU/Linux 4.0 (IA-32 / Intel&reg; 64 / IA-64)

  <li> Ubuntu* 7 (IA-32 / Intel&reg; 64)

  <li> Asianux* Server 3 (IA-32 / Intel&reg; 64 / IA-64)

  <li> Turbolinux* 11 (IA-32 / Intel&reg; 64 / IA-64)

  <br><br>Note: These Linux* distributions are supported, and Intel&reg; MKL should work on many more.  If you have trouble with your distribution, do let us know.


</ul>

<p>Following is the list of supported C/C++ and Fortran compilers:
<ul>
  <li>Intel&reg; Fortran Compiler for Linux* version 10.1

  <li>Intel&reg; Fortran Compiler for Linux* version 10.0

  <li>Intel&reg; Fortran Compiler for Linux* version 9.1

  <li>Intel&reg; C++ Compiler for Linux* version 10.1

  <li>Intel&reg; C++ Compiler for Linux* version 10.0

  <li>Intel&reg; C++ Compiler for Linux* version 9.1

  <li>

    GNU Compiler Collection (gcc, g77, GNU Fortran 4.2.0 and later)

  <li>Absoft* Pro Fortran v10.1 for Linux*

</ul>
<p>Following is the list of MPI implementations that Intel&reg; MKL has
been validated against:
<ul>
  <li>Intel&reg; MPI Library Version 3.1 

  <li>Intel&reg; MPI Library Version 3.0

  <li>Intel&reg; MPI Library Version 2.0

  <li>

    SGI* MPT (for IA-64) available at <a href="http://www.sgi.com/products/software/mpt/">http://www.sgi.com/products/software/mpt/</a>

  <li>
    Open MPI 1.1.2, 1.1.5, and 1.2 found at <a href="http://www.open-mpi.org">http://www.open-mpi.org</a>

  <li>
    MPICH version 1.2.x (Myricom*'s designation) available at <a href="http://www.myri.com/">http://www.myri.com/</a>

  <li>
    MPICH version 1.2.x available at <a href="http://www-unix.mcs.anl.gov/mpi/mpich">http://www-unix.mcs.anl.gov/mpi/mpich</a>  

  <li>MPICH version 2.0 available at <a href="http://www-unix.mcs.anl.gov/mpi/mpich">http://www-unix.mcs.anl.gov/mpi/mpich</a> 


  <br><br>Note: Usage of MPI linking instructions can be found in the User's Guide in the doc directory.
</ul>

<p><b>Note:</b>
<ul>
  <li>

    Parts of Intel&reg; MKL have Fortran interfaces, and data structures, while other parts which have C interfaces and C data structures. The User Guide in the doc directory contains advice on how to link to Intel&reg; MKL with different compilers</ul>



<b><a name=Installation>Installation Notes</a></b>
<p>&nbsp;</p>
<p>Guidance on the installation of Intel&reg; MKL is provided at install time.  Links will be provided to a file with step-by-step instructions
(filename: Install.txt).  
This file can also be found in the doc directory. </p>


<b><a name="Documentation">Documentation</a></b>
<p>&nbsp;</p>
<p>The Documentation Index (Doc_index.htm in the doc directory) has a list of the principal Intel&reg; MKL documents. For a complete list, see chapter 3 of the User's Guide. </p>


<p>&nbsp;</p>
<b><a name="Known_limitations">Known Limitations</a></b>
<p>&nbsp;</p>

<p>Limitations to the sparse solver and optimization solvers:</p>

<ul>
  <li>
    Sparse and optimization solver libraries functions are only provided in static form
</ul>
<p>Limitations to the FFT functions:</p>
<ul>
  <li>
    The function DftiCopyDescriptor is not implemented

  <li>
    Mode DFTI_TRANSPOSE is implemented only for the default case

  <li>

    Mode DFTI_REAL_STORAGE can have the default value only and is not changeable by the DftiSetValue function (i.e. DFTI_REAL_STORAGE = DFTI_REAL_REAL)

  <li>
    The ILP64 version of Intel&reg; MKL does not currently support FFTs with any one dimension larger than 2^31-1.  Any 1D FFT larger than 2^31-1 or any multi-dimensional FFT with any dimension greater than 2^31-1 will return the "DFTI_1D_LENGTH_EXCEEDS_INT32" error message.  Note that this does not exclude the possibility of performing multi-dimensional FFTs with more than 2^31-1 elements; as long as any one dimension length does not exceed 2^31-1

  <li>
    Some limitations exist on arrays sizes for Cluster FFT functions. See mklman.pdf for a detailed description
  
  <li>
    When a dynamically linked application uses Cluster FFT functionality, it is required to put the static Intel&reg; MKL interface libraries on the link line as well. For example: -Wl,--start-group $MKL_LIB_PATH/libmkl_intel_lp64.a $MKL_LIB_PATH/libmkl_cdft_core.a -Wl,--end-group $MKL_LIB_PATH/libmkl_blacs_intelmpi20_lp64.a -L$MKL_LIB_PATH -lmkl_intel_thread -lmkl_core -lguide -lpthread

</ul>

<p>Limitations to the LAPACK functions: </p>
<ul>
  <li>
    The ILAENV function, which is called from the LAPACK routines to choose problem-dependent parameters for the local environment, can not be replaced by a user's version

  <li>
    second() and dsecnd() functions may not provide correct answers in the case where the CPU frequency is not constant.
</ul>

<p>Limitations to the Vector Math Library (VML) and Vector Statistical Library (VSL) functions</p>
<ul>
  <li>

      Usage of mkl_vml.fi may produce warning about TYPE ERROR_STRUCTURE length
</ul>

<p>Limitations to the interval arithmetic functions: </p>
<ul>
  <li>
    The interval libraries will require the libifcore library from Intel&reg; Fortran compiler.

  <li>
    Interval arithmetic functions require a processor which supports SSE instructions. </li>

</ul>


<p>Limitations to the ScaLAPACK functions:
<ul>
  <li>
    The user can not substitute PJLAENV for their own version. This function is called by ScaLAPACK routines to choose problem-dependent parameters for the local environment.

  <li>
    ScaLAPACK libraries are available only in static form
</ul>


<p>Limitations to the ILP64 version of Intel&reg; MKL:

<ul>
  <li>The ILP64 version of Intel&reg; MKL does not contain the complete
    functionality of the library.  For a full listing of what is in the
    ILP64 version refer to the user's guide in the doc directory.

  <li>g77 can not be used with the ILP64 libraries. 
</ul>


<p>Limitations to the Java examples:
<ul>
  <li>
    The Java examples don't work with static Intel&reg; MKL libraries. Please use the dynamic Intel&reg; MKL libraries for running the Java examples

  <li>

    The Java examples don't work if the path to the JDK contains spaces. Please use quotes to set JAVA_HOME in those cases. For example: set JAVA_HOME="C:\Program Files\Java\jdk1.6.0_06" 
</ul>


<p>The DHPL_CALL_CBLAS option is not allowed when building the hybrid version of MP LINPACK.


<p>Limitations to the Fortran 95 interface to LAPACK:
<UL>
  <li>
    If you are compiling the Fortran 95 interface to LAPACK with the GNU gfortran compiler, you must manually remove the "pure" attribute from all subroutines containing a procedure argument: ?GEES, ?GEESX, ?GGES, ?GGESX (where ? can be S, D, C, or Z).
</UL>


<p>Limitations to the g77 compiler support:
<UL>

  <li>
    Some Intel&reg; MKL functions contain underscore in their names (i.e. mkl_dcsrsymv, mkl_cspblas_dcsrsymv) and these functions don't support the g77 default naming convention.  -fno-second-underscore compilation flag can be used as workaround for this limitation.  E.g.: g77 -fno-second-underscore test.f 
</UL>

<p>On Intel&reg; 64 processors, user programs compiled with the GNU Fortran compiler (version 3.2.3) will likely get incorrect results from those functions in Intel&reg; MKL that return single precision values, if -fno-f2c GNU Fortran compiler flag isn't used.  The GNU Fortran compiler by default expects REAL*4 values in the first 8 bytes of the return register (just as a double precision value would be represented) while the Intel&reg; Fortran compiler expects REAL*4 values in the first 4 bytes of the return register. The behavior of Intel&reg; MKL is compatible with that of the Intel Fortran compiler. GNU Fortran compiler behavior could be changed to be compatible with the Intel Fortran compiler by using the -fno-f2c flag.  



<p>FFT, VML, VSL, and PDE Support functions can not be called from Fortran-77. These components have Fortran-90/95 interface specifics (structures, ..) that can not be used with Fortran-77.</p>


<p>We recommend that -Od be used for the 10.0 Intel&reg; compilers when compiling test source code available with Intel&reg; MKL.  Current build scripts do not specify this option and default behavior for these compilers has changed to provide vectorization.



<p>All VSL functions return an error status, i.e., default VSL API is a function style now rather than a subroutine style used in earlier Intel&reg; MKL versions. This means that Fortran users should call VSL routines as functions.  For example:
<blockquote>
&nbsp;errstatus = vslrnggaussian(method, stream, n, r, a, sigma)<br>
</blockquote>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rather than subroutines:

<blockquote>
&nbsp;call vslrnggaussian(method, stream, n, r, a, sigma)<p>&nbsp;</p>
</blockquote>
Nevertheless, Intel&reg; MKL provides a subroutine-style interface for backward compatibility.  To use subroutine-style interface, manually include mkl_vsl_subroutine.fi file instead of mkl_vsl.fi by changing the line include 'mkl_vsl.fi' in include\mkl.fi with the line include 'mkl_vsl_subroutine.fi'. VSL API changes don't affect C/C++ users. </p>


<p><b>Memory Allocation:</b> In order to achieve better performance, memory allocated by Intel&reg; MKL is not released. This behavior is by design and is a one time occurrence for Intel&reg; MKL routines that require workspace memory buffers.  Even so, the user should be aware that some tools may report this as a memory leak. Should the user wish, memory can be released by the user program through use of a function (<code>MKL_FreeBuffers</code><code>(</code><code>)</code>) made available in Intel&reg; MKL or memory can be released after each call by setting the environment variable <code>MKL_DISABLE_FAST_MM</code> (see User's Guide in the <code>doc</code> directory for more details). Using one of these methods to release memory will not necessarily stop programs from reporting memory leaks, and in fact may increase the number of such reports should you make multiple calls to the library thereby requiring new allocations with each call. Memory not released by one of the methods described will be released by the system when the program ends. To avoid this restriction disable memory management as described above. </p>


<p>On Red Hat* Enterprise Linux 3.0, in order to ensure that the correct support libraries are linked, the environment variable LD_ASSUME_KERNEL must be set: For example: 'export LD_ASSUME_KERNEL=2.4.1' </p>


<P><b>Other:</b> GMP and Interval Solver components are located in the solver library. For Intel&reg; 64 and IA-64 platforms these components support only LP64 interface.</P>


<P>&nbsp;</P>

<b><a name="Technical_Support">Technical Support and Feedback </a></b>

<p>&nbsp;</p>
<p><b>Self Help and User Forums</b></p>

<p>A rich repository of self-help product information such as tutorials, getting started tips, known product issues, product errata, compatibility information and answers to frequently asked questions can be found at the Intel&reg; Software Development Products Technical Support site (<a href="http://www.intel.com/software/products/support/index.htm">http://www.intel.com/software/products/support/index.htm</a>).  It's a great place to find answers quickly or to gain insight in using our products effectively. </p>

<p>The Intel&reg; MKL User Forum (<a href="http://softwareforums.intel.com/ids/board?board.id=MKL">http://softwareforums.intel.com/ids/board?board.id=MKL</a>) is the place to ask questions of and share information with other users of Intel&reg; MKL. </p>

<p>If you have questions or problems getting started with the Intel&reg; Math Kernel Library please contact support at <a href="https://registrationcenter.intel.com/support/">https://registrationcenter.intel.com/support/</a>.</p>


<p><b>Note:</b> Please notify your support representative prior to submitting source code where access needs to be restricted to certain countries to determine if this request can be accommodated.

<p>To submit an issue via the Intel&reg; Premier Support website, please perform the following steps:</p>
<ol>

  <li>
    Ensure that Java* and JavaScript* are enabled in your browser</li>

  <li>
    Go to <a href="http://premier.intel.com">http://premier.intel.com</a></li>

  <li>
    Type in your Login and Password.  Both are case-sensitive</li>

  <li>
    Click the &quot;Submit Issues&quot; button</li>

  <li>
    Click on the &quot;Development Environment&quot; button next to the &quot;Product Type&quot; drop-down list</li>

  <li>
    Click on the &quot; Intel(R) MKL for Linux*&quot; button next to the &quot;Product Name&quot; drop-down list</li>

  <li>
    Enter the info to the required fields, and Click on the &quot;Submit Issue&quot; link in the left navigation bar</li>

  <li>
    Choose &quot;Development Environment (tools,SDV,EAP)&quot; from the &quot;Product Type&quot; drop-down list</li>

  <li>
    If this is a software or license-related issue choose &quot;<b> Intel(R) MKL for Linux*</b>&quot; from the &quot;Product Name&quot; drop-down list</li>

  <li>
    Enter your question and complete the fields in the windows that follow to successfully submit the issue</li></ol>

<p>Please follow these guidelines when forming your problem report or product suggestion:</p>
<ol>
  <li>Describe your difficulty or suggestion<br>

    For problem reports please be as specific as possible (e.g., including compiler and link command line options), so that we may reproduce the problem. Please include a small test case if possible</li>

  <li>Describe your system configuration information<br>

    Be sure to include specific information that may be applicable to your setup: operating system, name and version number of installed applications, and anything else that may be relevant to helping us address your concern</li>
</ol>


<b><a name="Related_products">Related Products and Services</a></b>
<p>&nbsp;</p>
<p>Information on Intel&reg; software development products is
available at <a href="http://www.intel.com/software/products">http://www.intel.com/software/products</a>.
Some of the related products include: </p>

<ul>
  <li>
    The <a href="http://www.intel.com/software/college/">Intel&reg; Software College</a> provides interactive tutorials, documentation, and code samples that teach Intel&reg; architecture and software optimization techniques</li>

  <li>
    The <a href="http://www.intel.com/software/products/vtune/">VTune&trade; Performance Analyzer</a> allows you to evaluate how your application is utilizing the CPU and helps you determine if there are modifications you can make to improve your application's performance</li>

  <li>
    The <a href="http://www.intel.com/software/products/compilers/index.htm">Intel&reg; C++ and Fortran Compilers</a> are an important part of making software run at top speeds and fully support the latest Intel IA-32 and Itanium&reg; processors</li>

  <li>
    The <a href="http://www.intel.com/software/products/perflib/index.htm">Intel&reg; Performance Library Suite</a> provides a set of routines optimized for various Intel&reg; processors. The Intel&reg; Math Kernel Library, which provides developers of scientific and engineering software with a set of linear algebra, fast Fourier transforms and vector math functions optimized for the latest Intel Pentium and Intel Itanium&reg; processors. The Intel&reg; Integrated Performance Primitives consists of cross platform tools to build high performance software for several Intel architectures and several operating systems</li>

</ul>


<b><a name=Attribution>Attribution</a></b>

<p>As referenced in the End User License Agreement, attribution requires, at a minimum, prominently displaying the full Intel product name (e.g. "Intel&reg; Math Kernel Library") and providing a link/URL to the Intel&reg; MKL homepage (<a href="http://www.intel.com/software/products/mkl">www.intel.com/software/products/mkl</a>) in both the product documentation and website.

<p>The original versions of the BLAS from which that part of Intel&reg; MKL was derived can be obtained from <a href="http://www.netlib.org/blas/index.html">http://www.netlib.org/blas/index.html</a>.</p>

<p>The original versions of LAPACK from which that part of Intel&reg; MKL was derived can be obtained from <a href="http://www.netlib.org/lapack/index.html">http://www.netlib.org/lapack/index.html</a>.  The authors of LAPACK are E. Anderson, Z. Bai, C. Bischof, S. Blackford, J. Demmel, J. Dongarra, J. Du Croz, A. Greenbaum, S. Hammarling, A. McKenney, and D. Sorensen.  Our FORTRAN 90/95 interfaces to LAPACK are similar to those in the LAPACK95 package at <a href="http://www.netlib.org/lapack95/index.html">http://www.netlib.org/lapack95/index.html</a>.  All interfaces are provided for pure procedures. </p>

<p>The original versions of ScaLAPACK from which that part of Intel&reg; MKL was derived can be obtained from <a href="http://www.netlib.org/scalapack/index.html">http://www.netlib.org/scalapack/index.html</a>.  The authors of ScaLAPACK are L. S. Blackford, J. Choi, A. Cleary, E. D'Azevedo, J. Demmel, I. Dhillon, J. Dongarra, S. Hammarling, G. Henry, A. Petitet, K. Stanley, D. Walker, and R. C. Whaley.</p>

<p>PARDISO in Intel&reg; MKL is compliant with the 3.2 release of PARDISO freely distributed by the University of Basel.  It can be obtained at <a href="http://www.pardiso-project.org">http://www.pardiso-project.org</a>.

<p>Some FFT functions in this release of Intel&reg; MKL have been generated by the SPIRAL software generation system (<a href="http://www.spiral.net/">http://www.spiral.net/</a>) under license from Carnegie Mellon University.  Some FFT functions in this release of the Intel&reg; MKL DFTI have been generated by the UHFFT software generation system under license from University of Houston.  The Authors of SPIRAL are Markus Puschel, Jose Moura, Jeremy Johnson, David Padua, Manuela Veloso, Bryan Singer, Jianxin Xiong, Franz Franchetti, Aca Gacic, Yevgen Voronenko, Kang Chen, Robert W. Johnson, and Nick Rizzolo.

<b><a name=Legal>Disclaimer and Legal Information</a></b>
<p>&nbsp;</p>
<p>INFORMATION IN THIS DOCUMENT IS PROVIDED IN CONNECTION WITH INTEL(R) PRODUCTS. NO LICENSE, EXPRESS OR IMPLIED, BY ESTOPPEL OR OTHERWISE, TO ANY INTELLECTUAL PROPERTY RIGHTS IS GRANTED BY THIS DOCUMENT. EXCEPT AS PROVIDED IN INTEL'S TERMS AND CONDITIONS OF SALE FOR SUCH PRODUCTS, INTEL ASSUMES NO LIABILITY WHATSOEVER, AND INTEL DISCLAIMS ANY EXPRESS OR IMPLIED WARRANTY, RELATING TO SALE AND/OR USE OF INTEL PRODUCTS INCLUDING LIABILITY OR WARRANTIES RELATING TO FITNESS FOR A PARTICULAR PURPOSE, MERCHANTABILITY, OR INFRINGEMENT OF ANY PATENT, COPYRIGHT OR OTHER INTELLECTUAL PROPERTY RIGHT.<br>

UNLESS OTHERWISE AGREED IN WRITING BY INTEL, THE INTEL PRODUCTS ARE NOT DESIGNED NOR INTENDED FOR ANY APPLICATION IN WHICH THE FAILURE OF THE INTEL PRODUCT COULD CREATE A SITUATION WHERE PERSONAL INJURY OR DEATH MAY OCCUR.</p>

<p>Intel may make changes to specifications and product descriptions at any time, without notice. Designers must not rely on the absence or characteristics of any features or instructions marked "reserved" or "undefined." Intel reserves these for future definition and shall have no responsibility whatsoever for conflicts or incompatibilities arising from future changes to them. The information here is subject to change without notice. Do not finalize a design with this information.<br>
&nbsp;</p>

<p>The products described in this document may contain design defects or errors known as errata which may cause the product to deviate from published specifications.  Current characterized errata are available on request.<br>

&nbsp;</p>

<p>Contact your local Intel sales office or your distributor to obtain the latest specifications and before placing your product order.<br>

Copies of documents which have an order number and are referenced in this document, or other Intel literature, may be obtained by calling 1-800-548-4725, or by visiting <a href="http://www.intel.com/" target="_blank">Intel's Web Site</a>.</p>

<p>Intel processor numbers are not a measure of performance. Processor numbers differentiate features within each processor family, not across different processor families.  See http://www.intel.com/products/processor_number for details.</p>

<p>This document contains information on products in the design phase of development.</p>

<p>BunnyPeople, Celeron, Celeron Inside, Centrino, Centrino logo, Core Inside, FlashFile, i960, InstantIP, Intel, Intel logo, Intel386, Intel486, Intel740, IntelDX2, IntelDX4, IntelSX2, Intel Core, Intel Inside, Intel Inside logo, Intel. Leap ahead., Intel.  Leap ahead. logo, Intel NetBurst, Intel NetMerge, Intel NetStructure, Intel SingleDriver, Intel SpeedStep, Intel StrataFlash, Intel Viiv, Intel vPro, Intel XScale, IPLink, Itanium, Itanium Inside, MCS, MMX, Oplus, OverDrive, PDCharm, Pentium, Pentium Inside, skoool, Sound Mark, The Journey Inside, VTune, Xeon, and Xeon Inside are trademarks of Intel Corporation in the U.S. and other countries.</p>


<p>* Other names and brands may be claimed as the property of others.</p>

<p>Copyright (C) 2000-2008, Intel Corporation.  All rights reserved.</p>


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
