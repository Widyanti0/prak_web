<header>
    <nav>
        <a href="/" class="{{ request()->is('') ? 'active' : '' }}">Home</a> |
        <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a> |
        <a href="/services" class="{{ request()->is('services') ? 'active' : '' }}">Services</a> |
        <a href="/blog" class="{{ request()->is('blog') ? 'active' : '' }}">Blog</a> |
        <a href="/biodata" class="{{ request()->is('biodata') ? 'active' : '' }}">Biodata</a>
    </nav>
    <hr>
</header>
