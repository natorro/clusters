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

<font class="red">FFTW to Intel<SUP>&reg;</SUP> Math Kernel 
Library&nbsp;Wrappers Technical User Notes<br>
for FFTW 2.x </font>
<br><b>Contents</b><p></p>
<P><a href="#Introduction">Introduction</a><br>
&nbsp;&nbsp;&nbsp; <a href="#Notational_Conventions">Notational Conventions</a><BR><a href="#Wrappers Reference">
Wrappers Reference</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#Complex_FFTs">Complex FFTs</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 

<a href="#Real_FFTs">Real FFTs</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Wisdom_Wrappers">Wisdom Wrappers</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Memory_Allocation">Memory Allocation</a><BR><a href="#Parallel Mode">
Parallel Mode</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Multi-threaded_FFTW">Multi-threaded FFTW</a><BR><a href="#Calling Wrappers from Fortran">
Calling Wrappers from Fortran</a><BR><a href="#Installation">Installation</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Creating_the_Wrapper_Library">Creating a Wrapper Library</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Application_assembling">Application Assembling</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#Running_Examples">

Running Examples</a><BR>
<a href="#MPI_FFTW">MPI FFTW</a><BR>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#MPI_Wrappers_ Reference">MPI FFTW Wrappers Reference</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Creating_MPI_Wrapper_Library">Creating MPI FFTW Wrapper Library</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Application_assembling_FFTW_MPI">Application Assembling with MPI FFTW Wrapper Library</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Running_FFTW_MPI_Examples">Running Examples of MPI FFTW Wrappers</a><BR>

<a href="#Technical Support">Technical Support</a><BR>
<a href="#Disclaimer">Disclaimer and Legal Information</a> </P>&nbsp;&nbsp;<BR>

<P></P>
<b><A name=Introduction></A>Introduction</b>
<p >This document 
describes a collection of wrappers that is the FFTW interfaces superstructure to 
be used for calling functions of the Intel<SUP>&reg;</SUP> Math Kernel Library (Intel<SUP>&reg;</SUP> MKL) Fourier transform 
interface (DFTI). These wrappers correspond to the FFTW version 2.x and the 
Intel MKL versions 7.0 and later.</p>
<p>The purpose of this 
set of wrappers is to enable developers whose programs currently use FFTW to 
gain performance with the Intel MKL Fourier transforms without changing the 
program source code. Because of differences between FFTW and Intel MKL DFTI 
functionalities, there are restrictions on using wrappers instead of the FTTW 
functions. Some FFTW functions have empty wrappers. However, many typical DFTs can be computed using these wrappers.</p>
<p>Please refer to <i>Intel MKL Reference Manual, Chapter 11 &quot;Fourier Transform 
Functions&quot;,</i> for better understanding the effects from the use 
of the wrappers.</p>
<p>
Additional wrappers may be added in the future to extend FFTW 
functionality 
available with Intel MKL. </p>

<b><a name="Notational_Conventions"></a>Notational Conventions</b>
<p>This document typically employs Windows* path notations.</p>
<b><A name="Wrappers Reference"></A>Wrappers Reference</b>
<P>The section provides a reference for FFTW C interface.</P>
<P>Each FFTW function has its own wrapper.&nbsp;Some of them, which are <i>not</i> expressly listed below, are empty and do nothing, 
but they are still needed to avoid link errors and satisfy the function 
calls.<br>
Intel MKL DFTI operates on both float and double-precision data types.</P>
<h2><a name="Complex_FFTs">Complex FFTs</a></h2>

<b>One-dimensional&nbsp; FFTs</b>
<P>
<code>
fftw_plan fftw_create_plan(int n, fftw_direction dir, int flags);</code><br>
<code>
fftw_plan fftw_create_plan_specific(int n, fftw_direction dir, int flags, 
fftw_complex *in, int istride, fftw_complex *out, int ostride);</code></p>
<P>
<code>
void fftw(fftw_plan plan, int howmany, fftw_complex *in, int istride, int idist, 
fftw_complex *out, int ostride, int odist);</code><br>
<code>
void fftw_one(fftw_plan plan, fftw_complex *in, fftw_complex *out);</code></P>

<p>
<code>
void fftw_destroy_plan(fftw_plan plan);</code></P>
<P><i>Argument restrictions</I>.&nbsp;The same 
algorithm corresponds to all values of the <code>flags</code> parameter.</P>
<b>Multi-dimensional FFTs</b>
<P>
<code>fftwnd_plan fftwnd_create_plan(int rank, const int *n, fftw_direction dir, int 
flags);</code><br>
<code>

fftwnd_plan fftw2d_create_plan(int nx, int ny, fftw_direction dir, int flags);</code><br>
<code>
fftwnd_plan fftw3d_create_plan(int nx, int ny, int nz, fftw_direction dir, int 
flags);</code><br>
<code>
fftwnd_plan fftwnd_create_plan_specific(int rank, const int *n, fftw_direction 
dir, int flags, fftw_complex *in, int istride, fftw_complex *out, int ostride);</code><br>
<code>
fftwnd_plan fftw2d_create_plan_specific(int nx, int ny, fftw_direction dir, int 
flags, fftw_complex *in, int istride, fftw_complex *out, int ostride);</code><br>
<code>
fftwnd_plan fftw3d_create_plan_specific(int nx, int ny, int nz, fftw_direction 
dir, int flags, fftw_complex *in, int istride, fftw_complex *out, int ostride);</code></P>
<p>
<code>
void fftwnd(fftwnd_plan plan, int howmany, fftw_complex *in, int istride, int 
idist, fftw_complex *out, int ostride, int odist);</code><br>

<code>
void fftwnd_one(fftwnd_plan plan, fftw_complex *in, fftw_complex *out);</code></P>
<P>
<code>
void fftwnd_destroy_plan(fftwnd_plan plan);</code></P>
<P><I>Argument restrictions</I>.&nbsp;The same 
algorithm corresponds to all values of the <code>flags</code> parameter.</P>
<h2><a name="Real_FFTs">Real FFTs</a></h2>
<b>One-dimensional&nbsp; FFTs</b>

<P>All wrappers are empty and do nothing, 
as the Intel MKL DFTI does not currently support this functionality (halfcomplex array).</P>
<b>Multi-dimensional FFTs</b>
<P><code>rfftwnd_plan rfftwnd_create_plan(int rank, const int *n, fftw_direction 
dir, int flags);</code><br>
<code>rfftwnd_plan rfftw2d_create_plan(int nx, int ny, fftw_direction dir, int 
flags);</code><br>
<code>rfftwnd_plan rfftw3d_create_plan(int nx, int ny, int nz, fftw_direction 
dir, int flags);</code></P>
<P>
<code>
void rfftwnd_real_to_complex(rfftwnd_plan plan, int howmany, fftw_real *in, int 
istride, int idist, fftw_complex *out, int ostride, int odist);</code><br>
<code>
void rfftwnd_complex_to_real(rfftwnd_plan plan, int howmany, fftw_complex *in, 
int istride, int idist, fftw_real *out, int ostride, int odist);</code><br>

<code>
void rfftwnd_one_real_to_complex(rfftwnd_plan plan, fftw_real *in, fftw_complex 
*out);</code><br>
<code>
void rfftwnd_one_complex_to_real(rfftwnd_plan plan, fftw_complex *in, fftw_real 
*out);</code></p>
<P>
<code>
void rfftwnd_destroy_plan(rfftwnd_plan plan);</code></p>
<P></P><I>Argument restrictions.</I>&nbsp;The 
same algorithm corresponds to all values of the <code>
flags</code> 
parameter.</P>

<h2><A name=Wisdom_Wrappers>Wisdom Wrappers</A></h2>
<P>
All wrappers are empty and do nothing, as Intel 
MKL 
DFTI currently does not support these functionalities.</span></P>
<h2><A name=Memory_Allocation>Memory Allocation</A></h2>
<P>
<code>
void* fftw_malloc(size_t n);</code></p>
<P><P>
<code>
void fftw_free(void* x);</code></P>
<P>Unlike the <code>fftw_malloc</code> 

function, the <code>fftw_malloc</code> wrapper 
does not align the allocatable array. To do that, it is necessary to allocate extra memory and 
shift the array address for the DFT data. See also the 
<B>Managing Performance and Memory </B>chapter 
in the <i>Intel MKL User's Guide</i> (file <CODE>userguide.pdf).</CODE></P>
<P></P>
<b><A name="Parallel Mode"></A>Parallel Mode</b>
<p>This section touches upon multi-threaded FFTW wrappers only. MPI FFTW wrappers, 
available with Intel MKL for the Linux* and Windows* operating systems, are 
described <a href="#MPI_FFTW">in a separate section</a>.</p>

<h2><a name="Multi-threaded_FFTW">Multi-threaded FFTW</a></h2>
<P>
FFTW multi-threaded functions use the <i>number of threads</i> parameter, which 
the <code>fftw_threads_init</code> function defines. However, the <code>
int fftw_threads_init(void)</code> wrapper is empty and 
does nothing, as the Intel MKL DFTI implements a different mechanism of 
parallelization. If you want to use Intel MKL DFTI 
routines in parallel mode or call wrappers from a multi-threaded application, please refer to the 
Intel MKL documentation to learn how to manage the number of threads.</P>
<p>Each of other 
wrappers in this section is the same as the respective wrapper in section 1 or 2 
(whose name differs from the one of the given wrapper in cutting out &quot;<code>threads_</code>&quot;).</P>

<P>For 
example,<br>
<code>void fftw_threads_one(int threads, fftw_plan plan, fftw_complex *in, 
fftw_complex *out);</code><br>
is the same as<br>
<code>
void fftw_one(fftw_plan plan, fftw_complex *in, fftw_complex *out);</code>&nbsp;</P><P><I>Argument restrictions</I>.&nbsp;Thread 
parameter is inessential. Both functions may be single-threaded or 
parallel depending on MKL variables.</span></P>
<P></P>
<b><A name="Calling Wrappers from Fortran"></A>Calling Wrappers from Fortran</b>
<P>
Wrappers are available for all Fortran FFTW functions. <br>

For example, instead of calling the C wrapper <code>fftw_one</code>, in Fortran, 
you should call <code>the fftw_f77_one</code> wrapper. </P>
<P>
FFTW Fortran functions are actually the wrappers to FFTW C functions. Fortran wrappers are actually 
the wrappers to C wrappers. So their functionality and argument 
restrictions are the same as of the corresponding C wrappers.</P>
<P></P>
<b><A name=Installation></A>Installation</b>
<P>
Wrappers are delivered as the source code, which must be compiled by a user to build the wrapper library. Then the FFTW library can be substituted by the wrapper and Intel MKL libraries. The source code for the wrappers and makefiles 
with the wrapper list files are located in the <code>\interfaces\fftw2xc</code> and 

<code>\interfaces\fftw2xf</code> subdirectories in the Intel MKL directory for C and Fortran 
wrappers, respectively. </P>
<h2><A name=Creating_the_Wrapper_Library>Creating a Wrapper Library</A></h2>
<P>Two header files are used to compile the C wrapper library: <code>fftw2_mkl.h</code> and <code>fftw.h</code>. 
<br>
The <code>fftw2_mkl.h</code> file is located in the <code>\interfaces\fftw2xc\wrappers</code> 

subdirectory in the Intel MKL directory. </p>
<p>Three header files are used to compile the Fortran wrapper library: <code>fftw2_mkl.h</code>, <code>fftw2_f77_mkl.h</code>, and <code>fftw.h</code>. 
<br>
The <code>fftw2_mkl.h</code> and <code>fftw2_f77_mkl.h</code> files are located in the <code>\interfaces\fftw2xf\wrappers</code> subdirectory in the Intel MKL directory.  

</P>
<p>The file <code>fftw.h</code>, used to compile libraries for both interfaces and located in the \include\fftw subdirectory in the Intel MKL directory, slightly differs from the original FFTW (www.fftw.org) header file<code> fftw.h</code>. 
</P> 
<p>A wrapper library contains C and Fortran wrappers for complex and real transforms in serial and multi-threaded mode for one of the two data types (double or float). The 
data type is managed by a makefile parameter.</p>
<p>The makefiles use the parameters specifying the platform, compiler,
precision<i>,</i> and function. Description of these parameters 
is contained in the makefile comment heading. </P>
Specifying the platform is required. Possible values:</p>

<ul>
<li><code>lib32</code> &#8211; 32-bit applications</li>
<li><code>libem64t</code> &#8211; Intel&reg; 64 architecture based applications</li>
<li><code>lib64</code> &#8211; IA-64 architecture based applications.</li>

</ul>
<p>The rest of parameters have default values and are optional.</p>
<p>The parameter <code>compiler</code> (on the Linux* OS and Mac OS* X)/<code>COMPILER</code> (on the Windows* OS)&nbsp;may have values:</p>
<ul>
<li><code>intel</code> &#8211; Intel&reg; compilers version 8.0 
or higher, default</li>

<li><code>gnu</code> &#8211; GNU compiler on the Linux* OS and Mac OS* X</li>
<li><code>mc</code> &#8211; Microsoft* C++ Compiler on the Windows* OS</li>

</ul>
<p>The parameter <code>PRECISION</code> may have values:</p>

<ul>
<li><code>MKL_DOUBLE</code> &#8211; double-precision data, default</li>
<li><code>MKL_SINGLE</code> &#8211; float, single-precision data.</li>
</ul>
<p>The parameter <code>function</code> is not used for building a wrapper library. </p>

<p>As the Fortran wrapper library is built by a C compiler, function names in the wrapper library and Fortran object module may be different. The file <code>fftw2_f77_mkl.h</code> in the <code>\interfaces\fftw2xf\source</code> subdirectory 
in the Intel MKL directory defines function names according to names in the Fortran module. If 
a required name is missing in the file, you can change the latter to add the name.<p>
<P><b>Examples</b></p>
<p>The command</SPAN><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>make lib64</code><br>
builds a double-precision wrapper library for IA-64 architecture based 
applications using the Intel<SUP>&reg;</SUP> C++ Compiler or the Intel&reg; 
Fortran Compiler version 8.0 or 
higher 
(Compilers and <code>PRECISION=MKL_DOUBLE</code> are chosen by default.).<br>

The command<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>make lib64 PRECISION=MKL_SINGLE</codE><br>
builds a single-precision wrapper library for IA-64 architecture based 
applications using the Intel 
C++ Compiler or the Intel 
Fortran Compiler version 8.0 or higher (Compilers are chosen by default.).<br>
</P>

<P>As a result, the wrapper library will be created in the directory with the Intel MKL libraries corresponding to the used platform. For example, 
<code>/lib/64</code> (on the Linux* OS and Mac OS* X) or <code>\ia32\lib</code> 
(on the 
Windows* OS).</P>
<p>In the wrapper library names, the suffix corresponds to the used compiler and the underscore is preceded with letter 
&quot;f&quot; for Fortran and &quot;c&quot; for C.<br>

For example,<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>fftw2xf_intel.lib</code>&nbsp;(on 
the Windows 
OS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; libfftw2xf_intel.a</code> 
(on the Linux OS and Mac OS X)<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>fftw2xc_intel.lib</code>&nbsp;(on 
the Windows 
OS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; libfftw2xc_intel.a</code> 
(on the Linux OS and Mac OS X)<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>fftw2xc_ms.lib</code>&nbsp;(on 
the Windows 
OS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; libfftw2xc_gnu.a</code> 

(on the Linux OS and Mac OS X). 
</p>
<h2><A name=Application_assembling>Application Assembling</A></h2>
<P>The necessary original FFTW (www.fftw.org) header files are used without any modifications. The created wrapper library and 
the Intel MKL library are used instead of the FFTW library.</P>
<h2><A name=Running_Examples>Running Examples</A></h2>
<p>There are some examples that demonstrate how to use the wrapper library. 
The source code for the examples, makefiles used to run them, and the example 
list files are located in the <code>\examples\fftw2xc</code> and <code>\examples\fftw2xf</code> 
subdirectories in the Intel MKL directory for C and Fortran, respectively. To 
build examples, several additional files are needed: <code>fftw.h</code>, <code>fftw_threads.h</code>, <code>rfftw.h</code>, <code>rfftw_threads.h</code>, and <code>fftw_f77.i</code>. 
These files are distributed with permission from FFTW and are available in <code>\include\fftw</code>. The original files can also be found in FFTW 2.1.5 at http://www.fftw.org/download.html.</p>

<P>
Parameters for the example makefiles are described in the makefiles comment heading 
and are the same as 
the wrapper library makefile parameters (see
<a href="#Creating_the_Wrapper_Library">Creating a Wrapper Library</a>). Example 
makefiles normally invoke examples. However, if the appropriate wrapper library is not yet 
created, the makefile will first build it in the same way as the wrapper library 
makefile does and then proceed to examples.&nbsp;&nbsp; </p>
<p>If the parameter <code>function=&lt;example_name&gt;</code> is defined, then only 
the specified example will run. Otherwise, all examples from the appropriate subdirectory will run.
The subdirectory <code>\_results</code> will be created, and the results will be stored 
there in the <CODE>example_name.res</CODE> files. </P>

<b>
<a name="MPI_FFTW"></a>MPI 
FFTW</b>
<P>MPI FFTW wrappers are available with Intel&reg; MKL for the Linux* and Windows* 
operating systems.</p>

<h2>

<a name="MPI_Wrappers_ Reference"></a>MPI FFTW Wrappers Reference</h2>

<p>The section provides a reference for MPI FFTW C interface.
</p>
<b>
Complex MPI FFTW</b>

<p class="h4">
Complex One-dimensional MPI FFTW Transforms</p>
<P>
<code>
fftw_mpi_plan fftw_mpi_create_plan(MPI_Comm comm,
int n, fftw_direction dir, int flags);
</code><p>

<p><code>
void fftw_mpi(fftw_mpi_plan p, int n_fields, fftw_complex *local_data, fftw_complex *work);</code></p>
<p><code>
void fftw_mpi_local_sizes(fftw_mpi_plan p, int *local_n,
 int *local_start, int *local_n_after_transform, int *local_start_after_transform, int *total_local_size);
</code></p>
<p><code>
void fftw_mpi_destroy_plan(fftw_mpi_plan plan);</code></P>

<P><I>Argument restrictions</I>:</p><ul><li>Supported values of <code>flags</code> 
are <code>FFTW_ESTIMATE</code>, <code>FFTW_MEASURE</code>, <code>FFTW_SCRAMBLED_INPUT</code> and <code>FFTW_SCRAMBLED_OUTPUT</code>. The same algorithm corresponds to all these values of the <code>flags</code> parameter. If any other <code>flags</code> value is supplied, the wrapper library reports an error "<i>CDFT error in wrapper: unknown flags</i>".</li><li> The only supported value of <code>n_fields</code> 

is 1.</li></ul>
<p class="h4">
Complex Multi-dimensional
MPI FFTW Transforms</p>
<code>
fftwnd_mpi_plan fftw2d_mpi_create_plan(MPI_Comm comm, int nx, int ny, fftw_direction dir, int flags);
</code><br><code>
fftwnd_mpi_plan fftw3d_mpi_create_plan(MPI_Comm comm,
int nx, int ny, int nz, fftw_direction dir, int flags);
</code><br>
<code>
fftwnd_mpi_plan fftwnd_mpi_create_plan(MPI_Comm comm, int dim, int *n, fftw_direction dir, int flags);</code></p>
<p>
<code>
void fftwnd_mpi(fftwnd_mpi_plan p, int n_fields, fftw_complex *local_data, fftw_complex *work, fftwnd_mpi_output_order output_order);</code>

<code></p><p>
void fftwnd_mpi_local_sizes(fftwnd_mpi_plan p, int *local_nx, int *local_x_start, int *local_ny_after_transpose, int *local_y_start_after_transpose, int *total_local_size);</code><p>
<code>void fftwnd_mpi_destroy_plan(fftwnd_mpi_plan plan);</code></p>
<P><I>Argument restrictions</I>:</p>
<ul><li>
Supported values of <code>flags</code> 
are <code>FFTW_ESTIMATE</code> and <code>FFTW_MEASURE</code>. If any other value of 

<code>flags</code> is supplied, the wrapper library reports an error "<i>CDFT error in wrapper: unknown flags</i>"</li>. 
<li>The only supported value of <code>output_order</code> is <code>FFTW_NORMAL_ORDER</code>. 
If any other value of <code>output_order</code> is supplied, the wrapper library reports an error "<i>CDFT error in wrapper: unknown  output_order</i>".</li>

	<li>The only supported value of <code>n_fields</code> is 1.</li></ul>
 <b>
Real MPI FFTW</b>
<p class="h4">
Real Multi-dimensional MPI FFTW Transforms</p>

<P>The wrappers are empty and do nothing. If the wrappers are used, the wrappers library reports an error "CDFT error in wrapper". 
<h2><A name="Creating_MPI_Wrapper_Library">Creating MPI FFTW Wrapper Library</A></h2>

<P>The source code for the wrappers and makefiles with the wrapper list files 
are located in the \interfaces\fftw2x_cdft subdirectory in the Intel MKL 
directory. 
</P>
<P>A wrapper library contains C wrappers for Complex One-dimensional MPI FFTW Transforms and Complex Multi-dimensional MPI FFTW Transforms. The library also contains empty C wrappers for Real Multi-dimensional MPI FFTW Transforms. For details, see 
<a href="#MPI_Wrappers_ Reference">MPI FFTW Wrappers Reference</a>. </P>
<p>The precision is managed by a makefile parameter.</p>
<p>The makefiles use the parameters specifying the platform, compiler,  
precision,<i> </i>MPI version, and MPI directory. Description of these parameters is contained in the makefile comment 
heading.</P>
</p>
<P>Specifying the platform is required. Possible values:</p>
<ul>

<li><code>lib32</code> &#8211; 32-bit applications</li>
<li><code>libem64t</code> &#8211; Intel<SUP>&reg;</SUP> 64 architecture based applications</li>
<li><code>lib64</code> &#8211; IA-64 architecture based applications.</li>
</ul>
<p>The parameter <code>mpidir</code> value is the path to the MPI installation directory. If this directory is 
specified in the PATH system variable, then you can omit the parameter. </p>

<p>The rest of parameters are optional as well and have default values.</p>
<p>The parameter <code>compiler</code> may have values:</p>
<ul>
<li><code>intel</code> &#8211;  Intel&reg; compilers version 8.x or higher on 
the Linux* OS, default</li>

<li><code>gnu</code> &#8211; GNU compiler on the Linux OS.</li>

</ul><p>On the Windows OS, this parameter is not used. The default Intel&reg; compiler will be used to build the library.</p>
<p>The parameter <code>PRECISION</code> may have values:</p>
<ul>
<li><code>MKL_DOUBLE</code> &#8211; double-precision data, default</li>
<li><code>MKL_SINGLE</code> &#8211; float, single-precision data.</li>

</ul>
<p>The parameter <code>mpi</code> specifies the MPI library to be used. The parameter may have values: </p><ul>
<li><code>intel1</code> &#8211;  Intel&reg; MPI 1.0.x on the Linux OS.</li>
<li><code>intel2</code> &#8211; Intel&reg; MPI 2.0.x on the Linux OS, default for 
the Linux OS.</li>

<li><code>intel3</code> &#8211; Intel&reg; MPI 3.0.x on the Linux OS.</li>
<li><code>mpich</code> &#8211; MPICH 1.2.x on the Linux OS.</li>
<li><code>mpich2</code> &#8211; MPICH2 1.0.x on the Linux or Windows* OS. For 
the Windows OS, it's a default value.</li>

<li><code>msmpi</code> &#8211; Microsoft* MPI library (for the Intel<SUP>&reg;</SUP> 64 
architecture only) on the Windows OS.</li>
</ul>

<p>
<P><b>Examples</b></p>
<p>The command</SPAN><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>make lib64</code><br>
builds a double-precision wrapper library for IA-64 architecture based 
applications 
using Intel MPI 2.0 and the Intel&reg; C++ Compiler version 8.x or higher on the Linux 
OS (Compilers and 
<code>PRECISION=MKL_DOUBLE</code> are chosen by default.).<br>

The command<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>make lib32 mpi=mpich PRECISION=MKL_SINGLE</codE><br>
builds a single-precision wrapper library for the 32-bit applications using MPICH 1.2.x 
and the Intel C++ Compiler version 8.x or higher on the Linux OS (Compilers are chosen by default.).<br>
</P>

<P>As a result, the wrapper library will be created in the directory with the Intel 
MKL libraries corresponding to the used platform. For example, <code>/lib/64</code> (on the 
Linux* OS) or <code>\ia32\lib</code> (on the Windows* OS).</P>
<p>In the wrapper library names, the suffix corresponds to the used data precision. 
<br
>For example,<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>fftw2x_cdft_SINGLE.lib</code>&nbsp;on 
the Windows OS<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>libfftw2x_cdft_DOUBLE.a</code> on 
the Linux OS. 

</p>
<h2><A name=Application_assembling_FFTW_MPI>Application Assembling with MPI 
FFTW Wrapper Library</A></h2>
<P>The necessary original FFTW (www.fftw.org) header files are used without any modifications. The created MPI FFTW wrapper library and 
the Intel MKL library are used instead of the FFTW library.</P>
<h2><a name="Running_FFTW_MPI_Examples">Running Examples of MPI FFTW </A>
Wrappers</a></h2>
<p>There are some examples that demonstrate how to use the MPI FFTW wrapper library. 
The source C code for the examples, makefiles used to run them, and the example 
list files are located in the <code>\examples\fftw2x_cdft</code> subdirectory in the Intel 
MKL directory. To build examples, one additional file <code>fftw_mpi.h</code> is needed. This file is distributed with permission from FFTW and is available in <code>\include\fftw</code>. The original file can also be found in FFTW 
2.1.5 at http://www.fftw.org/download.html.

</p>
<P>
Parameters for the example makefiles are described in the makefiles comment heading 
and are the same as 
the wrapper library makefile parameters (see
<a href="#Creating_MPI_Wrapper_Library">Creating MPI FFTW Wrapper Library</a>) except 
for <i>PRECISION</i>, which takes different values: </p>
<ul type="disc">
<li><code>FFTW_ENABLE_DOUBLE</code> &#8211; double-precision data, default</li>
<li><code>FFTW_ENABLE_FLOAT</code> &#8211; float, single-precision data.</li>

</ul>

<P>
The table below lists examples available in the <code>\examples\fftw2x_cdft\source</code> subdirectory.</p>
<table border="1" width="100%" id="table1">
	<tr>
		<td >
		Examples source file</b></td>

		<td >
		Description</b></td>
	</tr>
	<tr>
		<td>&nbsp;<code>wrappers_c1d.c</code></td>
		<td>&nbsp;One-dimensional Complex MPI FFTW transform, using <code>plan = fftw_mpi_create_plan(...)</code></td>

	</tr>
	<tr>
		<td>&nbsp;<code>wrappers_c2d.c</code></td>
		<td>&nbsp;Two-dimensional Complex MPI FFTW transform, using <code>plan = 
		fftw2d_mpi_create_plan(...)</code></td>
	</tr>
	<tr>
		<td>&nbsp;<code>wrappers_c3d.c</code></td>

		<td>&nbsp;Three-dimensional Complex MPI FFTW transform, using <code>plan = 
		fftw3d_mpi_create_plan(...)</code></td>
	</tr>
	<tr>
		<td>&nbsp;<code>wrappers_c4d.c</code></td>
		<td>&nbsp;Four-dimensional Complex MPI FFTW transform, using <code>plan = fftwnd_mpi_create_plan(...)</code></td>
	</tr>

</table>
<P></P>
<b><A name="Technical Support"></A>Technical Support</b><P class=MsoNormal>Please see the Intel MKL support 
website at 
<a href="http://www.intel.com/support/performancetools/libraries/mkl/">
http://www.intel.com/support/performancetools/libraries/mkl/</a>.&nbsp;&nbsp; </p>

Disclaimer and Legal Information</a></b>
<P class="legal">INFORMATION IN THIS DOCUMENT IS PROVIDED IN CONNECTION WITH INTEL� PRODUCTS. NO
        LICENSE, EXPRESS OR IMPLIED, BY ESTOPPEL OR OTHERWISE, TO ANY INTELLECTUAL PROPERTY
        RIGHTS IS GRANTED BY THIS DOCUMENT. EXCEPT AS PROVIDED IN INTEL'S TERMS AND CONDITIONS
        OF SALE FOR SUCH PRODUCTS, INTEL ASSUMES NO LIABILITY WHATSOEVER, AND INTEL DISCLAIMS
        ANY EXPRESS OR IMPLIED WARRANTY, RELATING TO SALE AND/OR USE OF INTEL PRODUCTS INCLUDING
        LIABILITY OR WARRANTIES RELATING TO FITNESS FOR A PARTICULAR PURPOSE, MERCHANTABILITY,
        OR INFRINGEMENT OF ANY PATENT, COPYRIGHT OR OTHER INTELLECTUAL PROPERTY RIGHT.
        <br>
        UNLESS OTHERWISE AGREED IN WRITING BY INTEL, THE INTEL PRODUCTS ARE NOT DESIGNED
        NOR INTENDED FOR ANY APPLICATION IN WHICH THE FAILURE OF THE INTEL PRODUCT COULD
        CREATE A SITUATION WHERE PERSONAL INJURY OR DEATH MAY OCCUR.<br>

        Intel may make changes to specifications and product descriptions at any time, without
        notice. Designers must not rely on the absence or characteristics of any features
        or instructions marked "reserved" or "undefined." Intel reserves these for future
        definition and shall have no responsibility whatsoever for conflicts or incompatibilities
        arising from future changes to them. The information here is subject to change without
        notice. Do not finalize a design with this information.
        <br>
        The products described in this document may contain design defects or errors known
        as errata which may cause the product to deviate from published specifications.
        Current characterized errata are available on request.
        <br>
        Contact your local Intel sales office or your distributor to obtain the latest specifications
        and before placing your product order.<br>
        Copies of documents which have an order number and are referenced in this document,
        or other Intel literature, may be obtained by calling 1-800-548-4725, or by visiting
        <a href="http://www.intel.com/" target="_blank">Intel's Web Site</a>.</p> <p class="legal">
        Intel processor numbers are not a measure of performance. Processor numbers differentiate
        features within each processor family, not across different processor families.
        See http://www.intel.com/products/processor_number for details.<br>

&nbsp;</p>
       
         <!--[<em>for beta and pre-release product versions </em>]<p  class="legal">
			This document contains information on products in the design phase 
			of development.</p>-->
<p class="legal">BunnyPeople, Celeron, Celeron Inside, Centrino, Centrino logo, Core Inside, FlashFile,
        i960, InstantIP, Intel, Intel logo, Intel386, Intel486, Intel740, IntelDX2, IntelDX4,
        IntelSX2, Intel Core, Intel Inside, Intel Inside logo, Intel. Leap ahead., Intel.
        Leap ahead. logo, Intel NetBurst, Intel NetMerge, Intel NetStructure, Intel SingleDriver,
        Intel SpeedStep, Intel StrataFlash, Intel Viiv, Intel vPro, Intel XScale, IPLink,
        Itanium, Itanium Inside, MCS, MMX, Oplus, OverDrive, PDCharm, Pentium, Pentium Inside,
        skoool, Sound Mark, The Journey Inside, VTune, Xeon, and Xeon Inside are trademarks
        of Intel Corporation in the U.S. and other countries.</p>
<p class="legal">*
Other names and brands may be claimed as the property of others.<BR>&nbsp;<BR>Copyright 
(C) 2006-2008, Intel Corporation. 
<SPAN  class="legal">All rights reserved.</SPAN></P>

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
