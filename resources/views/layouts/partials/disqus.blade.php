<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = "{{ url()->current() }}";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = "{{ env('APP_NAME') }} - @yield('pageTitle')"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//{{ env("DISQUS_NAME") }}.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>