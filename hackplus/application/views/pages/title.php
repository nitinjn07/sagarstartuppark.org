<?php 
$pagename = $this->uri->segment(1); 

if($pagename=="")
{
   $title="RISE-Jhansi Incubation Centre | Incubation Centre in Jhansi (UP)";
   $description="Rise jhansi Incubation Centre is innovatively designed and operated by the Jhansi Smart City Limited (JSCL), Uttar Pradesh State Government Company. Rise Jhansi Incubation Centre is one of India's agnostic incubator with the intention of providing complete support to startups and entrepreneurs.";
}
else if($pagename=="about-us")
{
   $title="About us | About RISE Jhansi | risejhansi.in";
   $description="Rise jhansi incubation centre is the place for the startup's here they can grow up their business journey";
}
else if($pagename=="news-and-events")
{
   $title="News and Events | Events in RISE | RISE News";
   $description="RISE Jhansi Organised Bootcamps, Ideathon, Live Mentoring Session and Hackathon for the startpups connect with risejhansi.in for more updates.";
}
else if($pagename=="services")
{
   $title="Services | RISE Jhansi Incubation Centre Services";
   $description="RISE Jhansi provides several services for the startups like co-working space,mentoring suppor, technical support, funding support, business model and marketing support and more join risejhansi.in to get this services for your startups.";
}
else if($pagename=="contact-us")
{
   $title="Contact Us | Incubation Centre in Jhansi | RISE Jhansi Incubation Centre";
   $description="Jhansi Incubation Centre is in Jhansi Nagar Nigam Premises, Civil Line, Near Elite Chauraha - Jhansi ( Uttar Pradesh ). You can also visit our website for more information www.risejhansi.in";
}
else 
{
    $title="RISE Jhansi Incubation Centre";
    $description="The objective of RISE is to developer Startup Ecosystem in the Jhansi Uttar Pradesh and provide the business plateform for the entrepreneure.";
}

?>