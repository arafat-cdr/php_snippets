<?php

# Here we are finding age from <td> using dom xpath

#------------------------------------------
	$content = 'Here_our Table Exist within a td there is age';

   // Parse the HTML table
   $dom = new DOMDocument();

   $dom->loadHTML('<?xml encoding="UTF-8">' . $content);


   $xpath = new DOMXPath($dom);

   // Find the "Age" row
   $query = "//tr[td[contains(text(), 'Age')]]/td[2]";
   $ageElement = $xpath->query($query)->item(0);

   # May be Wrap With <strong> Try That
   if( !$ageElement ){

       #---------------------------------------
       $query = "//tr[td[strong[contains(text(), 'Age')]]]/td[2]";
       $ageElement = $xpath->query($query)->item(0);
       #--------------------------------------
   }

   // Check if the text contains "Death"
   $queryContainsDeath = "//tr[td[contains(text(), 'Death')]]";
   $containsDeath = $xpath->query($queryContainsDeath)->length > 0;

   # May be Wrap With <strong> Try That
   if( !$containsDeath ){

       #---------------------------------------
       $queryContainsDeath = "//tr[td[strong[contains(text(), 'Death')]]]/td[2]";
       $containsDeath = $xpath->query($queryContainsDeath)->length > 0;
       #--------------------------------------

   }


   $queryContainsDeathLower = "//tr[td[contains(text(), 'death')]]";
   $containsDeathLower = $xpath->query($queryContainsDeathLower)->length > 0;

   # May be Wrap With <strong> Try That
   if( !$containsDeathLower ){
       $queryContainsDeathLower = "//tr[td[strong[contains(text(), 'death')]]]/td[2]";
       $containsDeathLower = $xpath->query($queryContainsDeathLower)->length > 0;
   }

   $is_death = false;

   if( $containsDeath ||  $containsDeathLower ){
       $is_death = true;
   }


   if ( $ageElement  && !$is_death ) {

       // Calculate the age

       $birthDate = $xpath->query("//tr[td[contains(text(), 'Date Of Birth')]]/td[2]")->item(0)->textContent;

       # May be Wrap With <strong> Try That
       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[strong[contains(text(), 'Date Of Birth')]]]/td[2]")->item(0)->textContent;
       }

       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[contains(text(), 'Date of Birth')]]/td[2]")->item(0)->textContent;
       }

       # May be Wrap With <strong> Try That
       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[strong[contains(text(), 'Date of Birth')]]]/td[2]")->item(0)->textContent;
       }

       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[contains(text(), 'Date of birth')]]/td[2]")->item(0)->textContent;
       }

       # May be Wrap With <strong> Try That
       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[strong[contains(text(), 'Date of birth')]]]/td[2]")->item(0)->textContent;
       }

       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[contains(text(), 'date of birth')]]/td[2]")->item(0)->textContent;
       }

       # May be Wrap With <strong> Try That
       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[strong[contains(text(), 'date of birth')]]]/td[2]")->item(0)->textContent;
       }

       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[contains(text(), 'birth date')]]/td[2]")->item(0)->textContent;
       }

       # May be Wrap With <strong> Try That
       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[strong[contains(text(), 'birth date')]]]/td[2]")->item(0)->textContent;
       }

       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[contains(text(), 'Birth Date')]]/td[2]")->item(0)->textContent;
       }

       # May be Wrap With <strong> Try That
       if( !$birthDate ){
           $birthDate = $xpath->query("//tr[td[strong[contains(text(), 'Birth Date')]]]/td[2]")->item(0)->textContent;
       }


       # Now We should Have Birth Date
       if( $birthDate ){

            $birthTimestamp = strtotime($birthDate);
            $currentTimestamp = time();
            $ageInSeconds = $currentTimestamp - $birthTimestamp;
            $ageYears = floor($ageInSeconds / (365 * 24 * 60 * 60));

            // Replace the age value in the HTML
            $ageElement->nodeValue = "$ageYears Years";

            // Output the modified HTML
           return  $dom->saveHTML();
       }

       # Or Return What it Was
       return $content;

   }

   #------------------------------------------