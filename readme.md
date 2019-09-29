# Bergen.Works Headless WordPress
This WordPress theme is meant to serve as a headless CMS for the Bergen.Works website
The frontend for the Bergen.Works website is built using React/Next.js and can be found [at this repository](https://github.com/SvSven/bergenworks-frontend).

### TODO (incomplete)
* Add support for nested menu items
* Redirect post preview to frontend
* Migrate endpoints for `/wp/v2/pages/<page>` and `/wp/v2/posts/<post>` to single custom endpoint like `/bw/v1/page?p=<slug>`
    * Use `get_post()` to retrieve data to ensure compatibility with pages/posts/custom_post_type
    * Customize response data to only provide what is needed on frontend
* Add options page to set/get global values
    * This should include things like default meta data for pages such as title, description, open graph tags, etc
