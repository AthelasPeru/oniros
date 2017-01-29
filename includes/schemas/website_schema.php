<script type="application/ld+json">
	{
		 "@context": "http://schema.org",
		 "@type": "WebSite",
		 "description": "Website description",
		 "about": "<?php echo get_bloginfo("description" ); ?>",
		 "author": {   
                "@type":"person",
                "name":"name of the author is it's required",
                "description":"author description",
                "email": "person@mail.pe"} ,
		 "copyrightHolder": "Name of copyright holder",
		 "creator": "bussiness creator",
		 "url": "<?php echo site_url(); ?>",
		 "datePublished": "Y-m-d",		 
		 "genre": "URL gotten fropm http://vocab.getty.edu/",
		 "inLanguage": "language short code",
		 "keywords": "target keywords",
		 "publisher": "Publisher brand object",
		 "image": "<?php echo site_url(); ?>/wp-content/themes/athelas/dist/img/logo.png",
		 "sameAs" : [ 
		 	"array of links to other sites or social netweorks"
   		] 	 
	}
</script>