(function() {
    document.getElementById('title').addEventListner('blur', function(e) {
        let slug = document.getElementById('slug');
        if(slug.value) {
            return;
        }
        slug.value = this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, '');
    });
})();