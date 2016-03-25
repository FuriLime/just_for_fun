<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($events as $event)
        <url>
            <loc>{{ URL::route("events", [$event->readable_url]) }}</loc>
            <lastmod>{{ gmdate(DateTime::W3C, strtotime($event->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>