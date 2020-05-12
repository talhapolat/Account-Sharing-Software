
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach($tags as $tag)
        <url>
            <loc>{{ url('/tags').'/'.$tag->url}}</loc>
            <lastmod>{{ $tag->created_at->toAtomString() }}</lastmod>
            <changefreq>Daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
