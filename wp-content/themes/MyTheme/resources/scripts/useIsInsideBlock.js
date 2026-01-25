import { useEffect } from '@wordpress/element';
import { subscribe, select } from '@wordpress/data';

export function useBlockPosition(clientId, callback) {
    useEffect(() => {
        if (!clientId) return;

        let prevIndex = select('core/block-editor')
            .getBlockIndex(clientId);

        const unsubscribe = subscribe(() => {
            const newIndex = select('core/block-editor')
                .getBlockIndex(clientId);

            if (newIndex !== prevIndex) {
                prevIndex = newIndex;
                callback(newIndex); // викликаємо колбек при зміні позиції
            }
        });

        return () => unsubscribe();
    }, [clientId]);
}
