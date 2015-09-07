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
<center>
<i><font class="red">Vector Math Library (VML) Notes<BR>
for Intel<sup> &reg;</sup> Architecture Processors</i></font>
</center>
<p align="center"><b><i>Document Number: 310712-007US</i></b></p> 

<p>


<P>&nbsp;</P>

<P>This document describes Vector Math Library (VML), which is
designed to compute elementary functions on vector arguments. VML is
an integral part of the Intel&reg Math Kernel Library and the VML
terminology is used here for simplicity in discussing this group of
functions.</P>

<P>VML includes a set of highly optimized implementations of certain
computationally expensive core mathematical functions (power,
trigonometric, exponential, hyperbolic, etc.) that operate on
vectors. VML may significantly improve performance for such
applications as nonlinear software, computations of integrals, and
many others.</P>

<P>Each vector function from VML (for each data format) can work in
three modes: High Accuracy (HA), Low Accuracy (LA), and Enhanced Performance (EP). For many
functions, using the LA version improves performance at the cost
of slight reduction in accuracy (1-2 least significant bits). In contrast to the LA accuracy flavor, the EP flavor 
further enhances the performance at the cost of significant reduction in accuracy. In both single and double 
precision, about half bits of floating-point mantissa are correct. Moreover, subtle argument paths for certain 
functions (for example, large arguments in trigonometric functions) may be calculated with even less accuracy.</P>

<P>Despite the fact that default accuracy is HA, LA is more than sufficient in most cases. For certain applications 
that are not very demanding for accuracy (for example, media applications, some Monte Carlo simulations, etc.) you 
may find the EP accuracy flavor sufficient. The accuracy flavor can be controlled by <code>vmlSetMode</code> function. 
Please refer to the MKL Reference Manual for further details.
</P> 


<P>Accuracy behavior is processor specific, so results might slightly differ 
across different processor families and even within a processor family, for example, between some processor 
models of the family, or between 64-bit and 32-bit libraries. Also results might slightly differ from release 
to release. Nevertheless these differences are within specified error bounds.</P>

<P>Error and special value behaviors are identical for HA and LA functions and do not depend on the 
processor on which the software runs. Correct error and special value behavior is not guaranteed for the EP flavor.</P>

<P>This document refers to a more detailed description of
performance and accuracy properties of VML functions, which you can find at 
the <A HREF="http://www.intel.com/software/products/mkl">product web page</A>. There are
several issues considered (performance, accuracy, special values
processing) and two levels of details (brief information for all
functions in one table and more detailed information for every
function on a separate page).</P>

<P><B>Performance issues:</B> Performance numbers in the respective tables
 are shown for so-called &quot;working&quot; intervals arguments. Performance 
behavior may be different for other intervals. 
For example, it is
quite expensive to compute trigonometric functions on &quot;huge&quot;

arguments. Therefore, to obtain needed accuracy, performance is
sacrificed.  Each function lists the working interval over which
performance is measured. The same page contains graphs that demonstrate how the performance behavior depends on
vector length. There are two extreme cases: so-called
&quot;short&quot; and &quot;long&quot; vectors (logarithmic scale is
used to show both cases). For short vectors there are&nbsp;loop organization and initialization overheads. The cost of such overheads
is amortized with increasing vector length, and for vectors longer
than a few dozens of elements the performance remains quite flat until 
the L2 cache size is exceeded with the length of the vector.</P>

<P>Data prefetching with the Intel&reg; Pentium&reg; <FONT FACE="arial,
helvetica">III</FONT>  processor (explicit data prefetch in software) and Pentium
4 processor (implicit data prefetch in hardware) greatly reduce the
out-of-cache problem.</P>

<P>
See a comprehensive <A
HREF="http://www.intel.com/software/products/mkl/data/vml/functions/_performanceall.html">table</A> for the performance data
 on all VML functions.
</P>

<P><B>Accuracy issues</B>: The design requirement for the HA
functions is less than 1.0 ulp error with all special values being
processed correctly. <font face="Verdana" color="#333333">
<span lang="EN-US" style="color: #333333; font-family: Verdana">A measured error 
in the LA version does not exceed 4 ulp</span></font>. For more details see the web-placed <A
HREF="http://www.intel.com/software/products/mkl/data/vml/functions/_accuracyall.html">accuracy table</A> with ulp errors for all
functions.</P>

<P><B>Special Values processing issues</B>: Special Values are processed in
accordance with C9X standard. For full lists of special values, see
the corresponding tables for <A HREF="tables/vml_special_values_real.htm">real</A> 
and <A HREF="tables/vml_special_values_complex.htm">complex</A> functions.</P>

<P>For more details on individual functions see the <A HREF="http://www.intel.com/software/products/mkl/data/vml/functions/_listfunc.html">list of VML functions</A>
at the product web page.<BR>
&nbsp;

<p>To ensure a correct display of this document, use the following recommended browser versions: 
Internet Explorer* 5.5 or higher (on Windows*), Netscape* 4.79 or Mozilla* 1.4 or higher (on Linux*).</p>
&nbsp;&nbsp;

<a name="Legal"></a>
<b>Disclaimer </b>

<p>
<font size=-1>
<p>INFORMATION IN THIS DOCUMENT IS PROVIDED IN CONNECTION WITH INTEL(R) PRODUCTS. NO LICENSE, EXPRESS OR IMPLIED, 
BY ESTOPPEL OR OTHERWISE, TO ANY INTELLECTUAL PROPERTY RIGHTS IS GRANTED BY THIS DOCUMENT. EXCEPT AS PROVIDED IN 
INTEL'S TERMS AND CONDITIONS OF SALE FOR SUCH PRODUCTS, INTEL ASSUMES NO LIABILITY WHATSOEVER, AND INTEL DISCLAIMS 
ANY EXPRESS OR IMPLIED WARRANTY, RELATING TO SALE AND/OR USE OF INTEL PRODUCTS INCLUDING LIABILITY OR WARRANTIES 
RELATING TO FITNESS FOR A PARTICULAR PURPOSE, MERCHANTABILITY, OR INFRINGEMENT OF ANY PATENT, COPYRIGHT OR OTHER 
INTELLECTUAL PROPERTY RIGHT.<br>
UNLESS OTHERWISE AGREED IN WRITING BY INTEL, THE INTEL PRODUCTS ARE NOT DESIGNED NOR INTENDED FOR ANY APPLICATION 
IN WHICH THE FAILURE OF THE INTEL PRODUCT COULD CREATE A SITUATION WHERE PERSONAL INJURY OR DEATH MAY OCCUR.</p>
<p>Intel may make changes to specifications and product descriptions at any time, without notice. Designers must 
not rely on the absence or characteristics of any features or instructions marked &quot;reserved&quot; or 

&quot;undefined&quot;. Intel 
reserves these for future definition and shall have no responsibility whatsoever for conflicts or incompatibilities 
arising from future changes to them. The information here is subject to change without notice. Do not finalize a 
design with this information. </p>
<p>The products described in this document may contain design defects or errors known as errata which may cause the 
product to deviate from published specifications. Current characterized errata are available on request. </p>
<p>Contact your local Intel sales office or your distributor to obtain the latest specifications and before placing 
your product order.</p>
<p>Copies of documents which have an order number and are referenced in this document, or other Intel literature, 
may be obtained by calling 1-800-548-4725, or by visiting <a href="http://www.intel.com/" target="_blank">Intel's Web Site</a>.
Intel processor numbers are not a measure of performance. Processor numbers differentiate features within each 
processor family, not across different processor families. See http://www.intel.com/products/processor_number for 
details.</p>
<p>BunnyPeople, Celeron, Celeron Inside, Centrino, Centrino Atom, Centrino Inside, Centrino logo, Core Inside, 
FlashFile, i960, InstantIP, Intel, Intel logo, Intel386, Intel486, IntelDX2, IntelDX4, IntelSX2, Intel Atom, 
Intel Core, Intel Inside, Intel Inside logo, Intel. Leap ahead., Intel. Leap ahead. logo, Intel NetBurst, 
Intel NetMerge, Intel NetStructure, Intel SingleDriver, Intel SpeedStep, Intel StrataFlash, Intel Viiv, 
Intel vPro, Intel XScale, Itanium, Itanium Inside, MCS, MMX, Oplus, OverDrive, PDCharm, Pentium, Pentium Inside, 
skoool, Sound Mark, The Journey Inside, Viiv Inside, vPro Inside, VTune, Xeon, and Xeon Inside are trademarks of 
Intel Corporation in the U.S. and other countries.</p>
</font>
<p>*Other names and brands may be claimed as the property of
others.</font></p>
<p>Copyright &copy 2000-2008, Intel Corporation. All rights reserved.</font></p>




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
