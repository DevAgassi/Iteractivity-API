import '../css/admin.css';

// js/editor-modifications.js
function unregisterStretchyVariations() {
    const blocks = ['core/paragraph', 'core/heading'];
    const variations = ['stretchy-paragraph', 'stretchy-heading'];

    blocks.forEach((block, index) => {
        if (wp.blocks.getBlockType(block)) {
            wp.blocks.unregisterBlockVariation(block, variations[index]);
        }
    });
}

wp.domReady(() => {
    // Перша спроба
    unregisterStretchyVariations();
    
    // Запасна спроба через 500мс для WP 6.9
    setTimeout(unregisterStretchyVariations, 500);
});