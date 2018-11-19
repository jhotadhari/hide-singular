/**
 * External dependencies
 */

/**
 * Wordpress dependencies
 */
const { __, setLocaleData } = wp.i18n;
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

setLocaleData( hisiData.locale, 'hisi' );

// helpChecked={ 'will be listed' }
// helpUnchecked={ 'won\'t be listed' }

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

