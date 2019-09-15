
const path = require( 'path' )
const nodeBourbon = require( 'node-bourbon' )
const {
	get,
	set,
	union,
} = require( 'lodash' );

const sassIncludePathNodeBourbon = grunt => {

	grunt.hooks.addFilter( 'config.sass', 'hisi.config.sass.node_bourbon', config => {
		const newConfig = { ...config, };
		set( newConfig, ['options','includePaths'], union(
			get( newConfig, ['options','includePaths'], [] ),
			nodeBourbon.includePaths,
		) );
		return newConfig;
	}, 10 );

};

module.exports = sassIncludePathNodeBourbon;
