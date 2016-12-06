# SOEN321-Demo
A demo to show different applications of browser fingerprinting

## Overview
This demo contains two pairs of websites that compare fingerprints for different applications. The first demo contains a fake chat application ("footBook") that looks for keywords, and then associates a fingerprint with a found keyword. Then when the user navigates to a shopping site ("floorMart"), the user's fingerprint will be associated to the keyword which will influence which product is promoted to the user. The second demo contains a whistle blowing website were a user can share information. The user then navigates to an employee portal which compares the user's fingerprint to the fingerprint of the whistle blower.

The fingerprint is created by the fingerprint2js library (https://github.com/Valve/fingerprintjs2). The repository's online/ directory contains our developed endpoints for submitting fingerprints in the form of a fingerprint, key, and value triplet. The demos interact with this endpoints by submitting information about fingerprints, and requesting the information for a given fingerprint.

It is encouraged to use different privacy tools, anonymity tools, and other tactics in order to defeat the fingerprinting. In our testing, as along as the user is on the same machine using the same web browser, fingerprinting will be able to track a user even when they are using Chrome's Incognito mode, the Tor browser, a proxy provided by hide.me, and a VPN provided by Tunnel Bear.
