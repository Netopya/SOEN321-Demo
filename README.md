#SOEN 321 Project on Browser Fingerprinting

## Team Members

Michael Bilinsky (26992358)
Jacob Desrochers (26919529)
Dionysios Kefallinos (27019920)
Philippe Miriello (27031246)
Mario Felipe Munoz (27175280)
Tyler Ramsay (26948065)
Dmitry Svoiski (26893570)

##Brief Description

A demo to show different applications of browser fingerprinting

##Overview

This demo contains two pairs of websites that compare fingerprints for different applications. The first demo contains a fake chat application ("footBook") that looks for keywords, and then associates a fingerprint with a found keyword. Then when the user navigates to a shopping site ("floorMart"), the user's fingerprint will be associated to the keyword which will influence which product is promoted to the user. The second demo contains a whistle blowing website where a user can share information. The user then navigates to an employee portal which compares the user's fingerprint to the fingerprint of the whistleblower.

It is encouraged to use different privacy tools, anonymity tools, and other tactics in order to defeat the fingerprinting. In our testing, as along as the user is on the same machine using the same web browser, fingerprinting will be able to track a user even when they are using Chrome's Incognito mode, the Tor browser, a proxy provided by hide.me, and a VPN provided by Tunnel Bear.

##Architecture

The fingerprint is created client side by the fingerprint2js library (https://github.com/Valve/fingerprintjs2).
The repository's /online/ directory contains our developed endpoints for submitting fingerprints in the form of a fingerprint, key, and value triplet. The demos interact with this endpoints by submitting information about fingerprints, and requesting the information for a given fingerprint. These endpoints are ideally hosted from a central server that all client facing websites interact with. The websites for the first demo are in the /floorMart/ and /footBook/ directories while those for the second demo are in the /whistleBlower/ and /shadyCorp/ directories. Ideally these four websites are all hosted on different servers in order to demonstrate the cross-server capabilities of fingerprinting.
