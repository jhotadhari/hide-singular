
/**
 * WordPress dependencies
 */
const {
	compose
} = wp.compose;

const {
	withSelect,
	withDispatch,
} = wp.data;

const composeWithPostSettings = ( component, settingsKey ) => compose( [
	withSelect( ( select ) => {
		const {
			getEditedPostAttribute,
		} = select( 'core/editor' );

		const meta = getEditedPostAttribute( settingsKey );

		return {
			metaKey: settingsKey,
			meta: '1' === meta ? meta : '0',
		};
	} ),
	withDispatch( ( dispatch ) => {
		const { savePost, editPost } = dispatch( 'core/editor' );

		return {
			onSave: savePost,
			onUpdatePostAttribute( attributes ) {
				editPost( attributes );
			},
		};

	} ),
] )( component );

export default composeWithPostSettings;