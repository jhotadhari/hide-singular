/**
 * External dependencies
 */

/**
 * Wordpress dependencies
 */
const { __ } = wp.i18n;
const { registerPlugin } = wp.plugins;
const { select } = wp.data;
const { Fragment } = wp.element;
const { PluginPostStatusInfo } = wp.editPost

/**
 * Internal dependencies
 */
import RawPostSettingsToogleComponent	from './hisi_editor_plugin_editor/components/RawPostSettingsToogleComponent.jsx';
import composeWithPostSettings		from './hisi_editor_plugin_editor/components/composeWithPostSettings.jsx';

// compose components
const PostSettingsStickyComponent = composeWithPostSettings( RawPostSettingsToogleComponent, 'hisi_hide_singular' );

const HisiPostStatusInfo = () => (
    <Fragment>

		{ hisiData.post_types.includes( select( 'core/editor' ).getCurrentPostType() ) &&

			<PluginPostStatusInfo
				className='hisi-post-setting-row'
			>

				<PostSettingsStickyComponent
					label={ __( 'Hide Singular View', 'hisi' ) }
				/>

			</PluginPostStatusInfo>

		}

    </Fragment>
);

registerPlugin( 'hisi-hide-singular', {
    render: HisiPostStatusInfo,
} );

