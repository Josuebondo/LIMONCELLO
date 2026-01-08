// Basic polyfill for animation-timeline: view()
// - Shows a warning banner once on unsupported browsers
// - Uses IntersectionObserver to add fallback animation classes

(function () {
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof CSS !== 'undefined' && CSS.supports && CSS.supports('animation-timeline', 'view()')) {
            return; // native support, nothing to do
        }

        console.warn("animation-timeline: view() is not supported — applying fallback animations");

        // small warning banner
        var warning = document.createElement('div');
        warning.style.cssText = '\n            position: fixed;\n            bottom: 20px;\n            left: 20px;\n            right: 20px;\n            background: #ff6b6b;\n            color: white;\n            padding: 12px 16px;\n            border-radius: 8px;\n            z-index: 9999;\n            text-align: center;\n            box-shadow: 0 6px 20px rgba(0,0,0,0.15);\n            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;\n            font-size: 13px;\n        ';
        warning.innerHTML = '<strong>Note :</strong> Votre navigateur ne supporte pas <code>animation-timeline: view()</code>. ' +
            'Un fallback basique est appliqué via IntersectionObserver. Pour la meilleure expérience utilisez Chrome / Edge récents.';
        document.body.appendChild(warning);

        var observerOptions = { threshold: 0.2 };

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;

                // find an animation class containing "-view"
                var cls = Array.from(el.classList).find(function (c) { return c.indexOf('-view') !== -1; });
                if (cls) {
                    var base = cls.replace(/-view$/, '');
                    // add fallback animation name class if it exists in CSS (e.g., fade-in-view -> fade-in)
                    el.classList.add(base);
                }

                // also check nested demo-element that may carry the same view class
                var demo = el.querySelector && el.querySelector('.demo-element');
                if (demo) {
                    var demoCls = Array.from(demo.classList).find(function (c) { return c.indexOf('-view') !== -1; });
                    if (demoCls) {
                        demo.classList.add(demoCls.replace(/-view$/, ''));
                    }
                }

                // for card-animated elements, add a simple fade-in if nothing else
                if (el.classList.contains('card-animated')) {
                    el.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // observe elements with -view classes and card-animated
        document.querySelectorAll('[class*="-view"]').forEach(function (el) { observer.observe(el); });
        document.querySelectorAll('.card-animated').forEach(function (el) { observer.observe(el); });

        // remove banner after 8s
        setTimeout(function () {
            warning.style.opacity = '0';
            warning.style.transition = 'opacity 0.4s';
            setTimeout(function () { warning.remove(); }, 450);
        }, 8000);

        // add a tiny utility CSS fallback for classes we rely on
        var css = '\n            .fade-in { animation: fadeIn 700ms ease both; }\n            .slide-in-left { animation: slideInLeft 700ms ease both; }\n            .slide-in-right { animation: slideInRight 700ms ease both; }\n            .zoom-in { animation: zoomIn 700ms ease both; }\n            .bounce-in { animation: bounceIn 700ms ease both; }\n        ';
        var style = document.createElement('style');
        style.textContent = css;
        document.head.appendChild(style);
    });
})();
