# AussieWide Health Website Deployment

This folder is ready for standard GoDaddy/cPanel hosting.

## Upload

Upload every file and folder in this project to the domain public web folder, usually `public_html`.

## Contact Form

The enquiry forms post to `contact.php`, which sends mail to:

`info@aussiewidehealth.com.au`

Before launch, send a test enquiry from the live domain and confirm it arrives. If GoDaddy blocks unauthenticated mail, create the mailbox in cPanel and enable SMTP or ask GoDaddy support to confirm PHP `mail()` delivery.

## Launch Checklist

- Update Google Analytics placeholder in each HTML page if an analytics account is available.
- Confirm the SSL certificate is active.
- Submit `sitemap.xml` in Google Search Console.
- Connect the Google Business Profile to the live website URL.
- Replace or add any official registration numbers once confirmed.
- Replace the moving feedback banner text with approved real testimonials if the business wants named customer or participant reviews.
- Review privacy, terms, and NDIS compliance pages with the business owner before launch.
