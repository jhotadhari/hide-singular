/**
 * External dependencies
 */
import PropTypes from 'prop-types';

/**
 * WordPress dependencies
 */
const {
	Component
} = wp.element;

const {
    BaseControl,
    ToggleControl,
} = wp.components;

/**
 * Internal dependencies
 */
import defaults 					from '../defaults';


/**
 * Uncomposed post settings toggle component
 *
 * Needs to be composed with post settings
 */
class RawPostSettingsToogleComponent extends Component {
	constructor( props ) {
		super( ...arguments );

		this.state = {
			metaKey: props.metaKey,
			meta: props.meta || defaults[props.metaKey],
		};

	}

	render() {

		const {
			onUpdatePostAttribute,
			onSave,
			label,
			helpChecked,
			helpUnchecked,
		} = this.props;

		const {
			metaKey,
			meta,
		} = this.state

		const onChange = ( newMeta ) => {
			this.setState( { meta: newMeta ? '1' : '0' } );
			onUpdatePostAttribute( { [metaKey]: newMeta ? '1' : '0' } );
		};

		return [

			<div className="components-panel__row">

				<BaseControl
					label={ label }
					help={ parseInt( meta ) === 1 ? helpChecked : helpUnchecked }
				>
					<ToggleControl
						checked={ parseInt( meta ) === 1 }
						onChange={ onChange }
					/>
				</BaseControl>

			</div>
		];
	}
}

RawPostSettingsToogleComponent.propTypes = {
	label: PropTypes.string,
	meta: PropTypes.string,
	metaKey: PropTypes.string,
	helpChecked: PropTypes.string,
	helpUnchecked: PropTypes.string,
}

RawPostSettingsToogleComponent.defaultProps = {
	label: '',
	helpChecked: '',
	helpUnchecked: '',
}

export default RawPostSettingsToogleComponent;