import { createElement } from '@wordpress/element';
import { createHigherOrderComponent } from '@wordpress/compose';
import { addFilter } from '@wordpress/hooks';

const withClientIdClassName = createHigherOrderComponent((BlockListBlock) => {
    return (props) => {
        return '';
    };
}, 'withClientIdClassName');

addFilter(
    'editor.BlockListBlock',
    'my-plugin/with-client-id-class-name',
    withClientIdClassName
);