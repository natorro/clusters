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
for FFTW3.x </font>
<H2>Contents</H2><p></p>
<P><a href="#Introduction">Introduction</a><br>
&nbsp;&nbsp;&nbsp; <a href="#Notational_Conventions">Notational Conventions</a><BR><a href="#Wrappers Reference">Wrappers Reference</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#Wrappers_for_Using_Plans">
1. Wrappers for Using Plans</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#Basic_Interface_Wrappers">

2. Basic Interface Wrappers</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Advanced_Interface_Wrappers">3. Advanced Interface Wrappers</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Guru_Interface_Wrappers">4. Guru Interface Wrappers</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Wisdom_Wrappers">5. Wisdom Wrappers</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#Memory_Allocation">
6. Memory Allocation</a><BR><a href="#Parallel Mode">Parallel Mode</a><BR><a href="#Calling Wrappers from Fortran">
Calling Wrappers from Fortran</a><BR><a href="#Installation">Installation</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="#Creating_the_Wrapper_Library">Creating a Wrapper Library</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; 

<a href="#Application_assembling">Application Assembling</a><BR>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#Running_Examples">
Running Examples</a><BR>
<a href="#Technical Support">Technical Support</a><BR>
<a href="#Disclaimer">Disclaimer and Legal Information</a></P>&nbsp;&nbsp;<BR>
<P></P>
<H2><A name=Introduction></A>Introduction</H2>
<P>This document describes a collection of wrappers that is the FFTW interfaces superstructure to be used for calling 
functions of the Intel<SUP>&reg;</SUP>  Math Kernel Library (Intel<SUP>&reg;</SUP>  MKL) Fourier transform 
(DFTI) or Trigonometric Transform (TT) interface.  These wrappers correspond to the FFTW 
version 3.x and the Intel MKL versions 7.0 and later.</P>
<P>The purpose of this set of wrappers is to enable developers whose programs 
currently use FFTW to gain performance with the Intel MKL Fourier 
transforms without changing the program source code. The only change that is 
required is to modify the header file <code>fftw3.h</code> 

(see 
<a href="#Creating_the_Wrapper_Library">Creating a Wrapper Library</a>). 
Because of differences between FFTW and Intel MKL DFTI/TT functionalities, there 
are a lot of restrictions on using wrappers instead of FTTW functions. Some FFTW functions have empty wrappers. However, 
many typical DFTs can be computed using these wrappers.</P>
<P>Please refer to the Intel MKL DFTI/TT documentation for better 
understanding the effects from the use of the wrappers.</P>
<P>Additional wrappers may be added in the future to extend FFTW 
functionality available with Intel MKL.</P>
<b><a name="Notational_Conventions"></a>Notational Conventions</b>
<p>This document typically employs Windows* path notations.</p>
<P></P>
<h2><A name="Wrappers Reference"></A>Wrappers Reference</h2>
<P>The section provides a reference for FFTW C interface. </p>

<P>Each FFTW function has its 
own wrapper.&nbsp;Some of them, which are <i>not</i> expressly listed below, are empty and do nothing, but they are still needed to 
avoid link errors and satisfy the function calls. </p><p>Note that Intel MKL DFTI 
operates on float and double-precision data types and does not support the 
long-double data type used by the FFTW functions. </P>
<b>1. <a name="Wrappers_for_Using_Plans">Wrappers for Using Plans</a></b>
<p><code>void fftw_execute(const fftw_plan plan);</code></p>
<p><code>void fftw_destroy_plan(const fftw_plan plan);</code></p>
<p><code>void fftwf_execute(const fftw_plan plan);</code></P>
<p><code>void fftwf_destroy_plan(const fftw_plan plan);</code></p>

<b>2. <A name=Basic_Interface_Wrappers>Basic Interface Wrappers</A></b>
<P>Wrappers for execution and 
plan destruction functions are listed in 
<a href="#Wrappers_for_Using_Plans">Wrappers for Using Plans</a>.</p>

<p class="h4">2.1 Complex DFTs</p>
<p><code>fftw_plan fftw_plan_dft_1d(int n, fftw_complex 
*in, fftw_complex *out, int sign, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_2d(int nx, int ny, 
fftw_complex *in, fftw_complex *out, int sign, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_3d(int nx, int ny, int 
nz, fftw_complex *in, fftw_complex *out, int sign, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft(int rank, const int 
*n, fftw_complex *in, fftw_complex *out, int sign, unsigned flags);</code><br>

<code>fftwf_plan fftwf_plan_dft_1d(int n, 
fftwf_complex *in, fftwf_complex *out, int sign, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_2d(int nx, int ny, 
fftwf_complex *in, fftwf_complex *out, int sign, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_3d(int nx, int ny, 
int nz, fftwf_complex *in, fftwf_complex *out, int sign, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft(int rank, const int 
*n, fftwf_complex *in, fftwf_complex *out, int sign, unsigned flags);</code></P>
<P> <I>Argument restrictions.</I>&nbsp;The 
same algorithm corresponds to all values of the <code>flags</code> 
parameter.</P>
<p class="h4">2.2 Real-Data DFTs</p>

<p><code>fftw_plan fftw_plan_dft_r2c(int rank, const int *n, double *in, fftw_complex *out, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_r2c_1d(int n, double 
*in, fftw_complex *out, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_r2c_2d(int nx, int ny, 
double *in, fftw_complex *out, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_r2c_3d(int nx, int ny, 
int nz, double *in, fftw_complex *out, unsigned flags);</code></P>
<p>
<code>fftw_plan fftw_plan_dft_c2r(int rank, const 
int *n, fftw_complex *in, double *out, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_c2r_1d(int n, 
fftw_complex *in, double *out, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_c2r_2d(int nx, int ny, 
fftw_complex *in, double *out, unsigned flags);</code><br>
<code>fftw_plan fftw_plan_dft_c2r_3d(int nx, int ny, 
int nz, fftw_complex *in, double *out, unsigned flags);</code></p>

<p>
<code>fftwf_plan fftwf_plan_dft_r2c(int rank, const 
int *n, float *in, fftwf_complex *out, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_r2c_1d(int n, float 
*in, fftwf_complex *out, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_r2c_2d(int nx, int 
ny, float *in, fftwf_complex *out, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_r2c_3d(int nx, int 
ny, int nz, float *in, fftwf_complex *out, unsigned flags);</code></p>
<p>
<code>fftwf_plan fftwf_plan_dft_c2r(int rank, const 
int *n, fftwf_complex *in, float *out, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_c2r_1d(int n, 
fftwf_complex *in, float *out, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_c2r_2d(int nx, int 
ny, fftwf_complex *in, float *out, unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_dft_c2r_3d(int nx, int 
ny, int nz, fftwf_complex *in, float *out, unsigned flags);</code></P>

<P><I>Argument restrictions.</I>&nbsp;The 
same algorithm corresponds to all values of the <code>flags</code> parameter.
</P>
<p class="h4">2.3 Real-to-Real Transforms</p>
<P>Currently, only real 1D even/odd DFTs (cosine/sine transforms) are supported.</p>
<p><code>fftw_plan fftw_plan_r2r_1d(int n, double *in, double *out, fftw_r2r_kind kind, unsigned flags);</code><br>

<code>fftw_plan fftwf_plan_r2r_1d(int n, float *in, float *out, fftw_r2r_kind kind, unsigned flags); </code></P><P><I>Argument restrictions 
and extension:</I>&nbsp;</P>
<ul>

	<li>The 
same algorithm corresponds to all values of the <code>flags</code> parameter.
	</li>
	<li>
	<p>A new value <code>MKL_RODFT00</code> of the 
	<code>kind</code> parameter was introduced in the wrappers. For better 
	performance, you are strongly encouraged to use this value rather than <code>FFTW_RODFT00</code> 
	and provide input/output vectors that have an extra first element equal to 
	0.0. 
	For example, let the input vector <code>in1</code> for the function call<br>

	<code>plan1=fftw_plan_r2r_1d(n, in1, out1, FFTW_RODFT00, FFTW_ESTIMATE);</code> 
	<br>
	be (u,v,w) of length 3, then to accomplish the same transform with  
	<code>kind =</code> <code>MKL_RODFT00</code>, that is, with the 
	function call<br>
	<code>plan1=fftw_plan_r2r_1d(n, in2, out2, MKL_RODFT00, FFTW_ESTIMATE);</code> 
	<br>
	the input vector <code>in2</code> should be (0.0, u, v, w) of length 4.    

	Similarly, whereas the result <code>out1</code>      

	is (x,y,z), the result <code>out2</code> is
	<font face="Verdana" color="black" size="1">

	<span lang="EN-US" style="FONT-SIZE: 9pt; COLOR: black; FONT-FAMILY: Verdana">
	(0.0, x, y, z).</span></font></p>
	<p></p></li>
</ul>
<b>3. <A name=Advanced_Interface_Wrappers>Advanced Interface Wrappers</A></SPAN></b>
<p>Wrappers for execution and plan destruction functions are listed in 
<a href="#Wrappers_for_Using_Plans">Wrappers for Using Plans</a>.</p>
<p class="h4">3.1 Advanced Complex DFTs</p>

<p>
<code>fftw_plan fftw_plan_many_dft(int rank, const 
int *n, int howmany, fftw_complex *in, const int *inembed, int istride, int 
idist, fftw_complex *out, const int *onembed, int ostride, int odist, int sign, 
unsigned flags);</code><br>
<code>fftwf_plan fftwf_plan_many_dft(int rank, const 
int *n, int howmany, fftwf_complex *in, const int *inembed, int istride, int 
idist, fftwf_complex *out, const int *onembed, int ostride, int odist, int sign, 
unsigned flags);</code></P>
<P><I>Argument restrictions.</I>&nbsp;The 
same algorithm corresponds to all values of the <code>flags</code> 
parameter.</P>
<p class="h4">3.2 Advanced Real-Data DFTs</p>
<p><code>fftw_plan fftw_plan_many_dft_r2c(int rank, 
const int *n, int howmany, double* in, const int *inembed, int istride, int 
idist, fftw_complex *out, const int *onembed, int ostride, int odist, unsigned 
flags);</code></p>
<p><code>fftwf_plan fftwf_plan_many_dft_r2c(int rank, 
const int *n, int howmany, float* in, const int *inembed, int istride, int 
idist, fftwf_complex *out, const int *onembed, int ostride, int odist, unsigned 
flags);</code></p>

<p><code>fftw_plan fftw_plan_many_dft_c2r(int rank, 
const int *n, int howmany, fftw_complex * in, const int *inembed, int istride, 
int idist, double *out, const int *onembed, int ostride, int odist, unsigned 
flags);</code></p>
<p><code>fftwf_plan fftwf_plan_many_dft_c2r(int rank, 
const int *n, int howmany, fftwf_complex* in, const int *inembed, int istride, 
int idist, float *out, const int *onembed, int ostride, int odist, unsigned 
flags);</code></P>
<P></P></P>
<p class="h4">3.3 Advanced Real-to-Real Transforms</p>
<P>All wrappers are empty and 
do nothing. The wrappers may be added in later versions of Intel MKL.</P>
<b>4. <A name=Guru_Interface_Wrappers>Guru Interface Wrappers</A></b>
<p class="h4">4.1 Guru Complex DFTs</p>
<p>
<code>fftw_plan fftw_plan_guru_dft(int rank, const 
fftw_iodim *dims, int howmany_rank, const fftw_iodim *howmany_dims, fftw_complex 
*in, fftw_complex *out, int sign, unsigned flags);</code><br>

<code>fftwf_plan fftwf_plan_guru_dft(int rank, const 
fftwf_iodim *dims, int howmany_rank, const fftwf_iodim *howmany_dims, 
fftwf_complex *in, fftwf_complex *out, int sign, unsigned flags);</code></P>
<P></P> <I>Argument restrictions.</I>&nbsp;The 
same algorithm corresponds to all values of the <code>flags</code> 
parameter. The only supported value of <code>howmany_rank</code> is 1.</P>
<P>The rest of the wrappers 
are empty and do nothing, as the Intel MKL DFTI currently does not support 
split arrays.</P>
<p class="h4">4.2 Guru Real-Data DFTs</p>
<P>All wrappers are empty and 
do nothing.</P>

<P>Real-data wrappers 
(without support of split arrays) may be added in later versions of Intel 
MKL.&nbsp;</P>
<p class="h4">4.3 Guru Real-to-Real Transforms</p>
<P>All wrappers are empty and 
do nothing. The wrappers may be added in later versions of Intel MKL.</P>
<p class="h4">4.4 Guru Execution of Plans</p>
<p>
<code>void fftw_execute_dft(const fftw_plan p, 
fftw_complex *in, fftw_complex *out);</code><br>
<code>void fftw_execute_dft_r2c(const fftw_plan p, 
double *in, fftw_complex *out);</code><br>
<code>void fftw_execute_dft_c2r(const fftw_plan p, 
fftw_complex *in, double *out);</code><br>
<code>void fftwf_execute_dft(const fftwf_plan p, 
fftwf_complex *in, fftwf_complex *out);</code><br>

<code>void fftwf_execute_dft_r2c(const fftwf_plan p, 
float *in, fftwf_complex *out);</code><br>
<code>void fftwf_execute_dft_c2r(const fftwf_plan p, 
fftwf_complex *in, float *out);</code></P>
<P>The rest of the wrappers 
are empty and do nothing.</P>
<P>Real-data wrappers 
(without support of split arrays) will be added in later versions of Intel 
MKL.&nbsp;</P>
<P>
Wrappers for more execution and plan destruction functions are listed in 
<a href="#Wrappers_for_Using_Plans">Wrappers for Using Plans</a>.</P>
<b>5. <A name=Wisdom_Wrappers>Wisdom Wrappers</A></b>
<P>All wrappers are empty and 
do nothing, as the Intel MKL DFTI currently does not support these 
functionalities.</P>

<b>6. <A name=Memory_Allocation>Memory Allocation</A></b>
<P>
<code>
void* fftw_malloc(size_t n);</code>
<br><code>void fftw_free(void* x);</code>
<br><code>void* fftwf_malloc(size_t n);</code>
<br><code>
void fftwf_free(void* x);</code></P>
<P>Unlike the <code>fftw_malloc</code> and <code>fftwf_malloc</code>

functions, the <code>fftw_malloc</code> and <code>fftwf_malloc</code> wrappers 
do not align the allocatable array. To do that, it is necessary to allocate extra memory and 
shift the array address for the DFT data. See also the 
<B>Managing Performance and Memory </B>chapter 
in the <i>Intel MKL User's Guide</i> (file <CODE>userguide.pdf).</CODE></P>
<P></p>
<h2><A name="Parallel Mode"></A>Parallel Mode</h2>

<P>FFTW multi-threaded functions use the <i>number of threads</i> parameter, which 
the function <code>fftw_threads_init</code> defines and the function <code>fftw_plan_with_nthreads</code> 
sets.<br>
However, the wrappers to these functions and the <code>fftw_cleanup_threads</code> wrapper are empty and do nothing, as the Intel MKL DFTI implements a different 
mechanism of parallelization. If you want to use Intel 
MKL DFTI&nbsp;routines in parallel mode or call wrappers from a multi-threaded application, please 
refer to the Intel MKL documentation to learn how to manage the number of 
threads.</P>

<P></P>
<h2><A name="Calling Wrappers from Fortran"></A>Calling Wrappers from Fortran</h2>
<P>Wrappers are available for all the Fortran FFTW functions. FFTW Fortran 
functions are actually the wrappers to FFTW C functions. Fortran wrappers are 
actually the wrappers to C wrappers. So their functionality and argument 
restrictions are the same as of the corresponding C wrappers. </P>
<P><code>DFFTW_EXECUTE(PLAN)</code></p>
<p><code>DFFTW_DESTROY_PLAN(PLAN)</code></p>
<p><code>SFFTW_EXECUTE(PLAN)</code></P>
<p><code>SFFTW_DESTROY_PLAN(PLAN)<BR></code></p>


<p></p>

<p><code>DFFTW_PLAN_DFT_1D(PLAN, N, IN, OUT, SIGN, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_2D(PLAN, NX, NY, 
IN, OUT, SIGN, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_3D(PLAN, NX, NY, NZ, IN, OUT, SIGN, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT(PLAN, RANK, N, IN, OUT, SIGN, FLAGS)</code></P>
<p><code>SFFTW_PLAN_DFT_1D(PLAN, N, IN, OUT, SIGN, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_2D(PLAN, NX, NY, 
IN, OUT, SIGN, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_3D(PLAN, NX, NY, NZ, IN, OUT, SIGN, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT(PLAN, RANK, N, IN, OUT, SIGN, FLAGS)</code></P>
<P> </p>

<p><code>DFFTW_PLAN_DFT_R2C(PLAN, RANK, N, IN, OUT, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_R2C_1D(PLAN, N, IN, OUT, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_R2C_2D(PLAN, NX, NY, IN, OUT, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_R2C_3D(PLAN, NX, NY, NZ, IN, OUT, FLAGS)</code></P>
<p>
<code>DFFTW_PLAN_DFT_C2R(PLAN, RANK, N, IN, OUT, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_C2R_1D(PLAN, N, IN, OUT, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_C2R_2D(PLAN, NX, NY, IN, OUT, FLAGS)</code><br>
<code>DFFTW_PLAN_DFT_C2R_3D(PLAN, NX, NY, NZ, IN, OUT, FLAGS)</code></p>

<p><code>SFFTW_PLAN_DFT_R2C(PLAN, RANK, N, IN, OUT, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_R2C_1D(PLAN, N, IN, OUT, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_R2C_2D(PLAN, NX, NY, IN, OUT, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_R2C_3D(PLAN, NX, NY, NZ, IN, OUT, FLAGS)</code></P>
<p>
<code>SFFTW_PLAN_DFT_C2R(PLAN, RANK, N, IN, OUT, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_C2R_1D(PLAN, N, IN, OUT, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_C2R_2D(PLAN, NX, NY, IN, OUT, FLAGS)</code><br>
<code>SFFTW_PLAN_DFT_C2R_3D(PLAN, NX, NY, NZ, IN, OUT, FLAGS)<br></code></p>

<P></P>
<p>
<code>DFFTW_PLAN_MANY_DFT(PLAN, RANK, N, HOWMANY, IN, INEMBED, ISTRIDE, IDIST, 
OUT, ONEMBED, OSTRIDE, ODIST, SIGN, 
FLAGS)</code><br>
<code>SFFTW_PLAN_MANY_DFT(PLAN, RANK, N, HOWMANY, IN, INEMBED, ISTRIDE, IDIST, 
OUT, ONEMBED, OSTRIDE, ODIST, SIGN, 
FLAGS)<br></code></P>
<P></p>
<p><code>DFFTW_PLAN_MANY_DFT_R2C(PLAN, RANK, N, HOWMANY, IN, INEMBED, ISTRIDE, 
IDIST, OUT, ONEMBED, OSTRIDE, ODIST, SIGN, 
FLAGS)</code><BR><code>SFFTW_PLAN_MANY_DFT_R2C(PLAN, RANK, N, HOWMANY, IN, INEMBED, ISTRIDE, 
IDIST, OUT, ONEMBED, OSTRIDE, ODIST, SIGN, 
FLAGS)</code><br>
<code>DFFTW_PLAN_MANY_DFT_C2R(PLAN, RANK, N, HOWMANY, IN, INEMBED, ISTRIDE, 
IDIST, OUT, ONEMBED, OSTRIDE, ODIST, SIGN, 
FLAGS)</code><BR><code>SFFTW_PLAN_MANY_DFT_C2R(PLAN, RANK, N, HOWMANY, IN, INEMBED, ISTRIDE, 
IDIST, OUT, ONEMBED, OSTRIDE, ODIST, SIGN, 
FLAGS)<br></code></p>
<P></p>
<p>
<code>DFFTW_PLAN_GURU_DFT(PLAN, RANK, DIMS_N, DIMS_IS, DIMS_OS, HOWMANY_RANK, HOWMANY_DIMS_N, HOWMANY_DIMS_IS, HOWMANY_DIMS_OS, IN, OUT, SIGN, FLAGS)</code><br>

<code>SFFTW_PLAN_GURU_DFT(PLAN, RANK, DIMS_N, DIMS_IS, DIMS_OS, HOWMANY_RANK, HOWMANY_DIMS_N, HOWMANY_DIMS_IS, HOWMANY_DIMS_OS, IN, OUT, SIGN, FLAGS)<br></code></P>
<P></P>
<p>
<code>DFFTW_EXECUTE_DFT(PLAN, P, IN, OUT)</code><br>
<code>DFFTW_EXECUTE_DFT_R2C(PLAN, P, IN, OUT)</code><br>
<code>DFFTW_EXECUTE_DFT_C2R(PLAN, P, IN, OUT)<br></code><br>
<code>SFFTW_EXECUTE_DFT(PLAN, P, IN, OUT)</code><br>
<code>SFFTW_EXECUTE_DFT_R2C(PLAN, P, IN, OUT)</code><br>
<code>SFFTW_EXECUTE_DFT_C2R(PLAN, P, IN, OUT)<br></code><br><code>DFFTW_PLAN_R2R_1D(PLAN, N, IN, OUT, KIND, FLAGS)</code><br><code>SFFTW_PLAN_R2R_1D(PLAN, N, IN, OUT, KIND, FLAGS)</code></P>

<P></P>
<h2><A name=Installation></A>Installation</h2>
<P>Wrappers are 
delivered as the source code, which must be compiled by a user to build the 
wrapper library. Then the FFTW library can be substituted by the wrapper and 
Intel MKL libraries. The source code for the wrappers and makefiles with the 
wrapper list files are located in the <code>\interfaces\fftw3xc</code> and 
<code>\interfaces\fftw3xf</code> sub-directories in the Intel MKL directory for C and Fortran 
wrappers, respectively.&nbsp; </P>
<b><A name=Creating_the_Wrapper_Library>Creating a Wrapper Library</A></b>
<P>Two header files are used 
to compile the C wrapper library: 
<CODE>fftw3_mkl.h</CODE> and&nbsp; 

<CODE>fftw3.h</CODE>. 
<BR>The <CODE>
fftw3_mkl.h</CODE> 
file is located in the <code>\interfaces\fftw3xc\wrappers</code> subdirectory in the Intel 
MKL directory. </P>
<P>Three header files are used to compile the Fortran wrapper library: <code>fftw3_mkl.h</code>, <code>fftw3_f77_mkl.h</code>, and  <code>fftw3.h</code>. 

<br>
The <code>fftw3_mkl.h</code> and <code>fftw3_f77_mkl.h</code> files are located in the <code>\interfaces\fftw3xf\wrappers</code> 
subdirectory in the Intel MKL directory. 
</P>
<P>The file <code>fftw3.h</code>, used to compile libraries for both interfaces and located in the <code>\include\fftw</code> 

subdirectory in the Intel MKL directory, slightly differs from the original FFTW (www.fftw.org) header file <code>fftw3.h</code> 
in that all rows containing calls to the <code>fftw3.lib</code> are commented.
</P>
<P>As the Fortran wrapper library is built by a C compiler, function names in the wrapper library and Fortran object module may be different. The file <code>fftw3_f77_mkl.h</code> in the <code>\interfaces\fftw3xf\wrappers</code> 
subdirectory 
in the Intel MKL directory defines function names according to names in the Fortran module. If a required name is missing in the file, you can change the latter to add the name.</P>
<P>The makefiles use parameters specifying the platform (required), compiler, and function. 
Description of these parameters can be found in the makefile comment heading. </P>

<P><B>Examples</B></p>
The command<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>make lib64</code><br>
builds a wrapper library for IA-64 architecture based applications using the 
Intel<SUP>&reg;</SUP>  C++ Compiler or the Intel<SUP>&reg;</SUP>  Fortran Compiler version 8.0 or higher 
(Compliers are chosen by default.).<br>
The command<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>make lib64 compiler=gnu</code><br>
builds a wrapper library for IA-64 architecture based applications using a GNU C compiler.</P>
<P></P>As a result of a makefile execution, the wrapper library will be created 
in the directory with Intel MKL libraries corresponding to the used platform. 
For example, <code>/lib/64</code> (on the Linux* OS and Mac OS* X) or <code>\ia32\lib</code> 

(on the Windows* OS). 
<p>In the wrapper library names, the suffix corresponds to the used compiler and the underscore is preceded with letter 
&quot;f&quot; for Fortran and &quot;c&quot; for C.<br>For example,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>fftw3xf_intel.lib</code>&nbsp;(on 
the Windows OS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; libfftw3xf_intel.a</code> 
(on the Linux OS and Mac OS X)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>fftw3xc_intel.lib</code> (on 
the Windows 
OS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; libfftw3xc_intel.a</code> 

(on the Linux OS and Mac OS X)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>fftw3xc_ms.lib</code> (on 
the Windows 
OS)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; libfftw3xc_gnu.a</code> 
(on the Linux OS and Mac OS X). 
</p><b><A name=Application_assembling>Application Assembling</A></b>
<P>The adapted 
<CODE>fftw3.h</CODE> header file (see above) 
should be used when you build C applications. <br>
The native 
<CODE>fftw3.h</CODE> header file should be used when you build Fortran applications. </P>

<b><A name=Running_Examples>Running Examples</A></b>
<P>There are some examples that demonstrate how to use the wrapper library. The source code for the examples, 
makefiles used to run them, and the example list files are located in the <code>\examples\fftw3xc</code> and 
\examples\fftw3xf subdirectories in the Intel MKL directory.&nbsp;To build 
Fortran examples, one additional file <code>fftw3.f</code> is needed. 
This file is distributed with permission from FFTW and is available in the <code>\include\fftw</code> subdirectory of the Intel 
MKL directory. The original file can also be found in FFTW 3.1 at http://www.fftw.org/download.html.
<p>
<p>Example makefile parameters are the same 
as wrapper library makefile parameters. 
Example makefiles normally invoke examples. However, if the appropriate wrapper library is 
not yet created, the makefile will first build it in the same way as the wrapper 
library makefile does and then proceed to examples. </P>
<p>If the parameter 

<code>function=&lt;example_name&gt;</code> is defined, then only the specified example will run. 
Otherwise, all examples from the appropriate subdirectory will run. The 
subdirectory <code>\_results</code> will be created, and the results will be stored there in 
the <CODE>example_name.res</CODE> files. </P>
<P></P>
<h2><A name="Technical Support"></A>Technical Support</h2>Please see the Intel MKL support website at 
<a href="http://www.intel.com/support/performancetools/libraries/mkl/">
http://www.intel.com/support/performancetools/libraries/mkl/</a>.&nbsp;&nbsp; 

&nbsp;</b>
<h2 class="legal"><a name="Disclaimer">Disclaimer and Legal
Information</a></h2><P class="legal">INFORMATION IN THIS DOCUMENT IS PROVIDED IN CONNECTION WITH INTEL<SUP>&reg;</SUP>  PRODUCTS. NO
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
        <a href="http://www.intel.com/" target="_blank">Intel's Web Site</a>.</p> <p  class="legal">

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
All rights reserved.</P>


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
