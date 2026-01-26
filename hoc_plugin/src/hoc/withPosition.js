import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { useSelect } from '@wordpress/data';
import { useEffect } from '@wordpress/element';

// 1. Регистрируем атрибут для всех блоков
addFilter(
    'blocks.registerBlockType',
    'my-plugin/add-parent-attribute',
    ( settings ) => {
        return {
            ...settings,
            attributes: {
                ...settings.attributes,
                parentBlockName: {
                    type: 'string',
                    default: '',
                },
            },
        };
    }
);

// 2. HOC для отслеживания родителя и записи в атрибут
const withParentAttribute = createHigherOrderComponent( ( BlockEdit ) => {
    return ( props ) => {
        const { clientId, attributes, setAttributes } = props;

        // Получаем имя родителя
        const parentName = useSelect( ( select ) => {
            const { getBlockRootClientId, getBlockName } = select( 'core/block-editor' );
            const rootId = getBlockRootClientId( clientId );
            return rootId ? getBlockName( rootId ) : '';
        }, [ clientId ] );

        // Синхронизируем имя родителя с атрибутами блока
        useEffect( () => {
            if ( parentName !== attributes.parentBlockName ) {
                setAttributes( { parentBlockName: parentName } );
            }
        }, [ parentName, attributes.parentBlockName ] );

        return <BlockEdit { ...props } />;
    };
}, 'withParentAttribute' );

addFilter( 'editor.BlockEdit', 'my-plugin/with-parent-attribute', withParentAttribute );
